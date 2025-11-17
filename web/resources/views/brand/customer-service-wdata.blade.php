@php

    // $faq_cat[] = ['general','General'];
    // $faq_cat[] = ['specialsales','Special Sales'];
    // $faq_cat[] = ['sales','Sales'];
    // $faq_cat[] = ['servicemaintenance','Service Maintenance'];
    // $faq_cat[] = ['serviceappointment','Service Appointment'];
    // $faq_cat[] = ['technicaladvice','Technical Advice'];
    // $faq_cat[] = ['hip','Honda Insurance Plus'];
    // $faq_cat[] = ['accessories','Accessories'];
    // $faq_cat[] = ['hondaparts','Honda Parts'];
    // $faq_cat[] = ['warranty','Warranty'];
    // $faq_cat[] = ['hybrid','Hybrid Vehicle'];
    // $faq_cat[] = ['ima','Hybrid Battery'];

    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'faq_all.json', false, $honda_api_context);
    $data = json_decode($data);
    $faqdata = $data->payload;

    foreach ($faqdata->topic as $key => $value) {
        $faq_cat[] = [$value->id, $value->data];
    }

    //dd($faqdata);



@endphp

@extends('layouts.base')
@section('page-title')
    Customer Service
@endsection


@section('content')

<section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                </label>
                </div>
                <ul>
                    <li><a href="{{url('locate-us')}}">LOCATE US</a></li>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('customer-service')}}">CUSTOMER SERVICE</a></li>
                    <li><a href="{{url('career')}}">CAREER</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>

