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
include '../class/loop.pro.class.php';

$to_mail = '';
$comp = $profile->company($CON, '');
if(empty($to_mail)){
    $comp['NEWemail'] = explode(',',$comp['cMail']);
    
    if(is_array($comp['NEWemail'])) $to_mail = $comp['NEWemail'][0];
    else $to_mail = $comp['cMail'];
}
$to = $to_mail;
//$to = 'waiwaisew@gmail.com';


$subject = "Subcription Mail from ".$comp['cName']."! By ".$_POST['Email'];

$message = "<html>
            <head>
            <title>HTML email</title>
            </head>
            <body>
            <p>Hi Alfranko,</p>
            <p>Please be inform that you have a new news subscriber: $_POST[Email]</p>
            <p>Regards</p>
            </body>
            </html>
            ";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= "From: New Subscriber <no-reply@alfranko.com>" . "\r\n".
            "Reply-To: ".$_POST['Email']."\r\n";
$headers .= 'Cc: '.$comp['cMail'] . "\r\n";

if(mail($to,$subject,$message,$headers)) echo "$subject <br> $message <br> sendto: $to";
exit();