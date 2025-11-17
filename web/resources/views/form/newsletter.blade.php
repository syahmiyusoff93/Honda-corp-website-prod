@php
    /* SELECTION DATA */
    $select['title'][] = ['Mr', 'Mr'];
    $select['title'][] = ['Mrs', 'Mrs'];
    $select['title'][] = ['Ms', 'Ms'];
    $select['title'][] = ['Others', 'Others'];

    $radio['interested_model'][] = ['City', 'City'];
    $radio['interested_model'][] = ['Civic', 'Civic'];
    $radio['interested_model'][] = ['Accord', 'Accord'];
    $radio['interested_model'][] = ['HRV', 'HR-V'];
    $radio['interested_model'][] = ['CRV', 'CR-V'];

    $radio['current_model'][] = ['City', 'City'];
    $radio['current_model'][] = ['Civic', 'Civic'];
    $radio['current_model'][] = ['Accord', 'Accord'];
    $radio['current_model'][] = ['HRV', 'HR-V'];
    $radio['current_model'][] = ['CRV', 'CR-V'];
    $radio['current_model'][] = ['others', 'Others'];

    $section_tabs = ['Personal Details'];

    $greyshade = ['#282A2F','#838586', '#C2C3C4'];

@endphp


@extends('layouts.base')


@section('content')


<div class="body-wrapper model-inner-container">

    <section class="inner-container intro">
        <div class="topgap" style="height:0px;"></div>
        <h2>SUBSCRIBE TO OUR E-NEWSLETTER</h2>
        <div class="intro-title grey">Don’t miss out on exclusive privileges and other great offers from Honda.</div>
    </section>

    <form id="theform" action="{{url('/newsletter/gosubscribe')}}" method="POST">
        @csrf
        <section class="globalform bg-grey">

            <!-- Personal Details  -->
            <div class="fold1">
                <div class="formsection">
                    <ul class="formrow">
                        {!! form_generate_checkbox('', 'I am a Honda Owner', 'hondaowner', '', 'no', '') !!}
                    </ul>
                    <ul class="formrow">
                        {!! form_generate_select('TITLE', 'ititle', $select['title'], 'w20') !!}
                        {!! form_generate_text('FULL NAME', 'fname', 'w80', '', 'Your name', 'Please tell us your name') !!}
                    </ul>
                    <ul class="formrow">
                        {!! form_generate_text('EMAIL', 'iemail', '', '', 'name@company.com', 'Please provide a correct email address') !!}
                    </ul>
                    <ul class="formrow">
                        {!! form_generate_text('MOBILE NUMBER', 'phone', '', '', '+60', 'Please provide a phone number') !!}
                    </ul>
                    <ul id="currentvehicle" class="formrow">
                        {!! form_generate_checkbox_array('CURRENT VEHICLE(S):', 'currentmodel', $radio['current_model'], '', '') !!}
                    </ul>
                    <ul class="formrow">
                        {!! form_generate_checkbox_array('MODEL(S) YOU ARE INTERESTED IN:', 'interestmodel', $radio['interested_model'], '', '') !!}
                    </ul>
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
                <hr>
            </div>

            <div class="formsection" style="margin-top:50px; max-width:500px; margin:auto;">
                {!! form_generate_button('SUBSCRIBE NOW', 'cta-submit fullwidth', '', 'black' ) !!}
                <div id="tnc" class="tnc">
                    {!! form_generate_checkbox('', 'I have read and understood the Terms & Conditions and Privacy Policy and I acknowledge and agree that I have provided true, accurate, complete, and correct information in this website.', 'tnc', 'tnc-li', 'no', 'Please agree with the Terms & Conditions to proceed with submission.') !!}
                </div>
            </div>

        </section>
    </form>


    {{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
    @include('form.script-style')

    <style>
        .fold1, .fold2, .fold3 {max-width: 730px; margin: auto;}
        .tnc {max-width: 441px;font-size: 12px;}
        .tnc-li {line-height: 1.5em;padding: 1.5em 0;}
        label[for=tnc]
        {
            font-size: 0.6875rem;
        }
    </style>

    <script>
        $(document).ready(function(){
            function validateForm() {
                var errorcount = 0;
                // Check Google Recaptcha
                if (typeof grecaptcha !== 'undefined' && grecaptcha.getResponse) {
                    if (grecaptcha.getResponse() == "") {
                        $('.input-google-recaptcha').find('.emessage').show();
                        errorcount++;
                    } else {
                        $('.input-google-recaptcha').find('.emessage').hide();
                    }
                } else {
                    console.error('reCAPTCHA not loaded');
                    $('.input-google-recaptcha').find('.emessage').html('Please wait for reCAPTCHA to load').show();
                    errorcount++;
                }

                if(!validateText($('.input-fname input'))){
                    errorcount++;
                }
                
                if(!validateEmail($('.input-iemail input'))){
                    errorcount++;
                }
                /* // no sense to ask for phone number in a newsletter form. editted--client still want it */
                if(!validateText($('.input-phone input'))){
                    errorcount++;
                }

                if(!validateCheckBox($('.input-tnc'))){
                    errorcount++;
                }

                if(errorcount==0){
                    return true;
                }

                return false;
            }

            $('.cta-submit').click(function(e=null){
                if(e!=null){
                    e.preventDefault();
                }
                // RUN FORM VALIDATION FIRST HERE!

                if(!validateForm()){
                    return false;
                }

                showSubmitting();
                $('#theform').submit();
            })

            $('#ccb-hondaowner').change(function(){
                if(this.checked){
                    $('#currentvehicle').fadeIn('fast');
                } else {
                    $('#currentvehicle').fadeOut('fast');
                }

            })
            $('#ccb-hondaowner').trigger('change');
        })
    </script>

</div>

@stop

