<?php 
function referer($file) {
    if(isset($_SERVER['HTTP_REFERER'])){
        $refer = $_SERVER['HTTP_REFERER'];
        $arr = explode('/', $refer);
        $count = count($arr);
        if($arr[$count - 2] == $file){
            exit('Alert: Hacker log recorded.');
        }
    }else{
        exit('Hacker log recorded.');
    }
} referer('mn');

if(!empty($_POST['mn']) && !empty($_POST['cid'])){
    include '../config.php';
    include '../core/sqltxt.core.php';
    include '../core/path.core.php';
    include '../class/loop.info.cell.class.php';
    $sel = empty($_POST['sel'])?'':'.'.$_POST['sel'];
    $id = $_POST['cid'];
    $dot = $_POST['dot'];
    $mn = $_POST['mn'];
    $mnid = $_POST['mnid'];
    
    if(file_exists("$mn/$mn.class.php")) include "$mn/$mn.class.php";
    include $mn.'/'.$mn.$sel.'.exe.php';
}exit();