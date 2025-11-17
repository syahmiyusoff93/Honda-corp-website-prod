<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


use Illuminate\Support\Facades\Http;


class MailController extends Controller
{

    public function phpMailerTest(){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            //$mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp1.example.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'user@example.com';                     // SMTP username
            $mail->Password   = 'secret';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('webmaster@honda.net.my', 'HondaMY Webmaster');
            $mail->addAddress('saiful.yusoff@gmail.com', 'Sai GMAIL');     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            $mail->addReplyTo('noreply@honda.net.my', 'HondaMY');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            // Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject - '. date("Y-m-d H:i:s");
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        return 'ok';
    }

    private function buildBody($content){
        //$yt = '<iframe width="560" height="315" src="https://www.youtube.com/embed/msvw0iIi1FQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        $Body     = '<div style="font-family:Helvetica, Arial; font-size:13px; max-width:500px; margin:auto; color:#666666; ">';
        $Body     .= '    <div style="border:1px solid #ddd;padding:20px; ">';
        $Body     .= '        <img src="cid:hondalogo" width="100" style="margin-bottom:20px; width:100px" alt="Honda logo" /><br>';
        $Body     .=              $content;
        $Body     .= '        <br>';
        $Body     .= '    </div>';

        $Body     .= '     <br><div style="padding:20px; text-align:center; font-size:10px; font-style:italic;">DISCLAIMER:<br>
                                The contents of this e-mail and its attachment, if any ("message"), are intended for the named addressee only and may contain privileged and/or confidential information. If you are not the named addressee or if you have inadvertently received this message, you should not disseminate, distribute, use, print and/or copy this message. Please notify the sender immediately by return e-mail and delete the message. Dentsu Aegis Network, Isobar Malaysia and HONDA MALAYSIA SDN. BHD. disclaims all liability for any error, loss or damage arising from the message being infected by computer virus or other contamination. Any views, opinions and/or other information in the message that do not relate to the official business of Dentsu Aegis Network, Isobar Malaysia or HONDA MALAYSIA SDN. BHD. shall be deemed as neither given nor endorsed by Dentsu Aegis Network, Isobar Malaysia or HONDA MALAYSIA SDN. BHD. respectively.
                            </div>';
        $Body     .= '    <br><div style="padding:20px; text-align:center; font-size:10px;">END OF TRANSMISSION. THIS IS AN AUTOMATED EMAIL. /SAI-MMXX</div>';
        $Body     .= '</div>';
        return $Body;
    }

    public function sendCorpFleetSaleToHonda($uuid, $coname,$coaddress,$city,$postcode,$name,$email,$phone, $timestamp){

        $spanstart = '<br><span style="display:inline-block; width:150px">';
        $content = '';
        if(config('global.STAGE')!='live'){
            $content = '<br>[TEST] ';
        }
        $content .= '<br><br>We have received a Corporate Fleet Sale enquiry with the following information:<br><br>';
        $content .= $spanstart.'Company Name</span> : '.$coname;
        $content .= $spanstart.'Company Address</span> : '.$coaddress;
        $content .= $spanstart.'City/Town</span> : '.$city;
        $content .= $spanstart.'Postcode</span> : '.$postcode;
        $content .= '<br>';
        $content .= $spanstart.'Submitted by</span> : '.$name;
        $content .= $spanstart.'Email</span> : '.$email;
        $content .= $spanstart.'Contact Number</span> : '.$phone;
        $content .= '<br>';
        $content .= $spanstart.'Request ID</span> : '.$uuid;
        $content .= $spanstart.'Sent at</span> : '.$timestamp;

        //$this->generateDataDisplayRow($label, $fieldname, $value);

        $body = $this->buildBody($content);
        $subject = '['.$uuid.'] Corporate Fleet Sale Enquiry: '. $coname;
        if(config('global.STAGE')=='live'){
            //$subject = 'Corporate Fleet Sale Enquiry: '.$coname.' ['. $timestamp.']';
        }

        return $this->sendTheEmail(config('global.webconfig')->email_corpfleetsale, "Corp Fleet Sale Support", $subject, $body);

    }

