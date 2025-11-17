<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use PHPMailer\PHPMailer\PHPMailer;

class ResendFailedEmails implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        //send enq 
        $this->sendEnq();
        //send fdb
        $this->sendFdb();
        //send hip
        $this->sendHIP();
    }

    public function sendHIP(){

        // Fetch records from formdata_enq where sent_status = 0
        $failedEmails = DB::table('formdata_hip')
            ->where('sent_status', '0')
            ->where('added_at', '>', '2025-06-09') // Ensure the date format matches 'YYYY-MM-DD'
            ->get();

        foreach ($failedEmails as $email) {
            try {
                $to = json_decode($email->payload, true)['iemail'] ?? null;
                $toname = json_decode($email->payload, true)['fname'] ?? null;
                $uuid = $email->assigned_id;

                $payload = json_decode($email->payload, true);
                $submission_type_title = "HIP";
                $uuid = $email->assigned_id;
                $name = $payload['name'];
                $nric = $payload['nric'];
                $iemail = $payload['email'];
                $phone = $payload['phone'];
                $plateno = $payload['plate'];
                $dealer = $payload['dealer'];
                $location = $payload['location'];
                $timestamp = $email->added_at;
                
                //build content
                $spanstart = '<br><span style="display:inline-block; width:150px">';
                $content = '';
                $content .= '<br><br>We have received a Honda Insurance Plus enquiry with the following information:<br><br>';
                $content .= $spanstart.'Name</span> : '.$name;
                $content .= $spanstart.'NRIC</span> : '.$nric;
                $content .= $spanstart.'Email</span> : '.$iemail;
                $content .= $spanstart.'Phone</span> : '.$phone;
                $content .= $spanstart.'Vehicle Reg. Number</span> : '.$plateno;
                $content .= '<br>';
                $content .= $spanstart.'Preferred Dealer</span> : '.$dealer;
                $content .= $spanstart.'Location</span> : '.$location;
                $content .= '<br>';
                $content .= $spanstart.'Request ID</span> : '.$uuid;
                $content .= $spanstart.'Sent at</span> : '.$timestamp;
                $body = $this->buildBody($content);
                
                $subject = '['.$uuid.'] HiP Enquiry: '. $iemail;

                $recipients = config('global.webconfig')->email_hip;

                if ($this->sendTheEmail($recipients, "HiP Support", $subject, $body)) {
                    // Update the sent_status to 1
                    DB::table('formdata_hip')->where('id', $email->id)->update([
                        'sent_status' => 'sent'
                    ]);
                    Log::info("Email resent successfully to: $to");
                } else {
                    Log::error("Failed to resend email to: $to");
                }
            } catch (\Exception $e) {
                Log::error("Exception while resending email: " . $e->getMessage());
            }
        }
    }

    public function sendEnq(){
        // Fetch records from formdata_enq where sent_status = 0
        $failedEmails = DB::table('formdata_enq')
            ->where('sent_status', '0')
            ->where('added_at', '>', '2025-04-02') // Ensure the date format matches 'YYYY-MM-DD'
            ->get();

        foreach ($failedEmails as $email) {
            try {
                $to = 'custcare.online@honda.com.my';
                $toname = 'Customer Care';

                $payload = json_decode($email->payload, true);
                $submission_type_title = "";
                if($payload['category']=='enq'){
                    $submission_type_title = 'Enquiry';
                } else {
                    $submission_type_title = 'Feedback';
                }
                $uuid = $email->assigned_id;
                $fname = $payload['fname'];
                $iemail = $payload['iemail'];
                $phone = $payload['phone'];
                $ititle = $payload['ititle'];
                $enquirytype = $payload['enquirytype'];
                $commentContent = $payload['commentContent'];
                $hondaowner = $payload['hondaowner'] ?? null;
                $subject = "[".$uuid."] General Enquiry: ". $iemail;
                $timestamp = $email->added_at;
                
                //build content
                $spanstart = '<br><span style="display:inline-block; width:150px">';
                $content = '';
                $content .= $submission_type_title . ' Submission';
                $content .= '<table>';
                $content .= $this->addContentRow('Ref No', $uuid);
                $content .= $this->addContentRow('Owner Type', $hondaowner=='on' ? 'Owner' : 'Non-owner');
                $content .= $this->addContentRow('Title', !empty($ititle) ? $ititle : 'unspesified');
                $content .= $this->addContentRow('Name', $fname);
                $content .= $this->addContentRow('Email', $iemail);
                $content .= $this->addContentRow('Mobile No.', $phone);
                $content .= $this->addContentRow('Phone', $phone);
                $content .= $this->addContentRow('Submission Date', $timestamp);
                $content .= $this->addContentRow($submission_type_title . ' Type', $enquirytype);
                $content .= $this->addContentRow($submission_type_title . ' Content', $commentContent);
                $content .= '</table>';
                $body = $this->buildBody($content);

                if ($this->sendTheEmail($to, $toname, $subject, $body, $iemail, $fname)) {
                    // Update the sent_status to 1
                    DB::table('formdata_enq')->where('id', $email->id)->update([
                        'sent_status' => 'sent'
                    ]);
                    Log::info("Email resent successfully to: $to");
                } else {
                    Log::error("Failed to resend email to: $to");
                }
            } catch (\Exception $e) {
                Log::error("Exception while resending email: " . $e->getMessage());
            }
        }
    }

    public function sendFdb(){
        // Fetch records from formdata_enq where sent_status = 0
        $failedEmails = DB::table('formdata_fdb')
            ->where('sent_status', '0')
            ->where('added_at', '>', '2025-04-02') // Ensure the date format matches 'YYYY-MM-DD'
            ->get();

        foreach ($failedEmails as $email) {
            try {
                $to = 'custcare.online@honda.com.my';
                $toname = 'Customer Care';

                $payload = json_decode($email->payload, true);
                $submission_type_title = "";
                if($payload['category']=='enq'){
                    $submission_type_title = 'Enquiry';
                } else {
                    $submission_type_title = 'Feedback';
                }
                $uuid = $email->assigned_id;
                $fname = $payload['fname'];
                $iemail = $payload['iemail'];
                $phone = $payload['phone'];
                $ititle = $payload['ititle'];
                $hondaowner = $payload['hondaowner'] ?? null;
                $enquirytype = $payload['enquirytype'];
                $commentContent = $payload['commentContent'];
                $timestamp = $email->added_at;
                $subject = "[".$uuid."] Feedback: ". $iemail;
                
                //build content
                $spanstart = '<br><span style="display:inline-block; width:150px">';
                $content = '';
                $content .= $submission_type_title . ' Submission';
                $content .= '<table>';
                $content .= $this->addContentRow('Ref No', $uuid);
                $content .= $this->addContentRow('Owner Type', $hondaowner=='on' ? 'Owner' : 'Non-owner');
                $content .= $this->addContentRow('Title', !empty($ititle) ? $ititle : 'unspesified');
                $content .= $this->addContentRow('Name', $fname);
                $content .= $this->addContentRow('Email', $iemail);
                $content .= $this->addContentRow('Mobile No.', $phone);
                $content .= $this->addContentRow('Phone', $phone);
                $content .= $this->addContentRow('Submission Date', $timestamp);
                $content .= $this->addContentRow($submission_type_title . ' Type', $enquirytype);
                $content .= $this->addContentRow($submission_type_title . ' Content', $commentContent);
                $body = $this->buildBody($content);

                if ($this->sendTheEmail($to, $toname, $subject, $body, $iemail, $fname)) {
                    // Update the sent_status to 1
                    DB::table('formdata_fdb')->where('id', $email->id)->update([
                        'sent_status' => 'sent'
                    ]);
                    Log::info("Email resent successfully to: $to");
                } else {
                    Log::error("Failed to resend email to: $to");
                }
            } catch (\Exception $e) {
                Log::error("Exception while resending email: " . $e->getMessage());
            }
        }
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
        $Body     .= '    <br><div style="padding:20px; text-align:center; font-size:10px;">END OF TRANSMISSION. THIS IS AN AUTOMATED EMAIL./div>';
        $Body     .= '</div>';
        return $Body;
    }

    private function sendTheEmail($toemail, $toname, $subject, $body, $from='webmaster@honda.net.my', $from_name='HondaMY Webmaster'){

        $mail = new PHPMailer(true);
        $mail->AddEmbeddedImage('img/hondalogo.PNG', 'hondalogo', 'hondalogo.PNG');
        $withoutexplode_toemail = $toemail;
        $toemail = explode(',',$toemail);

        try {
            if('hipsupport@honda.net.my' == $withoutexplode_toemail){
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Hostname = "www.honda.com.my";
                $mail->Helo = $mail->Hostname;
                $mail->Host       = 'mail.honda.com.my';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'no-reply@honda.com.my';
                $mail->Password   = 'c7glq4Wuglb@';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
                $mail->SMTPDebug = 2; // Options: 0 = off, 1 = client messages, 2 = client and server messages, 3 = more verbose, 4 = extreme
                $mail->Debugoutput = 'error_log'; // Log to PHP error_log
                $mail->setFrom("no-reply@honda.com.my", "HondaMY Webmaster");
                $from = "no-reply@honda.com.my";
            }
            else if('custcare.online@honda.com.my' == $withoutexplode_toemail){
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Hostname = "www.honda.com.my";
                $mail->Helo = $mail->Hostname;
                $mail->Host       = 'mail.honda.com.my';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'no-reply@honda.com.my';
                $mail->Password   = 'c7glq4Wuglb@';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
                $mail->SMTPDebug = 2; // Options: 0 = off, 1 = client messages, 2 = client and server messages, 3 = more verbose, 4 = extreme
                $mail->Debugoutput = 'error_log'; // Log to PHP error_log
                $mail->setFrom($from,$from_name);
                // $from = "no-reply@honda.com.my";
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

    private function addContentRow($label, $content){
        return '
            <tr>
                <td>'.$label.'</td>
                <td> : </td>
                <td>'.$content.'</td>
            </tr>
        ';
    }

}
