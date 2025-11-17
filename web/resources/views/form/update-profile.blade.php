@php
    /* SELECTION DATA */
    $select['title'][] = ['Mr', 'Mr'];
    $select['title'][] = ['Mrs', 'Mrs'];
    $select['title'][] = ['Ms', 'Ms'];
    $select['title'][] = ['Others', 'Others'];

    $select['ethnic'][] = ['Malay', 'Malay'];
    $select['ethnic'][] = ['Chinese', 'Chinese'];
    $select['ethnic'][] = ['Indian', 'Indian'];
    $select['ethnic'][] = ['Others', 'Others'];

    $select['income_bracket'][] = ['Below RM2,501', ''];
    $select['income_bracket'][] = ['RM2,501 - RM5,000', ''];
    $select['income_bracket'][] = ['RM5,001 - RM7,500', ''];
    $select['income_bracket'][] = ['RM7,501 - RM10,000', ''];
    $select['income_bracket'][] = ['RM10,001 - RM12,500', ''];
    $select['income_bracket'][] = ['RM12,501 - RM15,000', ''];
    $select['income_bracket'][] = ['RM15,001 - RM17,500', ''];
    $select['income_bracket'][] = ['RM17,501 - RM20,000', ''];
    $select['income_bracket'][] = ['RM20,001 - RM22,500', ''];
    $select['income_bracket'][] = ['RM22,501 - RM25,000', ''];
    $select['income_bracket'][] = ['RM25,001 - RM27,500', ''];
    $select['income_bracket'][] = ['RM27,501 - RM30,000', ''];
    $select['income_bracket'][] = ['Above RM30,000', ''];

    $select['ownership'][] = ['Still own', 'Still own'];
    $select['ownership'][] = ['Sold', 'Sold'];
    $select['ownership'][] = ['Others', 'Others'];

    $select['household_member_max'] = 20;
    for($i=1; $i<=$select['household_member_max']; $i++){
        $select['household_member_count'][] = $i;
    }

    $section_tabs = ['Personal Details', 'Your Honda Vehicle', 'Newsletter'];

    $greyshade = ['#282A2F','#838586', '#C2C3C4'];



@endphp


@extends('layouts.base')


@section('content')


