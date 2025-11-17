
@extends('layouts.base')

@section('page-title')
Honda CONNECT
@endsection

@section('content')

    <section id="second-menu">
        @include('brand.tech-menu')
    </section>

    <section>
        <div class="body-wrapper">
        <section class="content-inner innerpage hip" style="margin-top: 15px;">
            {{-- <div class="tech-banner"></div> --}}
            <!--a href="#ar-section"><div class="floatingbtn"><img src="{{url('img/technology/05_connect/floatingbuttonv2.png')}}" alt=""></div></a -->
            <div class="tech-banner" style="background-color: #080949;">
                <img src="{{url('img/technology/05_connect/banner/logo.png')}}" alt="">
                <img src="{{url('img/technology/05_connect/banner/textlogo.png')}}" alt="">
            </div>
           {{-- <div class="tech-banner mobile">
                <img src="{{url('img/technology/05_connect/BANNER-mobile.png')}}" alt="">
            </div>--}}

            <div class="inner-content-section content-area">
                <h2>ADVANCED CONNECTIVITY FOR YOU AND YOUR CAR</h2>
                <div class="content-copy">Innovative safety, security and convenience is yours with Honda CONNECT – advanced smart technology that turns your car into an intelligent vehicle that’s always accessible from <span style="white-space:nowrap;">your smartphone.</span></div>
                <div class="clearfix"></div>
            </div>

            <div class="section-animate">
                {{-- <div class=""><img src="{{url('img/technology/05_connect/animate-bg.png')}}" alt=""> </div> --}}
                <lottie-player src="{{url('img/technology/05_connect/data-3.json')}}" background="transparent"  speed="1"  style="" loop autoplay></lottie-player>
            </div>
            

            <div class="space-h35"></div>

            {{-- SAFETY --}}
            <div class="blue-bg" style="height: 397px;;">
                <h2 class="titlewShadow">SAFETY</h2>
                {{--<div class="content-maintitle"><img src="{{url('img/technology/05_connect/text/SAFETYv2.jpg')}}" alt=""> </div>--}}
                <div class="whitecontentcopy">Want a car with safety technology that’s straight out of a sci-fi movie? With Honda&nbsp;CONNECT, you get a car that automatically lets you know whenever there’s a safety concern. All on its&nbsp;own.</div>
            </div>
            <div class="video-container video-topmargin">
                <div class="embed-youtube"><iframe width="760" height="515" src="https://www.youtube.com/embed/M4FuY-3QQAk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
            </div>
            <div class="blue-bg">
                <ul class="flex" style="justify-content: center;">
                    <li>
                        <div class="icon"><img src="{{url('img/technology/05_connect/safety-icon1.png')}}" alt=""> </div>
                        <div class="title">Automatic Collision <br>Detection</div>
                        {{--<div class="content-title"><img src="{{url('img/technology/05_connect/text/safety-title1.jpg')}}" alt=""> </div>--}}
                        <div class="content">With Honda CONNECT, your car can automatically detect collisions and call for help. This ensures that you’ll receive timely assistance whenever it’s&nbsp;required.</div>
                    </li>
                    <li>
                        <div class="icon"><img src="{{url('img/technology/05_connect/safety-icon2.png')}}" alt=""> </div>
                        <div class="title">Security Alarm Detection</div>
                        {{--<div class="content-title"><img src="{{url('img/technology/05_connect/text/safety-title2.jpg')}}" alt=""> </div>--}}
                        <div class="content">With Honda CONNECT, your car automatically sends an alert when the security alarm is triggered by trespassers, so you’ll have the upper hand. Even when you’re far&nbsp;away.</div>
                    </li>
                    <li>
                        <div class="icon"><img src="{{url('img/technology/05_connect/safety-icon3.png')}}" alt=""> </div>
                        <div class="title">Speed Alert</div>
                        {{--<div class="content-title"><img src="{{url('img/technology/05_connect/text/safety-title3.jpg')}}" alt=""> </div>--}}
                        <div class="content">Is someone in your family borrowing your car? Honda CONNECT allows you to intuitively set a speed alert, and automatically notifies you if they exceed it – allowing you to always keep an eye on&nbsp;them.</div>
                    </li>
                </ul>
            </div>

            <div class="space-h35"></div>

            {{-- SECURITY --}}
            <div class="blue-bg" style="height: 375px;;">
               <h2 class="titlewShadow">SECURITY</h2>
               {{-- <div class="content-maintitle"><img src="{{url('img/technology/05_connect/text/SECURITY.jpg')}}" alt=""> </div>--}}
                <div class="whitecontentcopy">Honda CONNECT enhances the security of your car with advanced technology that helps you keep track of its latest location at all&nbsp;times.</div>
            </div>
            <div class="video-container video-topmargin">
                <div class="embed-youtube"><iframe width="760" height="515" src="https://www.youtube.com/embed/t9nMrXuAkOQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
            </div>
            <div class="blue-bg">
                <ul class="flex" style="justify-content: center;">
                    <li>
                        <div class="icon"><img src="{{url('img/technology/05_connect/security-icon1.png')}}" alt=""> </div>
                        <div class="title">Find My Car</div>
                        {{--<div class="content-title"><img src="{{url('img/technology/05_connect/text/security-title1.jpg')}}" alt=""> </div>--}}
                        <div class="content">Need to locate your car? With advanced connectivity made possible by Honda CONNECT, you can now easily find your car, wherever it may be. Even if it's far away from its last known&nbsp;location.</div>
                    </li>
                    <li>
                        <div class="icon"><img src="{{url('img/technology/05_connect/security-icon2.png')}}" alt=""> </div>
                        <div class="title">Geo-fencing Alert</div>
                        {{--<div class="content-title"><img src="{{url('img/technology/05_connect/text/security-title2.jpg')}}" alt=""> </div>--}}
                        <div class="content">With Honda CONNECT’s <span style="white-space:nowrap;">geo-location</span> technology, you can set zones with various parameters around your car and receive alerts whenever your car enters or exits them. This ensures that no one can drive your car away without your&nbsp;consent.</div>
                    </li>
                    <li>
                        <div class="icon"><img src="{{url('img/technology/05_connect/security-icon3.png')}}" alt=""> </div>
                        <div class="title">Emergency Call</div>
                        {{--<div class="content-title"><img src="{{url('img/technology/05_connect/text/security-title3.jpg')}}" alt=""> </div>--}}
                        <div class="content">Honda CONNECT also makes it easier for you to access emergency contacts with just a tap, giving you a helping hand in any kind of emergency on <span style="white-space:nowrap;">the road.</span></div>
                    </li>
                </ul>
            </div>

            <div class="space-h35"></div>

            {{-- CONVENIENCE --}}
            <div class="blue-bg" style="height: 375px;;">
                <h2 class="titlewShadow" >CONVENIENCE</h2>
                {{--<div class="content-maintitle w100mobile"><img src="{{url('img/technology/05_connect/text/CONVENIENCE.jpg')}}" alt=""> </div>--}}
                <div class="whitecontentcopy">With Honda CONNECT, your car can now be checked on and controlled remotely. All&nbsp;conveniently from your&nbsp;smartphone.</div>
            </div>
            <div class="video-container video-topmargin">
                <div class="embed-youtube"><iframe width="760" height="515" src="https://www.youtube.com/embed/szbaDUcSVLg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
            </div>
            <div class="blue-bg">
                <ul class="flex" style="justify-content: center;">
                    <li>
                        <div class="icon"><img src="{{url('img/technology/05_connect/convenience-icon1.png')}}" alt=""> </div>
                        <div class="title">Car Status</div>
                        {{--<div class="content-title"><img src="{{url('img/technology/05_connect/text/convenience-title1.jpg')}}" alt=""> </div>--}}
                        <div class="content special-box">Diagnostic Support</div>
                        <div class="content special-box ">Fuel, Battery, Locks, Airbag</div>
                        <div class="content">You will automatically receive alerts if the ABS, Supplemental Restraint System, Brake System, Engine Malfunction, Charging System, VSA, Electric Power Steering System, LKAS, ACC, Safety Support or Power System indicator lamp is on and requires your attention. You will also be able to remotely check on car fuel, battery, lock and airbag&nbsp;status.</div>
                    </li>
                    <li>
                        <div class="icon"><img src="{{url('img/technology/05_connect/convenience-icon2.png')}}" alt=""> </div>
                        <div class="title">Remote Vehicle Control</div>
                        {{--<div class="content-title"><img src="{{url('img/technology/05_connect/text/convenience-title2.jpg')}}" alt=""> </div>--}}
                        <div class="content special-box">Remote Engine Start &amp; Stop</div>
                        <div class="content special-box ">Remote Air <br>Conditioner Control</div>
                        <div class="content special-box">Remote Lock &amp; Unlock</div>
                        <div class="content special-box ">Remote Light Control</div>
                        <div class="content">Start the engine, cool it down, lock it or switch on the lights: You can now do it all with just a quick tap on your&nbsp;smartphone.</div>
                    </li>
                    <li>
                        <div class="icon"><img src="{{url('img/technology/05_connect/convenience-icon3.png')}}" alt=""> </div>
                        <div class="title">Service Reminder</div>
                        {{--<div class="content-title"><img src="{{url('img/technology/05_connect/text/convenience-title3.jpg')}}" alt=""> </div>--}}
                        <div class="content">Even the best of us forget sometimes. But Honda CONNECT has the technology to automatically remind you when maintenance is due. So you can schedule an appointment <span style="white-space:nowrap;">right away.</span></div>        
                <div id="ar-section"></div>
                    </li>
                </ul>
            </div>
            
            
            <div class="space-h35"></div>
            
            <!--div class="bottom-banner">
                <div class="row-qr">
                    <div class="column-qr col1">
                        <img src="{{url('img/technology/05_connect/banner/bottom-car.png')}}" alt="">
                    </div>
                    <div class="column-qr col2">
                        <div class="ar-title">THE Honda CONNECT <br>AR EXPERIENCE</div>
                        <div class="ar-copy">Scan the QR Code and see Honda CONNECT in action on your smartphone, through an interactive augmented reality&nbsp;experience!</div>
                    </div>
                    <div class="column-qr col3">
                        <img class="desktop" src="{{url('img/technology/05_connect/banner/HondaQRcode.png')}}" alt="">
                        <a href="https://hondaconnect.arweb.app/" target="_blank"><img class="mobile" src="{{url('img/technology/05_connect/banner/trynow-v2.png')}}" alt=""></a>
                    </div>
                </div>
            </div -->

            {{--<div class="bottom-banner mobile">
                <img src="{{url('img/technology/05_connect/banner/bottom-banner-mobile-v3.jpg')}}" alt="">
            </div>--}}


        </section>

        </div>
    </section>

    <section class="model-selection section-gap">
        <h2>EXPLORE ALL MODELS with Honda CONNECT</h2>
        @php
            $model_carousel_only_show = ['city', 'city-hatchback', 'civic'];
        @endphp
        @include('components.model-carousel')
    </section>

    <style>
        html {scroll-behavior: smooth;}
        @font-face {
            font-family: conthrax-sb;
            src: url(../img/technology/05_connect/font/conthrax-sb.ttf);
        }
        .title-left {text-align:left;}
        .hip.innerpage .icon {width:150px; height: 150px;}
        .note-container .more.long:after{left:unset;}
        .hip.innerpage ul.flex li {margin-bottom: 0px;}

        .hip.innerpage .icon img {width: 87%;}
        ul.flex li img {width:100%;}
        .mobile-space {padding-top: 0;}
        .desktop {display: block;}
        .mobile {display: none;}
        /* overwrite */
        .innerpage ul.flex li {width:26%;}
        .hip.innerpage .title {height: 45px;font-family: conthrax-sb; color:#d8e4ec; text-shadow: 0px 0px 13px #217cb1, 0 0 10px #7fcef1, 0px 0px 8px #0c67d2;}
        .hip.innerpage .content {color: #ffffff;font-size: 0.75rem;}

        .video-container {display: block;margin: 35px auto;width: 100%;max-width: 760px;padding: 0 10px;z-index: 5;}
        .video-topmargin {margin-top: -191px;}

        .embed-youtube {padding-bottom: 56.25%;overflow: hidden;position: relative;width: 100%;height: 100%;cursor: pointer;}
        .embed-youtube iframe,
        .embed-youtube object,
        .embed-youtube embed { border: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;}

        
        /* .tech-banner {background: url(../img/technology/05_connect/BANNER.png)no-repeat top center;background-size: cover;height: 420px;color: #fff;} */
        .tech-banner {background-color: #080949;margin: auto;text-align: center;height: 400px;padding: 100px 10px;}
        .tech-banner.mobile img {width: 100%;}
        .section-animate {background: url(../img/technology/05_connect/bg.jpg)no-repeat top center;background-size: cover;width: 100%; height: 100vh; transform: translate3d(0px, 0px, 0px);}
        .section-animate img {width: 100%;}
        .space-h35 {height: 35px;background-color: #ffffff;}
        .whitespace {height: 255px;background-color: #ffffff;margin-top: -18%;}
        .whitecontentcopy {padding:0 10px;font-size: 1rem;font-weight: 400;text-align: center;color: #ffffff;max-width:785px;margin:auto;line-height: 25px;letter-spacing: 0.71px;}
        .whitecopy {color: #ffffff;}
        .blue-bg {background-color: #080948;padding: 50px 5px 50px 5px;}
        .special-box {border: 1px solid #3B89FF;padding: 3px;margin: 3px 0;text-shadow: 1px 1px 6px #1b96ea, 0 0 25px #3db3fe, 0 0 8px #083f89;box-shadow: 1px 1px 2px #083a83, 0 0 8px #074e9b, 0 0 5px #58bcfc;}
        .floatingbtn {right: 15px;cursor: pointer;z-index: 4;position: fixed;margin-top: 5px;width: 200px;}
        .floatingbtn img {width: 100%;}

        .bottom-banner {background: url(../img/technology/05_connect/banner/bottom-bg.jpg)no-repeat top center;background-size: cover;}
        .bottom-banner img {width: 100%;}
        .titlewShadow {font-family: conthrax-sb; color:#ffffff; text-shadow: 0px 0px 13px #217cb1, 0 0 10px #7fcef1, 0px 0px 8px #0c67d2;font-size: 30px;letter-spacing: 5px;}
        ul.flex li .content-title img {width: 95%;}
        .content-maintitle {text-align: center;width: 300px;margin: auto;}
        .content-maintitle img {width: 100%;}
        .content-title {padding: 10px 0;}

        * {box-sizing: border-box;}
        .column-qr {float: left;padding: 10px;}
        .col1 {width: 40%; text-align: right;margin-top:29px;}
        .col1 img {width: 80%;}
        .col2 {width: 35%; text-align: right;margin-top: 0px;}
        .col3 {width: 25%;padding-left: 30px;}
        .col3 img {width: 65%;}
        .row-qr {padding: 50px 0 10px;}
        .row-qr:after { content: "";display: table;clear: both;}

        .ar-title {font-family: conthrax-sb;text-shadow: -1px -1px 8px #1963ce, 1px -1px 12px #3b8aff, -1px 1px 16px #1b8be7, 1px 1px 11px #ffffff; color: #ffffff;font-size: 24px;letter-spacing: 5px;font-weight: 500;}
        .ar-copy {margin: 10px 0 0 30px;color: #ffffff;line-height: 1.5em;}

        @media only screen and (max-width: 768px) {
            /* .tech-banner {background: url(../img/technology/05_connect/BANNER-mobile.png)no-repeat top center;background-size: cover;height: 420px;color: #fff;} */
        }

        @media only screen and (max-width: 640px) {

            .tech-banner {height: unset;padding: 70px 10px;}
            .tech-banner img {width: 100%;}
            .content-inner .hondatouchbanner {background: url(../img/technology/05_connect/BANNER.png)no-repeat top center;background-size: cover;height: 170px;}
            .title-left {text-align:center;}
            ul.flex li img {width:50%;}
            .mobile-space {padding-top: 20px;}
            .hip.innerpage .title {height: unset;}
            .desktop {display: none;}
            .mobile {display: block;}
            .video-topmargin {margin-top: -135px;}
            .w100mobile img {width: 100%;}

            .section-animate {width: unset; height: unset; transform: translate3d(0px, 0px, 0px);}

            .floatingbtn {right: -65px;margin-top: 3px;}
            .floatingbtn img {width: 65%;}

            .titlewShadow {font-size: 24px;letter-spacing: 3px;}

            .bottom-banner {background: url(../img/technology/05_connect/banner/bottom-bg-mobile.jpg)no-repeat top center;background-size: cover;}
            .col1 {width: 100%; text-align: center;margin-top:29px;}
            .col1 img {width: 90%;}
            .col2 {width: 100%; text-align: center;margin-top: 25px;}
            .col3 {width: 100%;text-align: center;padding: 15px 0 50px;}
            .col3 img {width: 65%;margin: auto;}
            .row-qr {padding: 50px 0 10px;}

            .ar-title {font-size: 20px;letter-spacing: 3px;}
            .ar-copy {margin: 25px 0 0 0px;color: #d5d8ec;line-height: 1.5em;}

        }
    </style>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
            jQuery("document").ready(function(){
                setTimeout(function(){
                     console.log("center");
                    jQuery(".owl-next").click();
                }, 1000)
            })

    </script>
   

@stop


