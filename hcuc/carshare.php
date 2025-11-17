<?php 
session_start(); 
include 'zata_da/config.php'; 
include 'zata_da/core/path.core.php'; 


if( !isset($_GET['pid']) || !isset($_GET['carid']) || empty($_GET['pid'])  ){
//    header("Location: index.php");
   exit('Expired');
}
 

include 'zata_da/class/loop.info.cell.class.php';
include 'zata_da/class/loop.pro.class.php';
$comp = $profile->company($CON, '');

// ?pid=x&
$pid = isset($_GET['pid'])?$_GET['pid'] : false;
$carid = isset($_GET['carid'])?$_GET['carid'] : false;
$tid = isset($_GET['tid'])?$_GET['tid'] : false;
 

$CARDATA = $INFOEXT->database($CON);  

if( empty($CARDATA = json_decode($CARDATA, true)) ){
//    header("Location: index.php");
   exit('Expired');
}
$CARDATA = $CARDATA[0];
 $IMGBASE = "zata_da/src/car/";
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <title><?php echo $comp['cName'];?></title>
    <meta name="twitter:card" content="<?php echo HEIMPATH.'/'.$IMGBASE.htmlspecialchars($CARDATA['_mainImg']); ?>">
    <meta name="Description" content="<?php echo htmlspecialchars($CARDATA['_title']); ?>">
    <meta name="Keywords" content="<?php echo htmlspecialchars($CARDATA['_title']); ?>"> 
    <meta property="og:title" content="<?php echo htmlspecialchars($comp['cName']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($CARDATA['_title']); ?>">
    <meta property="og:image" content="<?php echo HEIMPATH.'/'.$IMGBASE.htmlspecialchars($CARDATA['_mainImg']); ?>"> 
    
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- Favicons -->
    <?php echo '<link rel="shortcut icon" href="'.$comp['imgfav'].'?'.mt_rand().'"/>';?>
</head>

<body class="f">

    <?php 
        //echo "index.php?pid=$pid&carid=$carid"; 
    ?>

<script>
    <?php 
        $link = "index.php?pid=$pid&carid=$carid";
        echo "window.location.href = '$link'";
    ?>
</script>
</body>

</html>