<style>
/* overwrite */
    .service-tab-menu {background: #e4e4e4; margin-bottom: -15px;}
    .service-tab-menu ul li a {color: #000;}

    .contact-us-footer-col-custom { padding: 32px 50px 50px 50px !important; }
    .contact-us-footer-col-custom .details-content img { max-height: 68px; }
    .contact-us-footer-col-custom .details-content .contact-footer-copy { padding: 6px 0 10px; }

    @media only screen and (max-width: 820px) and (min-width: 600px) {
        .contact-us-footer-col-custom { margin-bottom: 7%; }
    }

    @media only screen and (max-width: 640px) {
        /* .service-tab-menu {display: none;} */
    }
</style>
</section>

<div class="body-wrapper model-inner-container">

    <section class="inner-container intro">
        <div class="topgap" style="height:0px;"></div>
        <h2>CUSTOMER SERVICE</h2>
        <div class="intro-title grey">Your experience with Honda should be one that is unrivalled. Which is why your feedback is vital to help us make the necessary improvements to serve you better. If you have any thoughts, suggestions or queries, do contact us and we'll be more than happy to assist you.</div>
        <div class="btn-container center">
            <a href="{{url('/customer-service/enquiry')}}" class="prime-cta-white" style="background: black; color:white;">
                <span>ENQUIRY &amp; FEEDBACK FORM</span>
                <div class="overlay"></div>
            </a>
        </div>
    </section>

    <section id="faq" class="inner-container bg-grey">

        <div class="faq-maincontainer">
            <h2>FREQUENTLY ASKED QUESTION</h2>
            <div class="intro-title center">Search for a topic or pick one below.</div>

            <div class="search-bar-column center">


                    <input class="faq-search" type="text" placeholder="Search FAQs" name="keyword" value="">

                <div class="search-status">Please type more than 3-character keyword to search...</div>

            </div>
            <!-- <div class="clearfix"></div> -->
            <div class="faq-btn-container">
                <div class="faq-btn-row">
                    @foreach ($faq_cat as $item)
                    <div class="faq-btn-col">
                        <div class="faq-btn" data-box="faq-{{$item[0]}}"><span>{{$item[1]}}</span></div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- mobile --}}
            <div class="formsection globalform" style="display: none;">
                {{-- EVERY <ul> IS A ROW --}}
                <ul class="formrow">
                    {!! form_generate_select('', 'faq', $faq_cat, '', '', '', 'Select') !!}
                </ul>
                <div class="clearfix"></div>
            </div>
            {{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
            @include('form.script-style')
        </div>

        <div class="faq-details-container">
            <div class="content-inner">

                @foreach ($faqdata->topic as $topic)


                    <!-- faq details start -->
                    <div id="faq-{{$topic->id}}" class="faq-details">
                        <!-- h2>{{ strtoupper($topic->data)}}</h2 -->
                        
                        @php
                            $hh =  strtoupper($topic->data);
                            if ($hh == "HONDA PARTS" ) $hh = "Honda PARTS";
                            else if ($hh == "HONDA INSURANCE PLUS" ) $hh = "Honda INSURANCE PLUS";   
                        @endphp
                        <h2>{{ $hh }}</h2>
                        <div class="collapse-container">

                            @foreach ($faqdata->item as $k=>$item)
                                @if ($item->belong_to == $topic->id)
                                    @php
                                        $fd = json_decode($item->data);
                                    @endphp
                                        <div class="more">{!! $fd->question !!}</div>
                                        <div class="expand-content" style="display: none;">
                                            {!! $fd->answer !!}
                                        </div>
                                @endif
                            @endforeach

                        </div>
                    </div>

                @endforeach

            </div>
        </div>

    </section>

    <section>
            <div class="contact-us-footer">
                <div class="contact-us-footer-row">
                    <div class="contact-us-footer-col">
                        <div class="details-content">
                            <img src="{{url('img/contact_us/cust_service/phone.png')}}">
                            <div class="contact-footer-copy">Call Us At</div>
                            <h2 class="left red-font">1800 88 2020</h2>
                            <div>Monday to Friday: 9am - 5pm<br>(Closed during weekends and public holidays)</div>
                        </div>
                    </div>
                    <div class="contact-us-footer-col contact-us-footer-col-custom">
                        <div class="details-content">
                            <img src="{{url('img/contact_us/cust_service/HiP_logo_customer_service_01.png')}}">
                            <div class="contact-footer-copy">24/7 HiP Emergency Assistance</div>
                            <h2 class="left red-font">1800 18 1177</h2>
                            <div>Contact 24/7 HiP Emergency Assistance for your vehicle breakdown and accident assistance services.</div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    {{-- MUST INCLUDE THIS FOR EVERY PAGE THAT UTILISE GLOBAL FORM ELEMENT --}}
    @include('form.script-style')

</div>

<style>
            .faq-maincontainer {max-width:1000px;margin:auto;}
            .search-bar-column {width:100%;padding-bottom: 30px; padding-top:15px;}
            .search-bar-column input {overflow: visible;background: url(/img/press_release/icon/search.png) no-repeat 9px;background-color: white;height: 55px;width:50%;border: solid 1px #cecece;padding: 0 10px 0 39px;}
            .center {text-align: center;}
            .left {text-align: left;}

            .faq-btn-col {float: left;width: 25%;padding: 10px;}
            .faq-btn-row:after { content: "";display: table;clear: both;}
            .faq-btn {padding: 20px; padding-right:30px; background-color: #fff; cursor: pointer; box-sizing: border-box; display: inline-flex; align-content: center; width:100%;}
            /* .faq-btn img {position: absolute;right: 15px;} */
            .faq-btn::after {content: url(img/interface/arrow-short-right-red.svg);position: absolute;right: 15px; top:calc(50% + 3px); transform:translateY(-50%);}
            .faq-btn span {display:block; top:50%; transform:translateY(-50%); height:fit-content;}

            .faq-details {margin-bottom:40px;}
            .faq-details-container {max-width: 780px;margin: auto;}
            .disclaimer-copy {font-style: italic; font-size: 12px;}

            .numcontainer{position: absolute;}
            .tcontainer{margin-left: 35px;}

            .desktop{display: block;}

            /* overwrite landing style */
            .content-inner {margin-top: 70px;background-color: unset;}
            .content-inner .expand-content {background: unset;margin-bottom: 10px;}
            .model-inner-container .intro .intro-title {max-width: 775px;}

            /* contact-us-footer */
            .contact-us-footer-col {float: left;width: 50%;padding: 50px;height: 270px;}
            .contact-us-footer-row:after { content: "";display: table;clear: both;}
            .details-content {margin: auto;width: 75%;}
            .red-font {color:#E01327;}
            .contact-footer-copy {padding: 20px 0px 10px;}

            .faq-details {display: none;}
            .faq-details.active {display: block;}
            ul.roman, ul.roman li {margin-left: 15px;margin-top: 5px;list-style: unset;}
            .expand-content {margin-left: 30px;}
            .content-inner .expand-content .content-copy {padding: 0px 20px 28px;color: #5e6063;}
            .faq-details a {text-decoration: underline; color: #00009a;}

            .search-status {font-size:.75em; margin-top:1em; color:red; display:none;}

            .desktop {display: block;}
            .mobile {display: none;}

            @media only screen and (max-width: 640px) {
                .desktop{display: none;}
                .mobile {display: block;}
                .faq-btn-col {width: 50%;}
                .faq-btn-- {height: 65px; height:unset;}

                .model-inner-container .intro .intro-title {padding:20px;}

               /* contact-us-footer */
                .contact-us-footer-col {width: 100%;}
                .details-content {width: unset;}
            }
</style>

<script>
    $(document).ready(function(){
        // TO APPEND NUMBER TO THE FAQ QUESTION AUTOMATICALLY - in case we need to shuffle questions, then no need to manually number it again
        var faqrunning=0;
        $('.collapse-container .more').each(function(){
            faqrunning++;
            $(this).html('<div class="numcontainer">'+faqrunning+'.</div><div class="tcontainer"> '+$(this).html()+'</div>')
        })

        // hide show faq details
        $('.faq-btn').on('click', function () {
            var faqdetailsID = $(this).attr('data-box');
            $(this).addClass('active').siblings().removeClass('active');
            $('#' + faqdetailsID).addClass('active').siblings().removeClass('active');
        })
        // hide show faq details - MOBILE

        // FAQ button autoheight
        var thebuttonheightthatneedcalculationlah;
        function recalculateFAQbuttons(){
            thebuttonheightthatneedcalculationlah=0;
            $('.faq-btn').each(function(){
                if($(this).innerHeight() > thebuttonheightthatneedcalculationlah){
                    thebuttonheightthatneedcalculationlah = $(this).innerHeight();
                }
            })
            $('.faq-btn').css('height', thebuttonheightthatneedcalculationlah);
        }
        $(window).resize(recalculateFAQbuttons);
        $(window).trigger('resize');

        // FAQ SEARCH

        $('.faq-search').on('change keyup', function(){
            var keyword = $(this).val().toLowerCase();
            $('.search-status').hide();
            if(keyword.length>2){
                var totalfound = 0;
                var sectionfound

                $('.faq-details').each(function(){
                    sectionfound = 0;
                    $(this).find('.content-copy').each(function(){
                        if($(this).html().toLowerCase().search(keyword)>-1){
                            //$(this).parent().show();
                            $(this).parent().prev('.more').show();
                            totalfound++;
                            sectionfound++;
                        } else {
                            $(this).parent().hide();
                            $(this).parent().prev('.more').hide();
                        }
                    });

                    if(sectionfound==0){
                        $(this).removeClass('active');
                    } else {
                        $(this).addClass('active');
                    }
                })
                $('.faq-btn-container').hide();
                $('.search-status').html('Displaying '+totalfound+' results').show();
            } else {
                $('.faq-details .more').show();
                $('.faq-details .expand-content').hide();
                $('.faq-btn-container').show();
                if(keyword.length>0){
                    $('.search-status').html('Please type more than 3-character keyword to search...').show();
                }
            }
        });

    })

</script>

@stop

