<?php
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require __DIR__ . '/../vendor/autoload.php';

if(!class_exists('MAIL')){
class MAIL { 

    public $mime_boundary;

    public function cleanIt($string) { 
        $string = strip_tags($string);
        $string = preg_replace('/[\\\'"#!|()]/', '', $string); // Removes special chars.
        return htmlspecialchars($string);
     }
    public function mailFilt($mail) { 
        $mail = strip_tags($mail);
        $string = preg_replace('/[ cC]/', '', $mail); // Removes special chars.
        return htmlspecialchars($mail);
     }

    public function checkIfAttachementAvailable ($FILE) {  
        return isset($FILE) && (bool) $FILE && !empty($FILE['attachment']['name']);
    }
    public function getHeaderWithAttach($POST) {
        // email fields: to, from, subject, and so on  
        $headers = "From: ".$POST['Name']." <no_reply@honda.com>" . "\r\n".
        "Reply-To: ".$POST['Email']."\r\n";
        //$headers .= 'Cc: obn@sunglassvisionworld.com, info@sunglassvisionworld.com, waiwai@webtivate.com.my, spidy.bryan@gmail.com, bryan@webtivate.com.my, cyrus@webtivate.com.my, cyrus@sunglassvisionworld.com ' . '\r\n';
        $headers .= 'X-Mailer: PHP/' . phpversion(); 
        
          
        // headers for attachment 
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$this->mime_boundary}\""; 

        return $headers;
    }
    
    public function getHeader($POST){
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: ".$POST['Name']." <no_reply@honda.com>" . "\r\n";
        $headers .= "Reply-To: ".$POST['Email']."\r\n";
        //$headers .= 'Cc: obn@sunglassvisionworld.com, info@sunglassvisionworld.com, waiwai@webtivate.com.my, spidy.bryan@gmail.com, bryan@webtivate.com.my, cyrus@webtivate.com.my, cyrus@sunglassvisionworld.com';

        return $headers;
    }
    public function getMessage($message){
        return "<html>
                <head>
                <title>HTML email</title>
                </head>
                <body>
                $message
                </body>
                </html> ";  
    }
    public function getHeaderForRequestorWithAttach($POST){
        // email fields: to, from, subject, and so on  
        $headers = "From: Honda <no_reply@honda.com>" . "\r\n";
        //$headers .= "Reply-To: ".$POST['Email']."\r\n";
        //$headers .= 'Cc: obn@sunglassvisionworld.com, info@sunglassvisionworld.com, waiwai@webtivate.com.my, spidy.bryan@gmail.com, bryan@webtivate.com.my, cyrus@webtivate.com.my, cyrus@sunglassvisionworld.com ' . '\r\n';
        $headers .= 'X-Mailer: PHP/' . phpversion(); 
        
          
        // headers for attachment 
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$this->mime_boundary}\""; 

        return $headers;
    }
    public function getHeaderForRequestor($POST){
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Honda <no_reply@honda.com>" . "\r\n";
        //$headers .= "Reply-To: ".$POST['Email']."\r\n";
        //$headers .= 'Cc: obn@sunglassvisionworld.com, info@sunglassvisionworld.com, waiwai@webtivate.com.my, spidy.bryan@gmail.com, bryan@webtivate.com.my, cyrus@webtivate.com.my, cyrus@sunglassvisionworld.com';

        return $headers;
    }
    public function getMessageWithAttachInLocal($POST, $FILE, $DOC, $message) {
        // multipart boundary 
        $message = "This is a multi-part message in MIME format.\n\n" . "--{$this->mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
        $message .= "--{$this->mime_boundary}\n";

        // preparing attachments 
        $file = fopen($FILE,"rb");
        $data = fread($file,filesize($FILE));
        fclose($file);
        $data = chunk_split(base64_encode($data));
        $name = $DOC;
        $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" . 
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
        $message .= "--{$this->mime_boundary}\n"; 

        return $message;
    }
    public function checkIfDocumentAvailable($CON, $ID){
        $doc = '';

        $q_m = 'SELECT * FROM lists 
            WHERE id = "'.$ID.'" AND list_type = "i" AND list_status = "1"
            ORDER BY list_priority LIMIT 1;';

        $res_m = $CON->query($q_m); 
        while($item_m = $res_m->fetch_object()){
            if(!empty($item_m->list_doc)){ 
                $doc = $item_m->list_doc;
            } 
        }

        if( empty($doc) ) return false;
        else return $doc;
    }

    public function getMessageWithAttach($POST, $FILES, $message) { 
        $allowedExtensions = array("pdf","doc","docx","gif","jpeg","jpg","png","rtf","txt");

        $files = array();
        foreach($FILES as $fname=>$file) {
            $file_name = $file['name']; 
            $temp_name = $file['tmp_name'];
            $file_type = $file['type'];
            $path_parts = pathinfo($file_name);
            $ext = $path_parts['extension'];
            if(!in_array($ext,$allowedExtensions)) {
                die("File $file_name has the extensions $ext which is not allowed");
            }
            array_push($files,$file);
        }

        
        // multipart boundary 
        $message = "This is a multi-part message in MIME format.\n\n" . "--{$this->mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n"; 
        $message .= "--{$this->mime_boundary}\n";

        // preparing attachments
        for($x=0;$x<count($files);$x++){
            $file = fopen($files[$x]['tmp_name'],"rb");
            $data = fread($file,filesize($files[$x]['tmp_name']));
            fclose($file);
            $data = chunk_split(base64_encode($data));
            $name = $files[$x]['name'];
            $message .= "Content-Type: {\"application/octet-stream\"};\n" . " name=\"$name\"\n" . 
            "Content-Disposition: attachment;\n" . " filename=\"$name\"\n" . 
            "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
            $message .= "--{$this->mime_boundary}\n";
        }

        return $message;
    }
    public function checkMailInCharge($CON, $ID, $comp) {
        $to_mail = '';
 
        $q_m = 'SELECT * FROM lists 
        WHERE list_fid = "'.$ID.'" AND list_type = "i" AND list_status = "1"
        ORDER BY list_priority LIMIT 1;';

        $res_m = $CON->query($q_m); 

        while($item_m = $res_m->fetch_object()){
            if(!empty($item_m->list_link)){
                $tmp = json_decode($item_m->list_link, true);
                $to_mail = $tmp['redir'];
            } 
        } 
 
        if(empty($to_mail)){ 
            $comp['NEWemail'] = explode(',',$comp['cMail']);
            if (count($comp['NEWemail']) > 1) {
                $to_mail = $comp['cMail'];
            }else{
                if(is_array($comp['NEWemail'])){
                    $to_mail = $comp['NEWemail'][0];
                }else{
                    $to_mail = $comp['cMail'];
                }
            }
            
        }

        return $to_mail;
    }
    public function getSubject($POST, $comp) {
        $subject = 'Enquiry Mail';
        if( isset($POST['subject']) )
            if( !empty($POST['subject']) )
                $subject = $this->cleanIt($POST['subject']);

        $BY = '';
        if( isset($POST['Name']) )
            if( !empty($POST['Name']) )
                $BY = 'By '.$this->cleanIt($POST['Name']);
            
        $subject = "$subject from ".$comp['cName']."! ".$BY;
        
        return $subject;
    }

    public function sendmailto($to,$subject,$body){
        $mail = new PHPMailer(true);
        $mail->isSMTP();           
        $mail->Hostname = "www.honda.com.my";
        $mail->Helo = $mail->Hostname;
        $mail->Host       = '10.118.4.77'; 
        $mail->SMTPAuth   = false;
        $mail->Username   = '';
        $mail->Password   = '';
        $mail->SMTPSecure = '';
        $mail->Port       = 25;
        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true,
            ],
        ];
        $mail->SMTPDebug = 2; // Options: 0 = off, 1 = client messages, 2 = client and server messages, 3 = more verbose, 4 = extreme
        $mail->Debugoutput = 'error_log'; // Log to PHP error_log
        $mail->setFrom("hcuc@honda.com.my", "HondaMY Webmaster");

        $tos = explode(',', $to);
        foreach ($tos as $key => $value) {
            $mail->AddAddress($value);
        }

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    }
}
}
$MAIL = new MAIL();