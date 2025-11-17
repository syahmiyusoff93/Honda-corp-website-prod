<?php
if (session_status() == PHP_SESSION_NONE) session_start();
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
if(empty($_SESSION['eshp_uid'])){
    $DATA['feed'] = "getloginform";
    $DATA['msg'] = "Not logged in";
}else{
    include '../config.php';
    
    $uid = $_SESSION['eshp_uid'];
    $ssku = $_POST['ssku'];
    $quan = empty($_POST['quan'])?1:$_POST['quan'];;
    
    $q = "SELECT * FROM mmb WHERE mmb_id='$uid';";
    $stmt = mysqli_stmt_init($CON);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $CART = [];
    while($inv = $res->fetch_object()){
        $tmp = $inv->mmb_cart;
        if(!empty($tmp)) $CART = json_decode($tmp, true);
    }
    if(empty($CART[$ssku]))
        $CART[$ssku] = $_POST;
    else
        $CART[$ssku]['quan'] = $quan;
    
    $DATA['data'] = $CART;
    $CART = json_encode($CART,true);
    $q = "UPDATE mmb SET mmb_cart=? WHERE mmb_id=?;";
    $stmt = mysqli_stmt_init($CON);
    mysqli_stmt_prepare($stmt, $q);
    mysqli_stmt_bind_param($stmt, 'ss', $CART, $uid);
    mysqli_stmt_execute($stmt);
    
    
    
    $DATA['feed'] = 200;
    $DATA['msg'] = "Added cart";
}

echo json_encode($DATA,true);