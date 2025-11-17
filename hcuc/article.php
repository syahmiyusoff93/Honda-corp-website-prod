<?php 
session_start(); 
include 'zata_da/config.php'; 
include 'zata_da/core/path.core.php'; 


if( !isset($_GET['pid']) || !isset($_GET['iid']) || empty($_GET['pid']) ){
//    header("Location: index.php");
//    exit();
}

include 'zata_da/class/loop.info.cell.class.php';
include 'zata_da/class/loop.pro.class.php';
$comp = $profile->company($CON, '');

// ?pid=x&
$pid = isset($_GET['pid'])?$_GET['pid'] : false;
$iid = isset($_GET['iid'])?$_GET['iid'] : false;
$tid = isset($_GET['tid'])?$_GET['tid'] : false;
 

$item = $INFOEXT -> itemInfo ('', '');

$stmt = $CON->stmt_init();
$stmt -> prepare("SELECT * FROM lists WHERE id=?;");
$stmt -> bind_param('i', $iid);
$stmt -> execute();
$res_m = $stmt->get_result();
while($item_m = $res_m->fetch_object()){
   $item = $INFOEXT -> itemInfo ($item_m, '');
    
}
$item['content'] = $INFOEXT -> min_html(strip_tags($item['content']));
$item['title'] = $INFOEXT -> min_html(strip_tags($item['title']));
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <title><?php echo $comp['cName'];?></title>
    <meta name="twitter:card" content="<?php echo HEIMPATH.'/'.htmlspecialchars($item['bgurl']); ?>">
    <meta name="Description" content="<?php echo htmlspecialchars($item['content']); ?>">
    <meta name="Keywords" content="<?php echo htmlspecialchars($item['content']); ?>"> 
    <meta property="og:title" content="<?php echo htmlspecialchars($item['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($item['content']); ?>">
    <meta property="og:image" content="<?php echo HEIMPATH.'/'.htmlspecialchars($item['bgurl']); ?>"> 
    
    
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <!-- Favicons -->
    <?php echo '<link rel="shortcut icon" href="'.$comp['imgfav'].'?'.mt_rand().'"/>';?>
</head>

<body class="f">




<script>
    <?php 
        $link = "index.php?pid=$pid&iid=$iid&tid=$tid";
        echo "window.location.href = '$link'";
    ?>
</script>
</body>

</html>