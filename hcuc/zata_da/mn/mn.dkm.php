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

//prepare message
$que = explode('($$)', $_POST['que']);
$c = count($que);
$message = $address = '';

if( isset($_POST['address']) ){
    $address = '<p><span style="text-transform: uppercase;"><b>Address</b></span>:<br>
        '.$_POST['address']['line1'].'
        '.$_POST['address']['line2'].'
        '.$_POST['address']['postcode'].'
        '.$_POST['address']['state'].'
        '.$_POST['address']['country'].'
    </p>';

    unset( $_POST['address'] );
}

for($i=0;$i<$c;$i++){
    $info = empty($_POST[$que[$i]])?'':$_POST[$que[$i]];

    if( !empty($info) )
        $message .= '<p><span style="text-transform: uppercase;"><b>'.str_replace('%', ' ', $que[$i]).'</b></span>:<br>'.$info.'</p>';
}

$message .= $message.$address;

include '../config.php';
include '../class/loop.pro.class.php';
include '../class/mail.class.php';
$ID = $_GET['id'];

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
 

if(mail($to,$subject,$message,$headers)){
    echo "$subject <br> $message <br> sendto: $to";
}
exit();