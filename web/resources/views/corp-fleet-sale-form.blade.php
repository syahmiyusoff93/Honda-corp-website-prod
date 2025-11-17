
@extends('layouts.base')


@section('content')

<style>
    .cfs-form .inner-container {max-width: 462px;}
</style>

<div class="body-wrapper bg-grey">


    <form id="mainform" action="/discover/corporate-fleet-sale/submit" method="POST">
        @csrf

        <div class="globalform width-contained" style="max-width:500px; margin:auto;">

            <h2>FLEET SALES ENQUIRY FORM</h2>
            <p style="text-align: center; padding-top:0;">Interested in a fleet of Honda vehicles or wish to enquire more? <br>Leave your details below.</p>

            {{-- START FORM SECTION --}}
                {!! form_generate_h4('1. COMPANY DETAILS', false) !!}
                <div class="formsection">
                    {{-- EVERY <ul> IS A ROW --}}
                    <ul class="formrow">
                        {!! form_generate_text('REGISTERED COMPANY NAME', 'coname', 'helper-class--', '', 'Company name') !!}
                    </ul>
                    <ul class="formrow">
                        {!! form_generate_text('ADDRESS', 'coaddress', 'helper-class--', '', 'Company address') !!}
                    </ul>

                    <ul class="formrow">
                        {!! form_generate_text('POSTCODE', 'postcode', 'w50', '', 'Postcode') !!}
                        {!! form_generate_text('TOWN', 'town', 'w50', '', 'Town', '', 'disabled') !!}
                        <input class="input-city" type="hidden" name="city">
                    </ul>

                    <div class="clearfix"></div>
                </div>
            {{-- END FORM SECTION --}}

            {{-- START FORM SECTION --}}
            {!! form_generate_h4('2. YOUR CONTACT DETAILS', false) !!}
            <div class="formsection">
                {{-- EVERY <ul> IS A ROW --}}
                <ul class="formrow">
                    {!! form_generate_text('NAME', 'name', 'helper-class--', '', 'Your name', 'Please tell us your name') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_text('EMAIL', 'email', 'helper-class--', '', 'name@company.com', 'Please provide a valid email address') !!}
                </ul>

                <ul class="formrow">
                    {!! form_generate_text('CONTACT NUMBER', 'phone', 'helper-class--', '', '+60', 'Please provide a valid phone number') !!}
                </ul>

                <div class="clearfix"></div>
            </div>
            <div class="formsection">
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



            <div class="formsection" style="margin-top:50px;">
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

            var ziplastcheck = '';
            var zip_islooking = false;
            function ziplookup(){
                var zip = $('.input-postcode input').val()
                if(!zip_islooking && zip != ziplastcheck && zip.length>4){
                    zip_islooking = true;
                    ziplastcheck = zip;
                    $('.input-town input').val('Looking...')
                    var endpoint = '{{url('postcode/get/')}}/'+zip;
                    console.log('zip', ziplastcheck, endpoint);
                    $.ajax({
                        url:endpoint,
                        success: function(data){

                            console.log('data', data)
                            if(data.response=='success'){
                                $('.input-town input, .input-city').val(data.data.city)
                            }
                            zip_islooking = false;
                        }
                    })
                }

            }

            setInterval(ziplookup,200);


            $('.cta-submit').click(function(e){
                e.preventDefault();
                validateForm();
            })



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
                if(!validatePhone($('.input-phone input'))){
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

