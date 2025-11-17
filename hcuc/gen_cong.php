<?php
// Test changes
$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && !str_starts_with(trim($line), '#')) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

$db_name = $_ENV['DB_NAME_HCUC'];
$db_user = $_ENV['DB_USERNAME'];
$db_pass = $_ENV['DB_PASSWORD'];
$db_host = $_ENV['DB_HOST'];
$db_port = $_ENV['DB_PORT'];
$base_path = $_ENV['BASE_PATH_HCUC'];

define('DB_NAME', $db_name);
define('DB_USER', $db_user);
define('DB_PASS', $db_pass);
define('DB_ROOT', $db_host);
define('DB_PORT', $db_port);
define('PROTOCOL', $base_path);
