<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailjetController extends Controller
{
    private function execCurl($url, $payload, $POST=1, $put=false){
        // Initialize a CURL session.
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, $POST);
        if($put) curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");

        curl_setopt($ch, CURLOPT_USERPWD, getenv('MJ_APIKEY_PUBLIC').':'.getenv('MJ_APIKEY_PRIVATE'));
        if($POST)
            curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode($payload) );
        curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        // Return Page contents.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;

    }
    public function addMailingList($contact_ID){
        $listid = 1907349; // empty test list
        //$listid = 10046676; // testlist - using actual list
        //
        if(config('global.STAGE')=='live'){
            //$listid = 10045540; // actual Honda EDM list
            $listid = 10046817; // "Existing EDM List + Newsletter integration"
        }

        $url = "https://api.mailjet.com/v3/REST/contact/$contact_ID/managecontactslists";

        $payload['ContactsLists'][] = ['Action'=>'addforce', 'ListID'=>$listid];
        $result = $this->execCurl($url, $payload);

        //dd($result);
        return true;

    }

    public function updateContact($contact_ID, $userArr){
         // From URL to get webpage contents.
         $url = "https://api.mailjet.com/v3/REST/contactdata/$contact_ID";

         //dd($userArr);
         $payload['Data'][] = ['Name'=>'Firstname', 'Value'=>$userArr['name']];
         $payload['Data'][] = ['Name'=>'name', 'Value'=>$userArr['name']];
         $payload['Data'][] = ['Name'=>'is_owner', 'Value'=> is_array($userArr['model_own']) ? 'true' : 'false'];
         $payload['Data'][] = ['Name'=>'model_own', 'Value'=> is_array($userArr['model_own']) ? implode(',',$userArr['model_own']) : ''];
         $payload['Data'][] = ['Name'=>'model_interest', 'Value'=> is_array($userArr['model_interest']) ? implode(',',$userArr['model_interest']) : ''];
         $payload['Data'][] = ['Name'=>'phone', 'Value'=> $userArr['phone']];

         $result = $this->execCurl($url, $payload, 1, true);
         //dd('E: '.$result);
         $result = json_decode($result);

         return $result;
    }

    public function addContact($userArr){

        $uid = $this->getUserIDbyEmail($userArr['email']);

        if($uid){
            return $uid;
        }

        // From URL to get webpage contents.
        $url = "https://api.mailjet.com/v3/REST/contact";

        $payload['IsExcludedFromCampaigns'] = 'false';
        $payload['Name'] = $userArr['name'];
        //$payload['Firstname'] = $userArr['name'];
        $payload['Email'] = $userArr['email'];

        //$payload['Data'][] = ['Name'=>'Firstname', 'Value'=>$userArr['name']];

        $result = $this->execCurl($url, $payload);
        //dd($result);
        $result = json_decode($result);
        //dd(@$result->Data[0]->ID);

        if(!empty($result->Data[0]->ID)){
            return $result->Data[0]->ID;
        }

        return false;

    }

    public function getUserIDbyEmail($email){
        $email = urlencode($email);
        $url = "https://api.mailjet.com/v3/REST/contact/$email";
        $result = $this->execCurl($url, null, 0);
        $result = json_decode($result);

        if(!empty($result->Data[0]->ID)){
            return $result->Data[0]->ID;
        }

        return false;
    }

    public function saitest(){
        $userArr['name'] = 'Abg Sai';
        $userArr['email'] = 'himself4848GGF12@saiyusoff.com';
        $uid = $this->addContact($userArr);
        if(!$uid) {
            return 'error: 901';
        }
        $this->addMailingList($uid);
        return 'awesome! '.$userArr['email'];
    }

}