    public function sendHIPtoHonda($uuid, $name,$nric,$email,$phone,$plateno,$location,$dealer, $timestamp){

        $spanstart = '<br><span style="display:inline-block; width:150px">';
        $content = '';
        if(config('global.STAGE')!='live'){
            $content = '<br>[TEST] ';
        }
        $content .= '<br><br>We have received a Honda Insurance Plus enquiry with the following information:<br><br>';
        $content .= $spanstart.'Name</span> : '.$name;
        $content .= $spanstart.'NRIC</span> : '.$nric;
        $content .= $spanstart.'Email</span> : '.$email;
        $content .= $spanstart.'Phone</span> : '.$phone;
        $content .= $spanstart.'Vehicle Reg. Number</span> : '.$plateno;
        $content .= '<br>';
        $content .= $spanstart.'Preferred Dealer</span> : '.$dealer;
        $content .= $spanstart.'Location</span> : '.$location;
        $content .= '<br>';
        $content .= $spanstart.'Request ID</span> : '.$uuid;
        $content .= $spanstart.'Sent at</span> : '.$timestamp;

        //$this->generateDataDisplayRow($label, $fieldname, $value);

        $body = $this->buildBody($content);
        $subject = '['.$uuid.'] HiP Enquiry: '. $email;
        if(config('global.STAGE')=='live'){
            //$subject = 'Honda Insurance Plus Enquiry: '.$name.' ['. $timestamp.']';
        }

        $recipients = config('global.webconfig')->email_hip;

        return $this->sendTheEmail($recipients, "HiP Support", $subject, $body);
    }

    private function addContentRow($label, $content){
        return '
            <tr>
                <td>'.$label.'</td>
                <td> : </td>
                <td>'.$content.'</td>
            </tr>
        ';
    }

    public function sendCRDtoHonda($uuid, $timestamp, $r){
        /*
        i.	Comment ID / Ref No
        ii.	Owner Type
        iii.	Title
        iv.	Name
        v.	Email
        vi.	Mobile No.
        vii.	Phone
        viii.	Vehicle Reg. No.
        ix.	Mileage
        x.	NRIC (for Feedback Form only)
        xi.	Dealer State (for Feedback Form only)
        xii.	Dealer Name (for Feedback Form only)
        xiii.	Submission Date (with timestamp)
        xiv.	Comment / Enquiry Type
        xv.	The Comment / Enquiry

        */

        if($r->category=='enq'){
            $submission_type_title = 'Enquiry';
        } else {
            $submission_type_title = 'Feedback';
        }
        $dummy = '-';

        $spanstart = '<br><span style="display:inline-block; width:150px">';
        $content = '';
        if(config('global.STAGE')!='live'){
            $content .= '<br>[TEST] ';
        }
        $content .= $submission_type_title . ' Submission';
        $content .= '<table>';
        $content .= $this->addContentRow('Ref No', $uuid);
        $content .= $this->addContentRow('Owner Type', $r->hondaowner=='on' ? 'Owner' : 'Non-owner');
        $content .= $this->addContentRow('Title', !empty($r->ititle) ? $r->ititle : 'unspesified');
        $content .= $this->addContentRow('Name', $r->fname);
        $content .= $this->addContentRow('Email', $r->iemail);
        $content .= $this->addContentRow('Mobile No.', $r->phone);
        $content .= $this->addContentRow('Phone', $r->phone);

        if($r->hondaowner=='on'){
        } else if(!empty($r->relationship) && $r->category=='fdb'){
            $content .= $this->addContentRow('Relationship', $r->relationship);
        }
        if(!empty($r->vehiclenumber)){
            $content .= $this->addContentRow('Vehicle Reg. No.', $r->vehiclenumber);
        }
        if(!empty($r->mileage)){
            $content .= $this->addContentRow('Mileage', $r->mileage);
        }
        if(!empty($r->nric) && $r->category=='fdb'){
            $content .= $this->addContentRow('NRIC', $r->nric);
        }
        //$content .= $this->addContentRow('Dealer State', $dummy);
        if(!empty($r->dealer)){
            $content .= $this->addContentRow('Dealer Name', $r->dealer);
        }
        $content .= $this->addContentRow('Submission Date', $timestamp);
        $content .= $this->addContentRow($submission_type_title . ' Type', $r->enquirytype);
        $content .= $this->addContentRow($submission_type_title . ' Content', $r->commentContent);
        $content .= '</table>';


        //$this->generateDataDisplayRow($label, $fieldname, $value);

        $body = $this->buildBody($content);

        # ENQUIRY & FEEDBACK form email custom redirect to respective recipient and subjects.
        $sub_custom = $r->category=='enq' ? ' General Enquiry ' : ' Feedback ' ;
        $rec_custom = $r->category=='enq' ? config('global.webconfig')->email_enquiry : config('global.webconfig')->email_comment;

        $subject = '['.$uuid.']' . $sub_custom . ': ' . $r->iemail;

        return $this->sendTheEmail($rec_custom, "Customer Care", $subject, $body, $r->iemail, $r->iemail);
    }

