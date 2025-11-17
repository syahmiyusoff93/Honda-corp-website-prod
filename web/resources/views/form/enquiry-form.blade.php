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
        $dealers[] = [
            $value->name.', '.$value->city,
            ($key+1).'. ' . $value->state . ' | ' .$value->name,
            $value->state
        ];

        $dealers_sorted[] = $value->name . ', '.$value->state;
    }

    sort($dealers_sorted);
    //dd($statelist);
    foreach ($dealers_sorted as $key => $value) {
        $dealers_sorted[$key] = ($key+1) . '. '.$value;
    }
    array_unshift($dealers_sorted, 'Please select a dealer');


    /* SELECTION DATA */
    $select['category'][] = ['enq', 'General Enquiry'];
    $select['category'][] = ['fdb', 'Feedback'];

    $select['enquirytype'][] = ['Sales', 'Sales'];
    $select['enquirytype'][] = ['Product', 'Product'];
    $select['enquirytype'][] = ['Service', 'Service'];
    $select['enquirytype'][] = ['Warranty', 'Warranty'];
    $select['enquirytype'][] = ['Sparepart', 'Spare Parts'];
    $select['enquirytype'][] = ['Others', 'Others'];

    $select['title'][] = ['Mr', 'Mr'];
    $select['title'][] = ['Mrs', 'Mrs'];
    $select['title'][] = ['Ms', 'Ms'];
    $select['title'][] = ['Others', 'Others'];

    $select['relationship'][] = ['Spouse', 'Spouse'];
    $select['relationship'][] = ['Children', 'Children'];
    $select['relationship'][] = ['Sibling', 'Sibling'];
    $select['relationship'][] = ['Parent', 'Parent'];
    $select['relationship'][] = ['Relative', 'Relative'];
    $select['relationship'][] = ['Friend', 'Friend'];
    $select['relationship'][] = ['Others', 'Others'];



@endphp


@extends('layouts.base')
@section('page-title')
Enquiry & Feedback
@endsection