<div class="body-wrapper model-inner-container">

    <section class="inner-container intro">
        <div class="topgap" style="height:0px;"></div>
        <h2>UPDATE MY PROFILE</h2>
        <div class="intro-title grey">Giving our customers the best service and update is our utmost priority.
            <br>As such, help us stay in touch with you by updating your profile details.
        </div>
    </section>

    <section class="inner-container  bg-grey">
        <div class="progress-indicator">
            <div class="pline">
                <div class="line-progress"></div>
            </div>
            <ul>
                @foreach ($section_tabs as $item)
                <li>
                    <div class="circle"></div>
                    <div class="label">{{$item}}</div>
                </li>
                @endforeach
            </ul>
            <div class="clearfix"></div>

            <style>
                .progress-indicator {position: relative;padding:20px 0; box-sizing: border-box; max-width:730px; margin:auto;}
                .progress-indicator li {float:left; width:calc(100% / 3); display: inline-block; vertical-align: top;}
                .progress-indicator li .circle {display:block; width:20px; height:20px; border: 3px solid #dbdbdb; background:white; margin:auto;
                    -webkit-border-radius: 50%; -moz-border-radius: 50%; border-radius: 50%; }
                .progress-indicator li .label {max-width: 100px; margin:auto; margin-top: 15px; text-align: center;}
                .progress-indicator li .label.active {color:#ec1b2e;}
                .progress-indicator li:first-of-type .label {margin-left: 0;}
                .progress-indicator li:last-of-type .label {margin-right: 0;}
                .progress-indicator li:first-of-type .circle {margin-left: 50px;}
                .progress-indicator li:last-of-type .circle {margin-right: 50px;}

                .progress-indicator .pline {width:calc(100% - 100px); height:3px; position: absolute; background: #dbdbdb; left:50%; transform: translateX(-50%); margin-top:7px;}
                .progress-indicator .pline .line-progress {height: inherit; width:10%; background: red;}
                .progress-indicator .pline .line-progress.finish {height: inherit; width:50%; background: red;}

                .progress-indicator li .circle.active {border: 3px solid #ec1b2e;}
                .progress-indicator li .circle.finish {border: 3px solid red;background:#ec1b2e;}

                .fold1, .fold2, .fold3 {max-width: 730px; margin: auto;}
                .tnc {max-width: 441px;font-size: 12px;}
                .fold {display: none;}
                .tnc-li {line-height: 1.5em;padding: 1.5em 0;}
                label[for=tnc]
                {
                    font-size: 0.6875rem;
                }
            </style>
        </div>
    </section>

    <form id="umpform" action="/update-my-profile" method="POST">
        @csrf
    <section class="globalform bg-grey">

        <!-- Personal Details  -->
        <div class="fold fold1">
            {!! form_generate_h4('1. ABOUT YOU') !!}

            <div id="f-aboutyou" class="formsection">
                <ul class="formrow">
                    {!! form_generate_select('TITLE', 'ititle', $select['title'], 'w20') !!}
                    {!! form_generate_text('FULL NAME', 'fname', 'w80', '', 'Your name', 'Please tell us your name') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_radio('NATIONALITY', 'inationality', [['Malaysian','Malaysian'],['Non-Malaysian','Non-Malaysian']], '', '', '') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_select('ETHNICITY', 'iethnic', $select['ethnic'], '','','') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_radio('MARITAL STATUS', 'imarital', [['Married','Married'],['Single','Single']], '','','') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_radio('GENDER', 'igender', [['Male','Male'],['Female','Female']], '','','') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_radio('NRIC', 'idtype', [['New IC','New IC'],['Army/Police Number','Army/Police Number']], '','','') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_text('', 'iic', '', '', '','') !!}
                </ul>
                <div class="clearfix"></div>
            </div>

            <hr>

            {!! form_generate_h4('2. YOUR CONTACT DETAILS') !!}

            <div id="f-contactdetails" class="formsection">
                <ul class="formrow">
                    {!! form_generate_text('MAILING ADDRESS', 'address1', '', '', '', 'Please provide your street address') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_text('', 'address2', '', '', '') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_text('POSTCODE', 'ipostcode', '', '', '', 'Please provide a postcode') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_text('CITY', 'icity', 'w50', '', '', '', 'disabled') !!}
                    {!! form_generate_text('STATE', 'istate', 'w50', '', '', '', 'disabled') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_text('CONTACT NUMBER', 'phone', '', '', '+60', 'Please provide a phone number') !!}
                </ul>
                <ul class="formrow" style="padding-top: 10px;">
                    {!! form_generate_checkbox('<img style="position:absolute;" src="/img/icon/whatsapp.svg" alt="">', '<span style="margin-left: 23px;">By checking this box, I wish to stay up-to-date by receiving personal and commercial-related news & highlights from Honda Malaysia Sdn. Bhd. via WhatsApp.</span>', 'whatsapp', '', 'no', '') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_text('EMAIL', 'iemail', '', '', 'name@company.com', 'Please provide a correct email address') !!}
                </ul>
                <div class="clearfix"></div>
            </div>

            <hr>

            {!! form_generate_h4('3. ADDITIONAL DETAILS') !!}

            <div id="f-additionaldetails" class="formsection">
                <ul class="formrow">
                    {!! form_generate_select('MONTHLY PERSONAL INCOME', 'ipersonal_income', $select['income_bracket'], '') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_select('MONTHLY HOUSEHOLD INCOME', 'ihousehold_income', $select['income_bracket'], '') !!}
                </ul>
                <ul class="formrow">
                    {!! form_generate_select('NUMBER OF HOUSEHOLD MEMBERS', 'inohousehold', $select['household_member_count'], '') !!}
                </ul>
                <div class="clearfix"></div>
            </div>

            <hr>

        </div>



        <!-- Honda vehicles -->
        <div class="fold fold2">
            <div id="f-vehicle" class="formsection">
                {!! form_generate_h4('4. YOUR VEHICLE DETAILS') !!}
                <p class="stage-contained">Please list only the Honda vehicle registered under your name.</p>
                <div class="vlistcontainer">
                    @foreach ([1,2,3,4,5] as $item)
                        <ul class="formrow ventry-item ventry{{$item}}" style="display: none;">
                            <svg class="removerow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>

                            {!! form_generate_text('REGISTRATION NUMBER', 'vregno[]', 'w25', '', 'Plate Number') !!}
                            {!! form_generate_text('VEHICLE MODEL', 'vmodel[]', 'w50', '') !!}
                            {!! form_generate_select('VEHICLE STATUS', 'vstatus'.($item-1), $select['ownership'], 'w25') !!}

                        </ul>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <div class="addvehicle no-select">
                    <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>
                     ADD VEHICLE
                </div>
                <div class="vrowtemplate" style="display: none;">

                </div>
            </div>
            <hr>

        </div>

        <!-- newsletter -->
        <div class="fold fold3 formsection">
            <h4>Honda MONTHLY E-NEWSLETTER OFFERS THE LATEST NEWS</h4>
            <ul class="formwor">
                {!! form_generate_checkbox('', 'I wish to receive updates, promotions and other exciting news from Honda via email.', 'newsletter', '', 'yes', '') !!}
            </ul>
            <hr>

        </div>

        <div class="formsection fold-controller">
                <div class="btn-container" style="width:max-content; margin: 20px auto;">
                    <a id="prevBtn" onclick='nextPrev(-1)' class="prime-cta-white cta-back">
                        <span>BACK</span>
                        <div class="overlay"></div>
                    </a>

                    <a onclick='nextPrev(1)' class="prime-cta-black cta-next">
                        <span id="nextBtn">NEXT</span>
                        <div class="overlay"></div>
                    </a>

                    <div class="clearfix"></div>
                    <div id="tnc" class="tnc" style="display: none;">
                        {!! form_generate_checkbox('', 'I have read and understood the Terms & Conditions and Privacy Policy and I acknowledge and agree that I have provided true, accurate, complete, and correct information in this website.', 'tnc', 'tnc-li', 'no', 'Please agree with the Terms & Conditions to proceed with submission.') !!}
                    </div>

                </div>
        </div>


    </section>
    </form>


    {{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
    @include('form.script-style')

    <script>
        var currentFold = 0;
        showFold(currentFold);

        function showFold(n) {
            var x = document.getElementsByClassName("fold");
            x[n].style.display = "block";

            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline-block";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "UPDATE MY PROFILE";
                document.getElementById("tnc").style.display = "inline-block";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
                document.getElementById("tnc").style.display = "none";
            }
            $('.emessage').hide();
            progressIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("fold");
            if (n == 1 && !validateForm()) return false;
            x[currentFold].style.display = "none";

            if (currentFold+n >= x.length) {
                // submission
                if(validateCheckBox($('.input-tnc'))){
                    $('.fold-controller').css('visibility', 'hidden');
                    showSubmitting();
                    document.getElementById("umpform").submit();
                    return false;
                }
                x[currentFold].style.display = "block";
                return false;
            }

            currentFold += + n;
            showFold(currentFold);
        }

        function validateForm() {
            var valid = true;

            if(!validateText($('.input-fname input'))){
                return false;
            }
            if(!validateText($('.input-address1 input'))){
                return false;
            }
            if(!validateText($('.input-ipostcode input'))){
                return false;
            }
            if(!validateText($('.input-phone input'))){
                return false;
            }
            if(!validateEmail($('.input-iemail input'))){
                return false;
            }

            if (valid) {
                document.getElementsByClassName("circle")[currentFold].className += " finish";
            }
            return valid;
        }

        function progressIndicator(n) {
            var i, x = document.getElementsByClassName("circle");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
            //
            switch(n){
                case 0: $('.line-progress').css('width', '0%'); break;
                case 1: $('.line-progress').css('width', '50%'); break;
                case 2: $('.line-progress').css('width', '100%'); break;
            }
        }


        $(document).ready(function(){

            var ziplastcheck = '';
            var zip_islooking = false;
            function ziplookup(){
                var zip = $('.input-ipostcode input').val()
                if(!zip_islooking && zip != ziplastcheck && zip.length>4){
                    zip_islooking = true;
                    ziplastcheck = zip;
                    $('.input-icity input, .input-istate input').val('Looking...')
                    var endpoint = '{{url('postcode/get/')}}/'+zip;
                    //console.log('zip', ziplastcheck, endpoint);
                    $.ajax({
                        url:endpoint,
                        success: function(data){
                            //console.log('data', data)
                            if(data.response=='success'){
                                $('.input-icity input').val(data.data.city);
                                $('.input-istate input').val(data.data.state_name);
                            }
                            zip_islooking = false;
                        }
                    })
                }
            }

            setInterval(ziplookup,200);

            //

            // add vehicle details
            var vehiclecount = 0;
            function checkVehicleEntryRow(){
                console.log($('.ventry-item:visible').length);
                if($('.ventry-item:visible').length>=vehiclecount){
                    $(this).hide();
                } else {
                    $(this).show();
                }
            }
            $('#f-vehicle .addvehicle').click(function(){
                vehiclecount++;

                $('.ventry'+vehiclecount).show();
                checkVehicleEntryRow();

            })

            $('#f-vehicle .removerow').click(function(){
                if(vehiclecount<2){
                    return false;
                }
                vehiclecount--;
                var row = $(this).parent();
                row.hide();
                row.find('input[name="vregno[]"]').val('');
                row.find('input[name="vmodel[]"]').val('');
                row.find('input[type="hidden"]').val('');
                row.find('.dropdown-box .select-copy').val('Select');
                checkVehicleEntryRow();
            })

            $('#f-vehicle .addvehicle').trigger('click');
        })

    </script>





{{-- THIS SHOULD NOT BE RENDERED --}}

{{-- <section class="cfs-form innerpage" style="display:none;">
    <div class="inner-container">
        <div class="intro">
            <h2>UPDATE PROFILE</h2>
            <div class="intro-title grey">Giving our customers the best service and update is our utmost priority.
                <br>As such, help us stay in touch with you by updating your profile details.
            </div>
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
                        <div class="error-message red">Error message</div>
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

