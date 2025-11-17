
@extends('layouts.base')

@section('page-title')
Honda IMA
@endsection

@section('content')

<style>
    .tech-banner {background: url(../img/technology/04_IMA/IMA_banner_v5.jpg)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
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
    .img-sec-fullwidth {width: calc(100% - 25px);}

    @media only screen and (max-width: 768px) {
        .tech-banner {background: url(../img/technology/04_IMA/IMA_banner_v5.jpg)no-repeat left;background-size: cover;height: 170px;}
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
    }
</style>

<section>
    <div style="height: 50px;background: #ececec;margin-bottom: -15px;">
        <a href="{{url('technology/hallmark-of-innovations')}}" class="">
            <div style="padding: 15px 30px;font-size: 12px;">
                <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link">
                <span class="backtocopy" style="color: #565656;padding: 0 5px;width:unset;bottom:3px;">BACK TO HALLMARK OF INNOVATIONS</span>
            </div>
        </a>
    </div>
    <!-- banner -->
    <div class="tech-banner">
        <div class="text-container">
            <div class="header">Honda IMA</div>
        </div>
    </div>

    <!-- description -->
    <div class="desc-fold maxwidth783">
        <h2>IMA system incorporates two power sources, producing a synergised technology to enhance driving performance and environmental protection.</h2>
        <div class="desc-copy">The Honda Integrated Motor Assist (IMA) system features an ultra-thin electric motor mounted between a 1.3 litre engine and the Continuously Variable Transmission (CVT), combined with an Intelligent Power Unit (IPU) that stores power in a battery box and controls the electricity flow to and from the motor.</div>
        <div class="img-sec img-sec-fullwidth centerdiv">
            <img src="{{url('img/technology/00_landing/IMA.jpg')}}" alt="">
        </div>
        <div class="desc-copy">Although the engine alone is enough to provide sufficient driving performance, the electric motor smoothly kicks in the additional boost in power according to driving situations, enabling a sportier driving experience with superb fuel efficiency and addressing the urgent need for environmental protection. </div>
    </div>
</section>

<section class="grey">
    <!-- description2 -->
    <div class="desc-fold maxwidth783">
        <h2>The Hybrid System was born out of passion for the ultimate driving performance and a greener environment.</h2>
        <div class="desc-copy">With just an electric motor installed between the engine and transmission, the system engages as the vehicle accelerates or goes uphill, boosting engine power until cruising speed is met. During low speed cruise, the car runs on power solely generated from <span style="white-space:nowrap;">the motor. </span></div>
        <div class="img-sec img-sec-fullwidth centerdiv">
            <img src="{{url('img/technology/04_IMA/Hybrid-Engine.jpg')}}" alt="">
        </div>
        <div class="desc-copy">As acceleration increases, the engine and motor work together seamlessly to provide higher power output. When deceleration occurs, the IMA (Integrated Motor Assist) battery recharges through regenerative braking. The electric power created by the motor accumulates in a compact battery box called the Intelligent Power Unit, which controls the flow of electricity to and from the motor. </div>
    </div>
</section>











@stop


