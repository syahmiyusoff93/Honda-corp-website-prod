
@extends('layouts.base')

@section('page-title')
Honda SPORT HYBRID i-DCD
@endsection


@section('content')

<style>
    .tech-banner {background: url(../img/technology/03_hybrid/HYBRID_BANNER.jpg)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
    .text-container {top: 50%;transform: translate(0, -50%);text-align: center;}
    .text-container .header {font-size: 2.25rem;font-weight: 400;line-height: 54px;letter-spacing: 7.2px;text-shadow: 0px 2px 24px rgba(0,0,0,0.5);margin-top: 15px;max-width: 1200px;margin-left: auto;margin-right: auto;}

    .desc-fold {padding: 70px 20px;}
    .desc-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;max-width: 780px;margin: auto;}

    .content-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;}


    .container {width: 100%;max-width: 1200px;margin: auto;padding: 70px 10px;position: relative;}
    .img-sec.float-right {text-align: right; overflow: hidden;}
    .img-sec {width: calc(50% - 25px);}

    .img-sec img {transition: all 1s;display: block;width: 100%;height: auto;transform: scale(1);image-rendering: auto;}
    .content-sec {width: 50%;margin-right: 25px;position: absolute;top: 50%;position: absolute;transform: translate(0, -50%);-webkit-transform: translate(0, -50%);height: 100%;}

    .float-right {float: right;}
    .float-left {float: left;}

    .content-sec.float-left {padding-left: calc(2.5% + 25px);position: absolute;left: 50%;}

    .detail-content {top: 50%;position: absolute;transform: translate(0, -50%);-webkit-transform: translate(0, -50%);}
    .rightpadding {padding-right:90px;}
    .centerdiv {margin:auto;margin-top: 20px;margin-bottom: 20px;}
    .maxwidth783 {margin: auto; max-width: 783px;}
    .grey {background: #f7f7f7;}
    /* overwrite */
    .img-sec {width: calc(70% - 25px);}
    .img-sec-fullwidth {width: calc(100% - 0px);}
    .w718 {width:718px;}
    .w579 {width:579px;}
    .h55 {height: 55px;}

    .idcd-bg {background: url(../img/technology/03_hybrid/02_Image/iDCD.jpg)no-repeat top center;background-size: cover;height:700px;}
    .hybridcol {float: left;padding: 45px;}
    .hybridcolleft {width:40%;}
    .hybridcolleft p {font-size: 26px; color:#d8d8d8;font-weight: 500;line-height: 1.5;margin-top: 14px;}
    .hybridcolright {width: 60%;}
    .hybridcolright p {font-size: 16px; color:#d8d8d8;line-height: 1.5;}
    .hybridrow:after {content: "";display: table;clear: both;}
    .hybridrow{position: absolute;max-width:1200px; bottom:0;margin-left: auto;margin-right: auto;left: 0;right: 0;}

    .hybridbox {float: left;width: 33.3%;padding: 20px;}
    .hybridboxrow:after {content: "";display: table;clear: both;}
    .space {padding: 30px;}

    .hybridbox .desc-copy {line-height: 1.571em;letter-spacing: 0.6px;}

    @media only screen and (max-width: 768px) {
        .tech-banner {background: url(../img/technology/03_hybrid/HYBRID_BANNER.jpg)no-repeat left;background-size: cover;height: 170px;}
        .text-container .header {font-size: 1.25rem;letter-spacing: 1.2px;}


        .container {padding: 35px 10px;}
        .desc-copy {font-size: 0.9rem;}

        .float-right {float: none;}
        .float-left {float: none;}
        .img-sec {width:100%;}
        .content-sec {width: 100%;position:relative;top: unset;transform: unset;-webkit-transform: unset;padding-top: 20px;}
        .detail-content {top: unset;position: unset;transform:unset;-webkit-transform:unset;}
        .rightpadding {padding-right:0px;}

        .content-sec.float-left {padding-left: unset;position: unset;left: unset;}
        .hybridcolleft {width: 100%;}
        .hybridcolright {width: 100%;}

        .hybridbox {width: 100%;}

        .hybridcol {padding: 0px 45px;}
        .idcd-bg {height:750px;}
        .w718 {width:100%;}
        .h55 {height: unset;}
    }
</style>

<section id="second-menu">
    @include('brand.tech-menu')
</section>

<section>
    <!-- banner -->
    <div class="tech-banner">
        <div class="text-container">
            <div class="header">Honda SPORT HYBRID i-DCD</div>
        </div>
    </div>

    <!-- description -->
    <div class="desc-fold maxwidth783">
        <div class="img-sec img-sec-fullwidth centerdiv">
            <video controls="" autoplay="" name="media" class="w718">
                <source src="{{url('img/technology/03_hybrid/01_Video/Honda_Sport_Hybrid.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="desc-copy">The i-DCD system is designed to switch seamlessly between electric mode and thrilling sport mode using the combination of electric motor and engine power. It delivers a performance equal to a 1.8L engine while remaining fuel efficient*.</div>
    </div>
</section>

<section class="idcd-bg">
        <div class="hybridrow">
            <div class="hybridcol hybridcolleft">
                <p>A POWERFUL ACCELERATION FROM HIGH PERFORMANCE ENGINE, MOTOR AND BATTERY</p>
            </div>
            <div class="hybridcol hybridcolright">
                <p>The i-DCD realises an exhilarating driving experience every time the accelerator is pushed deep, by combining a powerful 1.5L DOHC i-VTEC engine utilising Honda’s unique VTEC technology, with a compact, high-torque motor, and a Lithium-Ion battery which can provide the motor with a high current in an instant. The Hybrid Drive mode provides strong acceleration by combining electric motor power with engine power through the dual clutch transmission. </p>
            </div>
        </div>
</section>

<section class="maxw1200">
    <div class="space"></div>
    <h2>THE HEART OF i-DCD</h2>
    <div class="hybridboxrow">
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/01_iDCD/1.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;">NEW 1.5L DOHC i-VTEC ENGINE WITH IDLE STOP</h2>
            <div class="desc-copy" style="font-size:14px;">Designed with performance and efficiency in mind. It switches off when idling to minimise fuel consumption.</div>
        </div>
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/01_iDCD/2.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;">7-SPEED DCT WITH HIGH POWER ELECTRIC MOTOR</h2>
            <div class="desc-copy" style="font-size:14px;">Dual clutches allow for quick gear shifting to enhance the thrill brought by the high-power electric motor.</div>
        </div>
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/01_iDCD/3.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;">HIGH-POWER LITHIUM-ION BATTERY</h2>
            <div class="desc-copy" style="font-size:14px;">Powerful yet durable, the Lithium-ion Battery has high capacity in a compact package. </div>
        </div>
    </div>
    <div class="hybridboxrow">
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/01_iDCD/4.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;">FULLY ELECTRIC DRIVEN COMPRESSOR</h2>
            <div class="desc-copy" style="font-size:14px;">A fully electric compressor reduces the load on the engine, allowing the air conditioner to cool when idle stop is activated. </div>
        </div>
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/01_iDCD/5.jpg')}}" alt="">
            </div>
            <h2 class="h55" style="font-size:18px;">ELECTRIC SERVO BRAKE SYSTEM</h2>
            <div class="desc-copy" style="font-size:14px;">An integrated electronic control unit allows a greater battery recharge rate when braking. This enhances braking comfort and gives a longer drive in EV mode. </div>
        </div>
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/01_iDCD/6.jpg')}}" alt="">
            </div>
            <h2 class="h55" style="font-size:18px;">SPORTY HANDLING</h2>
            <div class="desc-copy" style="font-size:14px;">Powerful yet durable, the Lithium-ion Battery has high capacity in a compact package. </div>
        </div>
    </div>
    <div class="hybridboxrow">
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/01_iDCD/7.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;">IMPROVED NOISE, VIBRATIONS AND HARSHNESS (NVH) REDUCTION</h2>
            <div class="desc-copy" style="font-size:14px;">New insulators absorb outside noise and vibrations for a quieter and more <span style="white-space:nowrap;">comfortable drive.</span></div>
        </div>
    </div>

    <div class="space"></div>

    <h2>A MULTI-INFORMATION DISPLAY</h2>
    <div class="hybridboxrow">
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/02_MultiInfo/1.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;">ENERGY FLOW</h2>
        </div>
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/02_MultiInfo/2.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;">FUEL ECONOMY</h2>
            <div class="desc-copy" style="font-size:14px;">Average fuel consumption & driving distance balance.</div>
        </div>
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/02_MultiInfo/3.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;">DRIVE INFO </h2>
            <div class="desc-copy" style="font-size:14px;">Average speed. Average journey time.</div>
        </div>
    </div>
    <div class="hybridboxrow">
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/02_MultiInfo/4.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;">SPORT METER</h2>
            <div class="desc-copy" style="font-size:14px;">Display when driving on Sport Mode.</div>
        </div>
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/02_MultiInfo/5.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;" style="font-size:14px;">ECO DISPLAY</h2>
        </div>
        <div class="hybridbox">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/03_hybrid/02_Image/02_MultiInfo/6.jpg')}}" alt="">
            </div>
            <h2 style="font-size:18px;">CUSTOMISE</h2>
            <div class="desc-copy" style="font-size:14px;">Adjust settings such as volume of keyless entry beep or duration of interior dimmer.</div>
        </div>
    </div>
</section>

<section class="model-selection section-gap">
    <h2>EXPLORE ALL MODELS</h2>
    @include('components.model-carousel')
</section>


@stop


