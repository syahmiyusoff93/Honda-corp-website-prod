<?php
session_start();  
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
include "../config.php";

$name = $_POST['username'];
$pass = $_POST['password'];

$stmt = $CON->stmt_init();
$stmt -> prepare("SELECT * FROM dist WHERE dist_email=?;");
$stmt -> bind_param('s', $name);
if($stmt -> execute()){
    $res = $stmt -> get_result();
    if(mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);

        $pwdcheck = password_verify($pass, $row['dist_pass']);
        if($pwdcheck == false) {
            $DATA['feed'] = 400;
            $DATA['msg'] = '<p>Wrong Password</p>';
        }elseif($pwdcheck == true){ 
            $_SESSION['member'] = $name;

            $DATA['id'] = $row['dist_id'];
            $DATA['name'] = $row['dist_name'];
            $DATA['feed'] = 200;
            $DATA['msg'] = '<p>Logged In</p>';
        }
    }else{
        $DATA['feed'] = 400;
        $DATA['msg'] = '<p>User not found</p>';
    }
}else{
    $DATA['feed'] = 400;
    $DATA['msg'] = '<p>User not found</p>';
}
echo json_encode($DATA,true);