@section('content')

    <div class="body-wrapper model-inner-container">

        <div style="height: 50px;background: #ececec;margin: -1px;">
            <a href="{{url('customer-service')}}" class="">
                    <div style="padding: 15px 30px;font-size: 12px;">
                        <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link">
                        <span class="backtocopy" style="color: #565656;padding: 0 5px;width:unset;bottom:3px;">BACK TO CUSTOMER SERVICE</span>
                    </div>
                </a>
        </div>

        <section class="inner-container intro">
            <div class="topgap" style="height:0px;"></div>
            <h2>WE WOULD LOVE TO HELP</h2>
            <div class="intro-title grey">Complete and submit the form below and we will be in touch with you soon.</div>
        </section>

        <form id="theform" action="{{url('customer-service/contact-us')}}" method="POST">
            @csrf
            <section class="globalform bg-grey">

                <!-- Personal Details  -->
                <div class="fold1">
                    {!! form_generate_h4('1. PICK A CATEGORY', false) !!}
                    <div class="formsection" style="padding-bottom: 20px;">
                        <ul class="formrow">
                            {!! form_generate_select('CATEGORY', 'category', $select['category'], 'w50', '', 'Please select a category') !!}
                            {!! form_generate_select('TYPE OF ENQUIRY', 'enquirytype', $select['enquirytype'], 'w50', '', 'Please select a type') !!}
                        </ul>

                        {{-- ONLY SHOW THIS DEALER ROW IF USER SELECT 'FEEDBACK' FROM CATEGORY SELECTION --}}
                        <ul class="formrow concerndealer">
                            {!! form_generate_select('CHOOSE THE DEALER RELATED TO YOUR FEEDBACK', 'dealer', $dealers_sorted, '', '', 'Please select one') !!}
                        </ul>

                        <div class="clearfix"></div>
                    </div>

                    {!! form_generate_h4('2. PERSONAL DETAILS', false) !!}
                    <div class="formsection" style="padding-bottom: 20px;">
                        <ul class="formrow">
                            {!! form_generate_checkbox('', 'I am a Honda Owner', 'hondaowner', '', 'no', '') !!}
                        </ul>
                        <ul class="formrow">
                            {!! form_generate_select('TITLE', 'ititle', $select['title'], 'w20', '', 'Please select') !!}
                            {!! form_generate_text('FULL NAME', 'fname', 'w80', '', 'Your name', 'Please tell us your name') !!}
                        </ul>
                        <ul class="formrow">
                            {!! form_generate_text('NRIC', 'nric', '', '', 'MyKad/Military ID/Police ID/Passport', 'Please provide ID number') !!}
                        </ul>
                        <ul class="formrow">
                            {!! form_generate_text('EMAIL', 'iemail', '', '', 'name@company.com', 'Please provide a correct email address') !!}
                        </ul>
                        <ul class="formrow">
                            {!! form_generate_text('CONTACT NUMBER', 'phone', '', '', '+60', 'Please provide a phone number') !!}
                        </ul>

                        {{-- ONLY SHOW THIS RELATIONSHIP ROW IF USER uncheck THE IM A HONDA OWNER CHECKBOX --}}
                        <ul id="relationshipwithowner" class="formrow">
                            {!! form_generate_select('RELATIONSHIP WITH OWNER', 'relationship', $select['relationship'], '','','Please select a relationship with owner') !!}
                        </ul>

                        <div class="clearfix"></div>
                    </div>

                    <div class="formsection formsection-vehicle" style="padding-bottom: 20px;">
                        {!! form_generate_h4('<span class="num-vehicle">3</span>. VEHICLE DETAILS', false) !!}
                        <ul class="formrow">
                            {!! form_generate_text('VEHICLE REGISTRATION NUMBER', 'vehiclenumber', '', '', '', 'Please provide your vehicle registration number') !!}
                        </ul>
                        <ul class="formrow">
                            {!! form_generate_text('MILEAGE (KM)', 'mileage', '', '', '', 'Please provide your vehicle mileage') !!}
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    {!! form_generate_h4('<span class="num-msg">4</span>. MESSAGE', false) !!}
                    <div class="formsection">
                        <ul class="formrow">
                            {!! form_generate_textarea('', 'commentContent', $classes='valid', $default='', $placeholder='Maximum 1000 words', $emessage='Please complete this field') !!}
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

                    <hr>
                </div>

                <div class="formsection" style="margin-top:50px; max-width:500px; margin:auto;">

                    {!! form_generate_button('SUBMIT', 'cta-submit fullwidth', '/customer-service/enquiry/form-submitted', 'black' ) !!}

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
                    resetError();
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
                    
                    var isowner = $('#ccb-hondaowner:checked').length == 0 ? false : true;
                    var formcat = $('.hidden-category').val();

                    if(!validateDropDown($('.input-category'))){errorcount++; }
                    if(!validateDropDown($('.input-enquirytype'))){errorcount++; }
                    if(!validateDropDown($('.input-ititle'))){errorcount++; }
                    if(!validateText($('.input-fname input'))){errorcount++; }
                    if(!validateEmail($('.input-iemail input'))){errorcount++; }
                    if(!validateText($('.input-phone input'))){ errorcount++; }

                    if(formcat=='fdb'){
                        if(!validateText($('.input-nric input'))) { errorcount++;}
                        if(!validateDropDown($('.input-dealer'))){errorcount++; }
                    }

                    if(!isowner && formcat=='fdb'){
                        if(!validateDropDown($('.input-relationship'))){errorcount++; }
                    }

                    if(!isowner && formcat=='enq'){
                        // do nothing. only this category doesnt make the below fileds mandatory
                    } else {
                        if(!validateText($('.input-vehiclenumber input'))){errorcount++; }
                        if(!validateText($('.input-mileage input'))){errorcount++; }
                    }

                    if(!validateTextArea($('.input-commentContent textarea'))){errorcount++; }
                    if(!validateCheckBox($('.input-tnc'))){errorcount++; }

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
                    return true;

                    //  for internal uat only -- to see the page flow
                    var url = "/customer-service/enquiry/form-submitted";
                    $(location).attr('href',url);
                })

                function checkHideOrShowRelationShipWithOwnerBecauseItNeededToBeThatWay(){
                    if($('.hidden-category').val()=='fdb' && $('#ccb-hondaowner:checked').length==0){
                        $(".input-relationship").slideDown('fast');
                    } else {
                        $(".input-relationship").slideUp('fast');
                    }
                }

                function check_or_hide_vehicleinfo(){
                    if($('.hidden-category').val()=='enq' && $('#ccb-hondaowner:checked').length==0){
                        $('.input-vehiclenumber .field-title>span, .input-mileage .field-title>span').hide();
                        $('.input-vehiclenumber .emessage, .input-mileage .emessage').hide();
                        $('.input-vehiclenumber input, .input-mileage input').removeClass('error');
                    } else {
                        $('.input-vehiclenumber .field-title>span, .input-mileage .field-title>span').show();
                    }
                }

                $('#ccb-hondaowner').change(function(){
                    /*
                    if(this.checked){
                       $('.input-vehiclenumber .field-title>span, .input-mileage .field-title>span').show();
                    } else {
                        $('.input-vehiclenumber .field-title>span, .input-mileage .field-title>span').hide();
                        $('.input-vehiclenumber .emessage, .input-mileage .emessage').hide();
                        $('.input-vehiclenumber input, .input-mileage input').removeClass('error');
                    }
                    */
                    check_or_hide_vehicleinfo();
                    checkHideOrShowRelationShipWithOwnerBecauseItNeededToBeThatWay();
                })
                $('#ccb-hondaowner').trigger('change');
                $(".concerndealer").hide();

                $(".input-category .dropdown-menu li").on('click', function(e) {
                    var dataslug = $(this).attr("data-mslug");
                    if(dataslug == "fdb") {
                        $(".concerndealer, .input-nric").slideDown('fast');
                        $(".input-enquirytype .field-title").html('TYPE OF FEEDBACK');
                    } else {
                        $(".concerndealer, .input-nric").slideUp('fast');
                        $(".input-enquirytype .field-title").html('TYPE OF ENQUIRY');
                    }
                    check_or_hide_vehicleinfo();
                    checkHideOrShowRelationShipWithOwnerBecauseItNeededToBeThatWay()
                    e.preventDefault();
                });


                //checkHideOrShowRelationShipWithOwnerBecauseItNeededToBeThatWay();

            })
        </script>

    </div>

@stop

