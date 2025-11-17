@php
$APIPATH = config('global.APIPATH');
$honda_api_context = config('global.APICONTEXT');

$data = file_get_contents($APIPATH.'model_'.$model_slug.'_variants.json', false, $honda_api_context);
$data = json_decode($data);
$model_info = $data->model;
$variant_info = $data->payload;

//api/model/city/page/landing

$data = file_get_contents($APIPATH.'model_'.$model_slug.'_page_landing.json', false, $honda_api_context);
$data = json_decode($data);
$story = $data->payload;

$inner_section = '';
$load_accessory_360assets = false;

@endphp

@extends('layouts.modelinner')

@section('page-title')
   Honda {{$model_info->name}}
@stop

@section('inner-content')

    <section class="model-landing-hero city" id="hero-banner">
        @include('components.model-hero')
    </section>

    <section class="performance section-gap">
        {{-- <h2>HIGHLIGHTS SSSS</h2> --}}
        <h2>HIGHLIGHTS</h2>
        @include('components.model-usp')
    </section>

    {{-- ALL THE SECTIONS OF FEATURES IS LOCATED INSODE model-stories.blade.php  --}}
        {{-- @include('components.model-stories-wdata') --}}

    <div class="section-gap"></div>
    <section id="exterior" class="ext360 stage-contained">
        <h2 class="smaller">EXTERIOR</h2>
        @include('components.model-color360')
    </section>

    <div class="section-gap"></div>
    <section id="interior" class="int360 stage-contained">
        <h2 class="smaller">INTERIOR</h2>
    </section>
    @php
        $ss = 'interior';
        $data = file_get_contents($APIPATH.'model_'.$model_slug.'_story_inner_page_'.$ss.'.json', false, $honda_api_context);
        $data = json_decode($data);
        $pagedata = $data->payload->pagecontent;
    @endphp
    @include('components.pagebuilder')

    <div class="section-gap"></div>
    <section id="performance" class="performance- stage-contained">
        <h2 class="smaller">PERFORMANCE</h2>
    </section>
    @php
        $ss = 'performance';
        $data = file_get_contents($APIPATH.'model_'.$model_slug.'_story_inner_page_'.$ss.'.json', false, $honda_api_context);
        $data = json_decode($data);
        $pagedata = $data->payload->pagecontent;
    @endphp
    @include('components.pagebuilder')

    <div class="section-gap"></div>
    <section id="safety" class="safety- stage-contained">
        <h2 class="smaller">SAFETY</h2>
        <div class="intro">
            <h2>ABSOLUTE VISION</h2>
            <div class="intro-title grey text-center">Safety takes a leap forward with an intelligent system that is ever-ready to watch over every journey. </div>
        </div>

        {{-- THIS PROBABLY A NEW CONTENT TYPE FOR PAGE BUILDER --}}
        <div class="comp-tabbed-content">
            <div class="tab-nav top-line-gap">
                <ul class="body-copy">
                    <li class="thetab animate" data-target="safetytab1">Smart Parking Assist System</li>
                    <li class="thetab animate" data-target="safetytab2">Multi-view Camera System</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="tab-content">
                <div id="safetytab1" class="tab-body">
                    <p class="text-center top-line-gap">Steer into the tightest parking space automatically with a smart system which calculates space boundaries.</p>
                    <img class="container-width top-line-gap" src="/img/model/accord/04_Safety/2020_Accord_SMARTPARK.jpg" alt="" style="width:100%;">
                </div>
                <div id="safetytab2" class="tab-body">
                    <p class="text-center top-line-gap">Fitted with 4 cameras that capture what the eye misses at junctions or parking areas with poor visibility.</p>
                    <img class="container-width top-line-gap" src="/img/model/accord/04_Safety/2020_Accord_MULTIVIEW3.jpg" alt="" style="width:100%;">
                </div>
            </div>

            {{-- Be sure to move the js into general.js, as this need to only run once per page. --}}
            <script>
                $(document).ready(function(){
                    $('.comp-tabbed-content .thetab').click(function(){
                        $('.comp-tabbed-content .thetab').removeClass('active');
                        $('.comp-tabbed-content .tab-body').hide();
                        $(this).toggleClass('active');
                        $('#'+$(this).data('target')).show();

                        // mobile positioning
                        var ul = $(this).parent()
                        var ww = $(window).width();
                        var iw = ul.width();
                        console.log(ww,iw);
                        //
                        if(ww<iw){
                            ul.css('left', 0).css('transform', 'translate(0,0)');
                            ul.css('left', -$(this).offset().left + 50)
                        } else {
                            ul.css('left', '50%').css('transform', 'translate(-50%,0)');
                        }

                    })

                    $('.comp-tabbed-content .thetab:first-of-type').trigger('click');
                    $(window).resize(function(){
                        $('.comp-tabbed-content .thetab:first-of-type').trigger('click');
                    })
                })
            </script>
            {{-- THIS PROBABLY A NEW CONTENT TYPE FOR PAGE BUILDER [END] --}}
        </div>

        <div class="intro section-gap">
            <h2>Honda SENSING</h2>
            <div class="intro-title grey text-center">Honda SENSING* is a full suite of 8 advanced driver assistive technologies that sees what you miss, empowering you with more confidence on the road than ever before.</div>
            <div class="sensing-grid">
                <img class="for-desktop"src="/img/model/accord/Banner_NewAccord_Sensing-newlogo.jpg" alt="" style="width:100%;">
                <img class="for-mobile" src="/img/model/accord/accord_SENSING_mobile_v4.jpg" alt=""  style="width:100%;">
                <ul>
                    <li>LANE DEPARTURE WARNING</li>
                    <li></li>
                    <li>ROAD DEPARTURE MITIGATION</li>
                    <li></li>
                    <li>LANE KEEP ASSIST SYSTEM</li>
                    <li></li>
                    <li>FORWARD COLLISION WARNING</li>
                    <li></li>
                    <li>COLLISION MITIGATION BRAKING SYSTEM </li>
                    <li></li>
                    <li>ADAPTIVE CRUISE CONTROL</li>
                    <li></li>
                    <li>LOW SPEED FOLLOW</li>
                    <li></li>
                    <li>AUTO HIGH BEAM</li>
                </ul>
            </div>
        </div>

        <div class="stage-contained">
            <div class="note-container">
                <div class="note-title more">DISCLAIMER</div>
                <div class=" expand-content" style="display: none;">
                    <ul>
                        <li>
                            *Honda SENSING alerts and assists drivers to drive safely on the road. Honda SENSING functions best in conducive weather and visibility conditions. Keep the radar and cameras clean and unobstructed for optimum performance. Despite the capabilities of Honda SENSING, drivers remain responsible for safely operating the vehicle and avoiding collisions. Drivers should always keep their hands on the steering wheel and be in control of their driving behaviour at all times.
                        </li>
                        <li>Actual model, features and specifications may vary in detail from image shown. Subject to change without prior notice.</li>
                    </ul>

                </div>
            </div>
        </div>

    </section>


    <section id="gallery" class="section-gap-inner gallery" >
        <h2>GALLERY</h2>
        @include('components.model-gallery-wdata')
    </section>

    <section class="color-container section-gap-inner" id="colour-accessories">
        {{-- <h2>Colours &amp; accessories</h2> --}}
        <h2>ACCESSORIES</h2>
        @include('components.model-color-acc')
    </section>


    <section class="spec-container section-gap-inner" id="spec-price">
        <div class="container">
            <h2>SPECIFICATIONS &amp; PRICING</h2>
            @include('components.model-pricing-section')
        </div>
    </section>






    <section class="shopping-tools body-copy grey container section-gap" id="shopping-tools" style="padding-top: 40px; margin-top: -40px;">
        @include('components.shopping-tools')
        <div class="clearfix"></div>
    </section>


    <section class="happenings section-gap">
    <h2>HAPPENINGS</h2>
        @include('components.happenings-wdata')
    </section>


    <section class="model-selection section-gap">
        <h2>EXPLORE ALL MODELS</h2>
        @include('components.model-carousel')
    </section>


    <section class="prime-cta section-gap-last grey ">
        @include('components.withdreamlink')
    </section>

    <style>
        .model-inner-container .intro.first { margin-top:0;}
        h2.smaller {font-size: 1rem; margin-bottom:0;}
        .bottom-gap {margin-bottom:40px;}
        .model-inner-container .intro .intro-title {max-width: 770px;}

        .container-width {width:100%;}
        .top-line-gap {margin-top:2.5rem;}

        .sensing-grid { margin-top:50px; }
        .sensing-grid > img { height:100%;}
        .sensing-grid > ul { position: absolute; top: 0; left:64%; height:100%; width: 37%; background:rgba(255,255,255,.7); padding:20px; overflow-y: auto; }
        .sensing-grid > ul li:nth-child(2n-1) { padding:15px; vertical-align: middle; font-size: 100%;}
        .sensing-grid > ul li:nth-child(2n) { border-bottom:1px solid #00b5ff; margin:0 20px; width:20px;}

        .intro-title {max-width:770px; margin:auto; font-weight: normal;}
        .text-center {color: #5E6063;}

        .comp-tabbed-content .tab-nav ul {width: max-content;}

        .animate {transition-duration: .3s;}

        .table-content-container .spec-details li table td:first-child {text-transform:none;}

        @media only screen and (max-width:1280px){
            .sensing-grid {width--:1280px; transform}
        }
        @media only screen and (max-width:1024px){
            .sensing-grid > ul {position:relative; width:100%; left:0; background:#E7ECF4;}
            .sensing-grid > ul li {margin-left:auto !important; margin-right:auto !important; width: fit-content ; text-align: center;}
        }
        @media only screen and (max-width:768px){
            .comp-tabbed-content .tab-nav ul li {padding:16px;}
        }
    </style>

@stop

