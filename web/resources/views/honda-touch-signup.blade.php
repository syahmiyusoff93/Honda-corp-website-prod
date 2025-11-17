
@extends('layouts.base')


@section('content')

<div class="body-wrapper">
<section class="content-inner innerpage hip">
    <div class="hero-banner hondatouchbanner">
        <!-- <div class="text-container">
            <div class="cat">Honda Insurance Plus (HiP)</div>
            <div class="header">EXTENSIVE COVERAGE AND SAVINGS PLAN DESIGNED FOR YOU.</div>
        </div> -->
        <div class="bottomright">
            <a href="https://www.honda.com.my/technology/honda-connect">
                <img class="connect-img" src="{{url('img/aftersales/honda-touch/Honda_Connect_CTA.png')}}" alt="">
            </a>
        </div>
    </div>

    <section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                    <!-- <span></span>
                    <span></span> -->
                </label>
                </div>
                <ul>
                    <li><a href="{{url('aftersales/hondatouch')}}">HondaTouch</a></li>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/hondatouch/signup')}}">How To Sign Up</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>
    </section>

    <div class="inner-content-section content-area" style="padding-left: 20px; padding-right: 20px;">
        <h2>HOW TO SIGN UP</h2>
        <div class="clearfix"></div>

        
        <div style="font-size: 1.5rem;font-weight: 500;text-align: center;color: #e30720;padding:10px;">Step 1:</div>
        <h2>Download &amp; install the HondaTouch App.</h2>
        <ul class="flex" style="justify-content: center;">
            <li style="padding: 10px;">
                <a href="{{url('https://apps.apple.com/us/app/id1528936599')}}" target="_blank"><img src="{{url('img/aftersales/honda-touch/revise/Badge_Apple2x-8.png')}}" alt=""> </a>
            </li>
            <li style="padding: 10px;">
                <a href="{{url('https://play.google.com/store/apps/details?id=com.honda.HondaTouch.prod')}}" target="_blank"><img src="{{url('img/aftersales/honda-touch/revise/Badge_Google2x-8.png')}}" alt=""> </a>
            </li>
        </ul>
    </div>

    <div class="" style="background-color: #f5f5f5;padding: 50px 0 50px 0;">
        <ul class="flex" style="justify-content: center;">
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/revise/Step02@2x-8.png')}}" alt=""> </div>
            </li>
            <li class="paddingmobile">
                <div class="verticalcentertitle" style="font-size: 1.5rem;font-weight: 500;text-align: left;color: #e30720;line-height: 1.2em;">Step 2: REGISTER</div>
                <div class="content verticalcentercontent" style="text-align: left;">Key in a valid email address and create your password.</div>
            </li>
        </ul>
    </div>
    <div class="" style="padding: 50px 0 50px 0;">
        <ul class="flex" style="justify-content: center;">
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/revise/Step03@2x-8.png')}}" alt=""> </div>
            </li>
            <li class="paddingmobile">
                <div class="verticalcentertitle" style="font-size: 1.5rem;font-weight: 500;text-align: left;color: #e30720;line-height: 1.2em;">Step 3: VERIFY</div>
                <div class="content verticalcentercontent" style="text-align: left;">Key in the unique 4-digit code sent to your email.</div>
            </li>
        </ul>
    </div>
    <div class="" style="background-color: #f5f5f5;padding: 50px 0 50px 0;">
        <ul class="flex" style="justify-content: center;">
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/revise/Step04@2x-8.png')}}" alt=""> </div>
            </li>
            <li class="paddingmobile">
                <div class="verticalcentertitle" style="font-size: 1.5rem;font-weight: 500;text-align: left;color: #e30720;line-height: 1.2em;">Step 4: FILL IN DETAILS</div>
                <div class="content verticalcentercontent" style="text-align: left;">Fill in and submit all the required details.</div>
            </li>
        </ul>
    </div>
    <div class="" style="padding: 50px 0 50px 0;">
        <ul class="flex" style="justify-content: center;">
            <li>
                <div class="icon"><img src="{{url('img/aftersales/honda-touch/revise/Step05@2x-8.png')}}" alt=""> </div>
            </li>
            <li class="paddingmobile">
                <div class="verticalcentertitle w400" style="font-size: 1.5rem;font-weight: 500;text-align: left;color: #e30720;line-height: 1.2em;">Step 5: REGISTRATION COMPLETE!</div>
                <div class="content verticalcentercontent30" style="text-align: left;">One-touch convenience is now yours to enjoy!</div>
            </li>
        </ul>
    </div>


</section>

</div>

<style>

    .content-inner .hondatouchbanner {
        background: url(/img/aftersales/honda-touch/HeroBanner.png)
        no-repeat top center;
        background-size: cover;
        height: 420px;
        color: #fff;
        position: relative;
        background-position-y: center;
    }
    .title-left {text-align:left;}
    .note-container .more.long:after{left:unset;}
    .hip.innerpage ul.flex li {margin-bottom: 0px;}

    .red {color: #ea1d24;}
    .hip.innerpage .icon {width: 177px; height: auto;}
    .verticalcentertitle {top: 30%;-ms-transform: translateY(-30%);transform: translateY(-30%);}
    .verticalcentercontent {top: 35%;-ms-transform: translateY(-35%);transform: translateY(-35%);}
    .verticalcentercontent30 {top: 33%;-ms-transform: translateY(-33%);transform: translateY(-33%);}
    .left {text-align: left;}
    ul.flex li img {width:100%;}
    .w400 {width: 400px;}
    /* overwrite */
    .innerpage ul.flex li {width:26%;}
    .hip.innerpage ul.flex li {padding: 20px 0px;}

    .video-container {display: block;margin: 20px auto;width: 100%;max-width: 760px;padding: 0 10px;}

    .embed-youtube {padding-bottom: 56.25%;overflow: hidden;position: relative;width: 100%;height: 100%;cursor: pointer;}
    .embed-youtube iframe,
    .embed-youtube object,
    .embed-youtube embed { border: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;}

    .bottomright {
        position: absolute;
        top: 16.5rem;
        right: -4rem;
    }
    .connect-img {
        width: 73%;
    }

    @media only screen and (max-width: 640px) {
        .content-inner .hondatouchbanner {background: url(/img/aftersales/honda-touch/HeroBanner.png)no-repeat top center;background-size: cover;height: 135px;}
        .title-left {text-align:center;}
        ul.flex li img {width:50%;}
        .verticalcentertitle {top: 0%;-ms-transform: translateY(-0%);transform: translateY(-0%);}
        .verticalcentercontent {top: 0%;-ms-transform: translateY(-0%);transform: translateY(-0%);}
        .verticalcentercontent30 {top: 0%;-ms-transform: translateY(-0%);transform: translateY(-0%);}
        .hip.innerpage ul.flex li.paddingmobile {padding: 0 20px;}
        .w400 {width: unset;}
        .connect-img {width: 20%;}
        .bottomright {top: 5.5rem; right: -14.5rem;}
    }


</style>

@stop

