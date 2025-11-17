<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MailjetController;

class DataController extends Controller
{
    public function processContactForm(Request $r){
        $r->validate([
            'g-recaptcha-response' => 'required|captcha',
        ]);
        //dd($r);
        if(!in_array($r->category, ['enq', 'fdb'])) abort(404); // only allow if type is within these parameters

        $timestamp = date("Y-m-d H:i:s");
        $formid = $this->saveACopy($r, $r->category);

        // send the email to Honda
        $mc = new MailController();
        $sentstatus = 0;
        $sentstatus = $mc->sendCRDtoHonda($formid,$timestamp, $r);

        // UPDATE THE EMAIL SEND STATUS OF THE DATAROW
        $this->updateSentStatusInDB($formid, $sentstatus);

        return redirect('customer-service/enquiry/form-submitted');
    }

    public function processNewsletterSubscription(Request $r){
        $r->validate([
            'fname' => 'required',
            'iemail' => 'required',
            'phone' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $formid = $this->saveACopy($r, 'nws');

        $userArr = ['email'=>$r->iemail, 'name'=>$r->fname, 'phone'=>$r->phone,'model_own'=>$r->currentmodel,'model_interest'=>$r->interestmodel];

        $mc = new MailjetController();
        $contact_ID = $mc->addContact($userArr);

        if($contact_ID) {
            $mc->addMailingList($contact_ID);
             // update data
            $mc->updateContact($contact_ID, $userArr);
            return redirect('/newsletter/subscribed/'.$contact_ID);
        }

        // if process failed
        abort(404);
        //dd($contact_ID);
    }

    public function processProfileUpdate(Request $r){

        /*
            UMP doesnt need data to be sent over, but just to save data to be extracted manuallh (duhhhhh).
        */

        $uuid = Str::uuid()->toString();

        // save a copy of the form data, in case Honda need it somehow.
        $formid = $this->saveACopy($r, 'ump', $uuid);

        // subscribe to Mailjet if opt-in
        if($r->newsletter=='on'){
            $userArr = ['email'=>$r->iemail, 'name'=>$r->fname, 'phone'=>$r->phone,'model_own'=>$r->vmodel, 'model_interest'=>''];
            $mc = new MailjetController();
            $contact_ID = $mc->addContact($userArr);
            if($contact_ID) {
                $mc->addMailingList($contact_ID);
                // update data
                $mc->updateContact($contact_ID, $userArr);
            }
        }

        return redirect('aftersales/update-profile/form-submitted');

    }

    public function processHIPSubmission(Request $r){
        $r->validate([
            'name' => 'required|string',
            'nric' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'plate' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // create a unique ID for this submission
        $uuid = Str::uuid()->toString();

        $timestamp = date("Y-m-d H:i:s");

        // save a copy of the form data, in case Honda need it somehow.
        $formid = $this->saveACopy($r, 'hip', $uuid);

        // send the email to Honda
        $mc = new MailController();
        $sentstatus = 0;
        $sentstatus = $mc->sendHIPtoHonda($formid, $r->name,$r->nric,$r->email,$r->phone,$r->plate,$r->location,$r->dealer, $timestamp);

        // UPDATE THE EMAIL SEND STATUS OF THE DATAROW
        $this->updateSentStatusInDB($formid, $sentstatus);

        return redirect('discover/honda-insurance-plus/form-submitted');

    }

    public function processCorpFleetSubmission(Request $r){
        $r->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // create a unique ID for this submission
        $uuid = Str::uuid()->toString();

        $timestamp = date("Y-m-d H:i:s");

        // save a copy of the form data, in case Honda need it somehow.
        $formid = $this->saveACopy($r, 'cfs', $uuid);

        // send the email to Honda
        $mc = new MailController();
        $sentstatus = 0;
        $sentstatus = $mc->sendCorpFleetSaleToHonda($formid, $r->coname,$r->coaddress,$r->city,$r->postcode,$r->name,$r->email,$r->phone, $timestamp);

        // UPDATE THE EMAIL SEND STATUS OF THE DATAROW
        $this->updateSentStatusInDB($formid, $sentstatus);

        return redirect('discover/corporate-fleet-sale/form-submitted');

    }

    public function saveACopy(Request $request, $type, $uuid=0, $sentstatus=0){

        // disable this first
        //return true;

        $jwtToken = env('JWT_SECRET');

        $payload = json_encode($_POST);

        $client = new \GuzzleHttp\Client([
            'verify' => false
        ]);

        $domain = env('APP_API_URL');
        $url = $domain.'savewebform/'.$type;

        $response = $client->post($url,  [
            'form_params'=>[
                'uuid' => $uuid,
                'payload' => $payload,
                'sentstatus' => 0,
                'initiator' => config('global.STAGE')
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $jwtToken,
                'Accept' => 'application/json',
            ]
        ]);
        // $response = $request->send();
        $out = json_decode($response->getBody()->getContents());  
        if($out->status == 'ok'){
            return $out->id;
        }

        //dd($response->getBody()->getContents());
        return false;
    }

    public function updateSentStatusInDB($id, $sentstatus){

        $jwtToken = env('JWT_SECRET');

        $payload = json_encode($_POST);

        $client = new \GuzzleHttp\Client([
            'verify' => false
        ]);

        $domain = env('APP_API_URL');
        $url = $domain.'savewebform/update/sentstatus';

        $response = $client->post($url,  [
            'form_params'=>[
                'id' => $id,
                'sentstatus' => $sentstatus,
                'initiator' => config('global.STAGE')
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $jwtToken,
                'Accept' => 'application/json',
            ]
        ]);
        
        return true;
    }
}
