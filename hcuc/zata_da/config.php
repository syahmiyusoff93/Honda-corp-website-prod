<?php
include_once __DIR__."/../gen_cong.php";

date_default_timezone_set('Asia/Kuala_Lumpur'); 

// Use PDO for the primary connection. Provide a small compatibility wrapper
// so legacy code that calls $CON->query() and expects fetch_object()/fetch_assoc()/num_rows
// continues to work.
try {
	$pdo = new PDO(
		"mysql:host=".DB_ROOT.";port=".DB_PORT.";dbname=".DB_NAME.";charset=utf8mb4",
		DB_USER,
		DB_PASS,
		[
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
		]
	);
} catch (PDOException $e) {
	exit("Failed to connect to database: " . $e->getMessage());
}

// Result wrapper that provides mysqli-like methods on top of a PDOStatement
class PDOResultWrapper {
	private $rows = [];
	private $pos = 0;
	public $num_rows = 0;

	public function __construct($stmt = null) {
		if ($stmt instanceof PDOStatement) {
			// Load all rows to provide num_rows and mysqli-like sequential access.
			// Note: this uses memory proportional to result set size.
			$this->rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$this->num_rows = count($this->rows);
		}
	}

	public function fetch_object() {
		if ($this->pos >= $this->num_rows) return null;
		$row = (object) $this->rows[$this->pos++];
		return $row;
	}

	public function fetch_assoc() {
		if ($this->pos >= $this->num_rows) return null;
		return $this->rows[$this->pos++];
	}

	public function fetch($mode = PDO::FETCH_ASSOC) {
		if ($this->pos >= $this->num_rows) return false;
		$row = $this->rows[$this->pos++];
		if ($mode === PDO::FETCH_OBJ) {
			return (object) $row;
		}
		return $row;
	}

	// Provide rowCount alias for code that uses it
	public function rowCount() { return $this->num_rows; }
}

// Connection wrapper: exposes query() and prepare() and forwards other calls to PDO.
class PDOCompat {
	private $pdo;
	public function __construct(PDO $pdo) { $this->pdo = $pdo; }

	// Emulate mysqli->query by returning a PDOResultWrapper
	public function query($sql) {
		try {
			$stmt = $this->pdo->query($sql);
			return new PDOResultWrapper($stmt);
		} catch (PDOException $e) {
			return false;
		}
	}

	// Expose prepare() so existing code that uses prepared statements with PDO can still work
	public function prepare($sql) {
		return $this->pdo->prepare($sql);
	}

	// Provide a stmt_init() compatible method for legacy code that expects
	// mysqli_stmt-like behavior. Returns a PDOStmtCompat which implements
	// prepare/bind_param/execute/get_result used across the HCUC codebase.
	public function stmt_init() {
		return new PDOStmtCompat($this->pdo);
	}

	public function lastInsertId() { return $this->pdo->lastInsertId(); }

	// Fallback for other PDO methods
	public function __call($name, $args) {
		return call_user_func_array([$this->pdo, $name], $args);
	}
}

$CON = new PDOCompat($pdo);

// Lightweight statement compatibility layer to emulate mysqli_stmt_* methods
// using PDO prepared statements. This keeps legacy code (prepare + bind_param + execute + get_result)
// functional without changing dozens of files.
class PDOStmtCompat {
	private $pdo;
	private $sql;
	private $params = [];
	private $types = null;
	private $stmt = null;

	public function __construct(PDO $pdo) {
		$this->pdo = $pdo;
	}

	// Store the SQL; actual prepare happens on execute/get_result
	public function prepare($sql) {
		$this->sql = $sql;
		return true;
	}

	// Emulate mysqli_stmt::bind_param($types, &...$vars)
	// Accepts types like 'si' and corresponding values. We capture values in order.
	public function bind_param($types /* , mixed ...$vars */) {
		$args = array_slice(func_get_args(), 1);
		$this->types = $types;
		foreach ($args as $a) {
			$this->params[] = $a;
		}
		return true;
	}

	// Execute the prepared statement with captured params
	public function execute() {
		if (empty($this->sql)) return false;
		$this->stmt = $this->pdo->prepare($this->sql);

		// If types provided, try to bind with appropriate PDO::PARAM_* types
		if ($this->types !== null && is_string($this->types)) {
			$chars = str_split($this->types);
			for ($i = 0; $i < count($this->params); $i++) {
				$val = $this->params[$i];
				$typeChar = $chars[$i] ?? 's';
				$paramType = PDO::PARAM_STR;
				if ($typeChar === 'i') $paramType = PDO::PARAM_INT;
				elseif ($typeChar === 'b') $paramType = PDO::PARAM_LOB;
				// Bind 1-based
				$this->stmt->bindValue($i+1, $val, $paramType);
			}
			$ok = $this->stmt->execute();
			return $ok;
		}

		// Fallback: execute with positional params
		$ok = $this->stmt->execute($this->params);
		return $ok;
	}

	// Return a PDOResultWrapper similar to mysqli_stmt_get_result
	public function get_result() {
		if (!$this->stmt) {
			// Prepare & execute now if not already
			$this->stmt = $this->pdo->prepare($this->sql);
			$this->stmt->execute($this->params);
		}
		return new PDOResultWrapper($this->stmt);
	}

	// Allow calling close or other mysqli-ish methods as no-ops
	public function close() { $this->stmt = null; }
}

// If the procedural mysqli_stmt_* functions don't exist (mysqli extension absent),
// provide thin wrappers that operate on PDOStmtCompat instances. This lets legacy
// procedural code such as mysqli_stmt_prepare($stmt, $q) keep working.
if (!function_exists('mysqli_stmt_init')) {
	function mysqli_stmt_init($con) {
		if (is_object($con) && method_exists($con, 'stmt_init')) {
			return $con->stmt_init();
		}
		return null;
	}

	function mysqli_stmt_prepare($stmt, $sql) {
		if (is_object($stmt) && method_exists($stmt, 'prepare')) {
			return $stmt->prepare($sql);
		}
		return false;
	}

	function mysqli_stmt_bind_param($stmt, $types /* , ...$vars */) {
		if (is_object($stmt) && method_exists($stmt, 'bind_param')) {
			$args = func_get_args();
			array_shift($args); // remove $stmt
			return call_user_func_array([$stmt, 'bind_param'], $args);
		}
		return false;
	}

	function mysqli_stmt_execute($stmt) {
		if (is_object($stmt) && method_exists($stmt, 'execute')) {
			return $stmt->execute();
		}
		return false;
	}

	function mysqli_stmt_get_result($stmt) {
		if (is_object($stmt) && method_exists($stmt, 'get_result')) {
			return $stmt->get_result();
		}
		return false;
	}
}