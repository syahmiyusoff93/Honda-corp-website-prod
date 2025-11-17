@php
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'dealers_all.json', false, $honda_api_context);
    $data = json_decode($data);
    $dealer_list = $data->payload;

    //dd($dealer_list);

    $statelist[] = 'All locations';
    $dealers[] = [0, 'Please select a dealer', ''];
    foreach ($dealer_list as $key => $value) {
        if(!in_array($value->state, $statelist) && !empty($value->state)){
            $statelist[] = $value->state;
        }
        $dealers[] = [$value->name.', '.$value->city, ($key+1).'. '.$value->name, $value->state];
    }


    sort($statelist);
    //dd($statelist);

@endphp


@extends('layouts.base')


@section('content')

<style>
    .page-header {text-align: center; padding: 40px 20px; max-width: 810px; margin:auto;}
    .page-header h2 {line-height: 1.5em; letter-spacing: unset; font-size: 1.6rem; margin: 20px auto;}
    .page-header .masthead { margin: 20px 0;}
    .page-header p {text-align: center; padding-top:0; line-height: 1.5em; color:#5E6063;}

    .custom-size {
        max-width: 274px;
        max-height: 82px;
    }
</style>



<div class="body-wrapper ">

    <div class="page-header">
        <img class="masthead custom-size" src="{{url('img/discover/hip/hip logo ori-02.png')}}" alt="">
        <h2>Fill in the form and get contacted by our Authorised Dealer. Don't miss out on HiP benefits!</h2>
        <p style="">
            From roadside assistance to speedy claim approvals, take it easy knowing you're given the best value for an insurance plan that is built, protected and repaired by Honda, exclusively.
        </p>
    </div>


    <form id="mainform" action="/discover/honda-insurance-plus/submit" method="POST" class="bg-grey">
        @csrf

        <div class="globalform width-contained">

            {{-- START FORM SECTION --}}
                {!! form_generate_h4('1. YOUR DETAILS', false) !!}
                <div class="formsection">
                    {{-- EVERY <ul> IS A ROW --}}
                    <ul class="formrow">
                        {!! form_generate_text('NAME', 'name', 'w50', '', 'Your name', 'Please tell us your name') !!}
                        {!! form_generate_text('NRIC', 'nric', 'w50', '', 'MyKad/Military ID/Police ID/Passport', 'Please provide ID number') !!}
                    </ul>
                    <ul class="formrow">
                        {!! form_generate_text('EMAIL', 'email', 'w50', '', 'name@company.com', 'Please provide a valid email address') !!}
                        {!! form_generate_text('CONTACT NUMBER', 'phone', 'w50', '', '+60', 'Please provide a phone number') !!}
                    </ul>

                    <ul class="formrow">
                        {!! form_generate_text('VEHICLE REGISTRATION NUMBER', 'plate', 'w50', '', '', 'Please your vehicle registration number') !!}
                    </ul>

                    <div class="clearfix"></div>
                </div>
            {{-- END FORM SECTION --}}

            {{-- START FORM SECTION --}}
            {!! form_generate_h4('2. DEALER PREFERENCE', false) !!}
            <div class="formsection">
                {{-- EVERY <ul> IS A ROW --}}
                <ul class="formrow">
                    {!! form_generate_select('LOCATION', 'location', $statelist, 'w50') !!}
                    {!! form_generate_select('PREFERRED DEALER', 'dealer', $dealers, 'w50') !!}
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="formsection" style="margin-top:40px;">
                <ul class="formrow {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                    <li class="input-google-recaptcha">
                        {!! app('captcha')->display() !!}
                        <div class="emessage">Please validate recaptcha</div>
                        @if ($errors->has('g-recaptcha-response'))
                        <div class="emessage" style="display:block;">
                            {{ $errors->first('g-recaptcha-response') }}
                        </div>
                        @endif
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
        {{-- END FORM SECTION --}}



            <div class="formsection" style="margin-top:50px; max-width:500px;">
                {!! form_generate_button('SEND ENQUIRY', 'cta-submit fullwidth', '', 'black' ) !!}
                <p class="note">
                    By clicking "Send Enquiry”, you have read the <a href="{{url('privacy')}}">Personal Data Protection Agreement</a> and consent to Honda Malaysia Sdn. Bhd. (including its authorised dealers) processing my personal data in accordance with the Personal Data Protection Agreement.
                </p>
            </div>


        </div>

    </form>

    {{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
    @include('form.script-style')

    <script>
        $(document).ready(function(){

            $('.cta-submit').click(function(e){
                e.preventDefault();
                validateForm();
            })

            $('.input-location li').click(function(){
                //console.log($(this).val());
                var selectedstate = $(this).data('mslug');
                $('.input-dealer li').hide();

                $(".input-dealer select").val('0');

                if(selectedstate=='All locations'){
                    $('.input-dealer li').show();
                    return true;
                }

                $('.input-dealer li').each(function(){
                    if($(this).data('meta')==selectedstate){
                        $(this).show();
                    }
                })
            })
            $(".input-dealer select").val('0');



            function validateForm(){
                resetError();
                var ecount = 0
                // Check Google Recaptcha
                if (typeof grecaptcha !== 'undefined' && grecaptcha.getResponse) {
                    if (grecaptcha.getResponse() == "") {
                        $('.input-google-recaptcha').find('.emessage').show();
                        ecount++;
                    } else {
                        $('.input-google-recaptcha').find('.emessage').hide();
                    }
                } else {
                    console.error('reCAPTCHA not loaded');
                    $('.input-google-recaptcha').find('.emessage').html('Please wait for reCAPTCHA to load').show();
                    ecount++;
                }

                if(!validateText($('.input-name input'))){
                    ecount++;
                }
                if(!validateText($('.input-phone input'))){
                    ecount++;
                }
                if(!validateText($('.input-plate input'))){
                    ecount++;
                }
                if(!validateText($('.input-nric input'))){
                    ecount++;
                }
                if(!validateEmail($('.input-email input'))){
                    ecount++;
                }

                if(ecount==0){
                    showSubmitting();
                    $('#mainform').submit();
                }

            }
        })
    </script>


    {{-- ANYTHING BELOW THIS IS OLD --}}

{{--

<section class="cfs-form innerpage">
    <div class="inner-container">
        <div class="intro">
            <h2>FLEET SALES ENQUIRY FORM</h2>
            <div class="intro-title grey">Interested in a fleet of Honda vehicles or wish to enquire more? <br>Leave your details below.</div>
        </div>

        <div class="stage-contained">
            <div class="form-section">
                <div class="sec-title black">1. COMPANY DETAILS</div>
                <ul class="form-item">
                    <li>
                        <div class="select-title">REGISTERED COMPANY NAME</div>
                        <div class="input-box">
                            <input type="text" name="model" class="input-text"></div>
                        <div class="error-message red"></div>
                    </li>

                    <li>
                        <div class="select-title">ADDRESS</div>
                        <div class="input-box">
                            <input type="text" name="aggress" class="input-text error" placeholder="Company address"></div>
                        <div class="error-message red"></div>
                    </li>

                    <li>
                        <div class="half">
                            <div class="select-title">Postcode</div>
                            <div class="input-box">
                                <input type="number" name="postcode" class="input-text" placeholder="Postcode">
                            </div>
                        </div>

                        <div class="half">
                            <div class="select-title">Town</div>
                            <div class="input-box">
                                <input type="text" name="town" class="input-text" placeholder="Town">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </li>
                </ul>
            </div>

            <div class="form-section">
                <div class="sec-title black">2. YOUR CONTACT DETAILS</div>
                <ul class="form-item">
                    <li>
                        <div class="select-title">NAME</div>
                        <div class="input-box">
                            <input type="text" name="model" class="input-text" placeholder="Your name"></div>
                        <div class="error-message red"></div>
                    </li>

                    <li>
                        <div class="select-title">EMAIL</div>
                        <div class="input-box">
                            <input type="text" name="aggress" class="input-text" placeholder="Name@company.com"></div>
                    </li>

                    <li>
                        <div class="select-title">CONTACT NO.</div>
                        <div class="input-box">
                            <input type="number" name="postcode" class="input-text hp"><span class="hp-front">+60</span>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="btn-container">
                <a href="#" class="prime-cta-black">
                <span>SEND ENQUIRY</span>
                <div class="overlay"></div>
                </a>
                <div class="clearfix"></div>
            </div>

            <div class="note cfs-note">By clicking "Send Enquiry”, you have read the <a href="">Personal Data Protection Agreement</a> and consent to Honda Malaysia Sdn. Bhd. (including its authorised dealers) processing my personal data in accordance with the Personal Data Protection Agreement. </div>


        </div>
    </div>

</section> --}}



</div>

@stop

