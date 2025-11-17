<?php
file_exists('../zata_da')?exit('not available'):'';

$_SESSION['uquery'] = empty($_SERVER['QUERY_STRING'])?'':$_SERVER['QUERY_STRING'];
$LANGARR = explode('/', $_SERVER['QUERY_STRING']);

// If Nginx set QUERY_STRING to a path with appended args (e.g. '/EN/home?pid=95')
// PHP won't populate $_GET correctly. Extract the part after '?' and merge into
// 	$_GET so code that checks isset($_GET['pid']) works as expected.
if (!empty($_SESSION['uquery']) && strpos($_SESSION['uquery'], '?') !== false) {
    $parts = explode('?', $_SESSION['uquery'], 2);
    if (isset($parts[1]) && is_string($parts[1]) && strlen($parts[1]) > 0) {
        parse_str($parts[1], $parsedQs);
        foreach ($parsedQs as $k => $v) {
            if (!isset($_GET[$k])) $_GET[$k] = $v;
        }
    }
}

foreach( ['BM', 'EN'] as $k=>$v) {
    if( in_array($v, $LANGARR) ) {
        $_SESSION['lang'] = $v;
        break;
    }
}

$_SESSION['lang'] = empty($_SESSION['lang'])?'EN':$_SESSION['lang'];

include 'zata_da/config.php';
include 'zata_da/core/global.core.php';
include 'zata_da/core/path.core.php';
include 'zata_da/core/sqltxt.core.php';

include 'zata_da/class/directory.php';
include 'zata_da/class/base.php';

$base = new $base;
$htt = $base->query();

if(isset($_GET['pid'])){
    $go_direct->pid = $_GET['pid'];
    exit($go_direct->viaID($CON));
}else if(!isset($_GET['pid'])){
    $dir = $go_direct->viaUrl($CON); //val = pid, mn, clr
}else{
    exit('Invalid Request');
}
include 'zata_da/class/function.class.php';
include 'zata_da/class/loop.pro.class.php';
include 'zata_da/class/loop.info.cell.class.php';
include 'zata_da/class/loop.info.class.php';

$_SESSION['query'] = empty($_SESSION['pquery'])?$_SESSION['uquery']:$_SESSION['pquery'];
$_SESSION['uquery']='';$_SESSION['pquery']='';

$comp = $profile->company($CON, $htt[0]);

if($res = $CON->query("SELECT * FROM seo WHERE seo_fid='$dir[pid]' LIMIT 1;")){
    $count = $res->num_rows;
    if( $count > 0 ){
        $SEO = $res->fetch_assoc();
        $SEO = json_decode($SEO['seo_json'], true);
    } 
}

$SEO['description'] = isset($SEO['description'])?$SEO['description']:'';
$SEO['keywords'] = isset($SEO['keywords'])?$SEO['keywords']:'';
$SEO['title'] = isset($SEO['title']) && !empty($SEO['title']) ?$SEO['title']:$comp['cName'];