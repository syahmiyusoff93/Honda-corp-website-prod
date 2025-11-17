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
}referer('mn');

include '../config.php';
// include '../class/addcar.class.php';
$DATA = [];
if( isset( $_POST['itmid'] ) ){ 
    $ID = $_POST['itmid']; 

    $LOC = '../src/car';

    $stmt = $CON->stmt_init();
    $stmt -> prepare("SELECT * FROM car WHERE id=?;");
    $stmt -> bind_param('i', $ID);
    $stmt -> execute(); 
    $res = $stmt->get_result(); 
    while($info = $res->fetch_assoc()){
        $J = json_decode($info['_gallery'],true);
        
        foreach( $J as $ind=>$img ){
            if(is_file("$LOC/$img") ) unlink("$LOC/$img");
        }

        $img = $info['_mainImg'];
        if(is_file("$LOC/$img") ) unlink("$LOC/$img");
    }  

    $stmt = $CON->stmt_init();
    $stmt -> prepare("DELETE FROM car WHERE id=?;");
    $stmt -> bind_param('i', $ID);
    $stmt -> execute(); 
 
}

echo json_encode($DATA, true);