    public function sendTheEmail($toemail, $toname, $subject, $body, $from='webmaster@honda.net.my', $from_name='HondaMY Webmaster'){

        $mail = new PHPMailer(true);
        $mail->AddEmbeddedImage('img/hondalogo.PNG', 'hondalogo', 'hondalogo.PNG');

        if(config('global.STAGE')!='live'){
            $subject = $subject . ' [TEST] ';
        }

        $withoutexplode_toemail = $toemail;
        $toemail = explode(',',$toemail);

        try {
            if(config('global.STAGE')=='local' ){
                //  use GMAIL
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = env('MAIL_GMAIL_HOST', 'smtp.gmail.com');                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = env('MAIL_GMAIL_USERNAME', 'hondasmtpmail@gmail.com');                     // SMTP username
                $mail->Password   = env('MAIL_GMAIL_PASSWORD');                               // SMTP password
                $mail->SMTPSecure = env('MAIL_GMAIL_ENCRYPTION', 'ssl');         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = env('MAIL_GMAIL_PORT', 465);
                $mail->setFrom(env('MAIL_GMAIL_USERNAME', 'hondasmtpmail@gmail.com'), 'HondaMY Webmaster');
            } 
            else if(config('global.webconfig')->email_hip == $withoutexplode_toemail){
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Hostname = env('MAIL_HONDA_HOSTNAME', 'www.honda.com.my');
                $mail->Helo = $mail->Hostname;
                $mail->Host       = env('MAIL_HONDA_HOST', 'mail.honda.com.my');
                $mail->SMTPAuth   = true;
                $mail->Username   = env('MAIL_HONDA_USERNAME', 'no-reply@honda.com.my');
                $mail->Password   = env('MAIL_HONDA_PASSWORD');
                $mail->SMTPSecure = env('MAIL_HONDA_ENCRYPTION', 'tls');
                $mail->Port       = env('MAIL_HONDA_PORT', 587);
                $mail->SMTPDebug = 2; // Options: 0 = off, 1 = client messages, 2 = client and server messages, 3 = more verbose, 4 = extreme
                $mail->Debugoutput = 'error_log'; // Log to PHP error_log
                $mail->setFrom(env('MAIL_HONDA_FROM_ADDRESS', 'no-reply@honda.com.my'), env('MAIL_HONDA_FROM_NAME', 'HondaMY Webmaster'));
                $from = env('MAIL_HONDA_FROM_ADDRESS', 'no-reply@honda.com.my');
            }
            else if(config('global.webconfig')->email_enquiry == $withoutexplode_toemail){
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Hostname = env('MAIL_HONDA_HOSTNAME', 'www.honda.com.my');
                $mail->Helo = $mail->Hostname;
                $mail->Host       = env('MAIL_HONDA_HOST', 'mail.honda.com.my');
                $mail->SMTPAuth   = true;
                $mail->Username   = env('MAIL_HONDA_USERNAME', 'no-reply@honda.com.my');
                $mail->Password   = env('MAIL_HONDA_PASSWORD');
                $mail->SMTPSecure = env('MAIL_HONDA_ENCRYPTION', 'tls');
                $mail->Port       = env('MAIL_HONDA_PORT', 587);
                $mail->SMTPDebug = 2; // Options: 0 = off, 1 = client messages, 2 = client and server messages, 3 = more verbose, 4 = extreme
                $mail->Debugoutput = 'error_log'; // Log to PHP error_log
                $mail->setFrom($from,$from_name);
                // $from = env('MAIL_HONDA_FROM_ADDRESS', 'no-reply@honda.com.my');
            }
            else {
                // use internal sendmail
                $mail->setFrom($from, $from_name);
            }


            $mail->addReplyTo($from, $from_name);
            foreach($toemail as $r){
                $r = trim($r);
                if (filter_var($r, FILTER_VALIDATE_EMAIL)) {
                    $mail->AddAddress($r);
                }
            }

            // $mail->addAddress('saiful.yusoff@isobar.com', 'Sai ISOBAR');     // Add a recipient
            // $mail->addBCC('saiful.yusoff@gmail.com', 'Sai GMAIL');     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

            $sentstatus = 'sent';

        } catch (Exception $e) {
            $sentstatus = "Mailer Error: {$mail->ErrorInfo}";
            //return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        //dd($sentstatus);
        return $sentstatus;
    }

    public function mailTest(){
        return $this->sendTheEmail('barium025@yahoo.com', "Baharum", 'trial transmission - '. date('Y-m-d H:i:s'), 'This is the body. '.microtime(), 'deltaecho@honda.com.my', 'deltaecho@honda.com.my');
    }



    // LEGACY FN ------------------------------------------------------------------------------------------

    private function generateDataDisplayRow($label, $fieldname, $value){

        $class_parent = 'display:block; margin-bottom:20px; color:#333333;';
        $class_label = 'display:inline-block; width:100px; fonnt-weight:bold; vertical-align:top;';
        $class_value = 'display:inline-block; width:350px; vertical-align:top;';
        $class_separator = 'display:inline-block; width:20px; text-align:center; vertical-align:top;';

        $out = '<div style="'.$class_parent.'" id="_hondafdata_'.$fieldname.'_">
                    <div style="'.$class_label.'">'.$label.'</div>
                    <div style="'.$class_separator.'">:</div>
                    <div style="'.$class_value.'">'.$value.'</div>
                </div>';

        return $out;
    }

    private function makeFeedbackformHTML($input_data){

        $html = '  <div style="width:100%; max-width:530px; font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#333333; background-color:#f7f7f7;">
                        <div style="width:calc(100% - 20px); padding:10px; background-color:#000000;"> <img src="cid:hondalogo" width="100" style="margin-bottom:20px; width:100px" alt="Honda logo" /></div>
                        <div style="width:calc(100% - 50px); margin:15px; padding:10px; background-color:#ffffff;">'.$input_data.'</div>
                        <div style="width:100%; min-height:10px; background-color:#000000;"></div>
                        <div style="width:calc(100% - 20px); padding:10px; font-style:italic; font-size:0.8em; background-color:#ffffff; color:#333333;">
                            DISCLAIMER: <br/>
                            The contents of this e-mail and its attachment, if any, are intended for the named addressee only and may contain privileged and/or confidential information. If you are not the named addressee or if you have inadvertently received this message, you should not disseminate, distribute, use, print and/or copy this message. Please notify the sender immediately by return e-mail and delete the message. HONDA MALAYSIA SDN. BHD. disclaims all liability for any error, loss or damage arising from the message being infected by computer virus or other contamination. Any views, opinions and/or other information in the message that do not relate to the official business of HONDA MALAYSIA SDN. BHD. shall be deemed as neither given nor endorsed by HONDA MALAYSIA SDN. BHD.
                        </div>
                    <div>';
        return $html;

    }

    private function prepEmaildata($label, $data){
        // used by corporate fleet sale form
        $labelstyle = 'width:200px; display:inline-block';
        $datastyle = 'display:table-cell;';

        return '<tr>
                    <td width="200">'.$label.'</td>
                    <td width="10"> : </td>
                    <td>'. $data . '</td>
                </tr>' ;
    }
}
