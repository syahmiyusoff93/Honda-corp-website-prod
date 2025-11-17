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

if(!isset($_POST['tk']) || !isset($_SESSION['tk'])){ 
    exit('no token');
}else{
    if($_POST['tk'] !== $_SESSION['tk'] ){ 
        exit('invalid token');
    }
    unset($_POST['tk']);
        unset($_SESSION['tk']);
}


include '../config.php';
include '../class/loop.pro.class.php';
include '../class/mail.class.php';
include '../class/data.booking.inspection.class.php';

//prepare message
$que = explode('($$)', $_POST['que']);
$c = count($que);
$message = ''; 

// for($i=0;$i<$c;$i++){
//     $info = empty($_POST[$que[$i]])?'':$MAIL->cleanIt( $_POST[$que[$i]] );
//     $_POST[$que[$i]] = empty($_POST[$que[$i]])?'':$MAIL->cleanIt( $_POST[$que[$i]] );

//     if( !empty($info) )
//         $message .= '<p><span style="text-transform: uppercase;"><b>'.str_replace('%', ' ', $que[$i]).'</b></span>:<br>'.$info.'</p>';
// } 

$data = $_POST;
foreach ($data as $key => $value) {
    if ($key != 'que') {
        $message .= '<p><span style="text-transform: uppercase;"><b>'.$key.'</b></span>:<br>'.$value.'</p>';
    }
}


$ID = $_GET['id'];

$INSPECT->saveData($CON, $_POST);
 
// boundary 
$semi_rand = md5(time()); 
$MAIL->mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

if( $MAIL->checkIfAttachementAvailable ($_FILES) ){
    $message = $MAIL->getMessageWithAttach($_POST, $_FILES, $message);
    $headers = $MAIL->getHeaderWithAttach($_POST);
}else{
    $message = $MAIL->getMessage($message);
    $headers = $MAIL->getHeader($_POST);
} 
 
$comp = $profile->company($CON, ''); 

$to  = $MAIL->checkMailInCharge($CON, $ID, $comp); 
$subject = $MAIL->getSubject($_POST, $comp);

// if(mail($to,$subject,$message,$headers)){
//     echo "$subject <br> $message <br> sendto: $to <br>";
// }
$MAIL->sendmailto($to,$subject,$message);
 
//=============================
//Send noti to requester

$BASE = '../src/doc';
$to = $message = $subject = $headers = '';
$to = $MAIL->mailFilt($_POST['Email']);
$subject = 'Honda Certified Used Car (HCUC): Inspection Booking Received';
$name = $MAIL->cleanIt($_POST['Name']);
 
$message = "<p>Dear $name,</p>
<p>Thank you for your inspection booking with Honda Certified Used Car (HCUC). We are pleased to confirm your interest to proceed with the inspection. A representative from the Dealership will reach out to you soonest.</p>
<p>We look forward to serving you!</p>
<p>Best regards,<br>
Honda Certified Used Car (HCUC)</p>";

$message = $MAIL->getMessage($message);
$headers = $MAIL->getHeaderForRequestor($_POST);
 
// if(mail($to,$subject,$message,$headers)){ 
//     echo " sent to $to<br>";
// }
$MAIL->sendmailto($to,$subject,$message);


exit();