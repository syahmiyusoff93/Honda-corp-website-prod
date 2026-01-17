
@extends('layouts.base')

@section('page-title')
Honda SENSING
@endsection
@section('content')

<style>
    .tech-banner {background: url(../img/technology/02_sensing/HondaSensing_V3.jpg)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
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
    .spec-container .tab-slider-tabs, .comp-tabbed-content .tab-nav ul {background: unset;}
    .img-sec {width: calc(50% - 25px);}
    .img-sec-fullwidth {width: calc(100% - 25px);}
    .w718 {width:718px;}
    .w579 {width:579px;}
    .w1202 {width:1202px;}

    .vtecturbocol {float: left;width: 50%;}
    .vtecturborow:after {content: "";display: table;clear: both;}

    .sensingbtn {float: left;width: 23%;padding: 30px;background: white;margin: 12px; height: 171px;transition: all 1s;}
    .sensingbtn:hover{transform: scale(1.1);}
    .sensingbtn-row {max-width: 1200px;margin: auto;}
    .sensingbtn-row:after {content: "";display: table;clear: both;}
    .btnheight {height: 67px;}
    .sensingbtn::after {display: none;}
    .cta{display:block;}

    .space {padding: 30px;}

    @media only screen and (max-width: 768px) {
        .tech-banner {background: url(../img/technology/02_sensing/HondaSensing_V3.jpg)no-repeat center;background-size: cover;height: 170px;}
        .text-container .header {font-size: 1.25rem;letter-spacing: 1.2px;line-height: 1.5;}

        .container {padding: 35px 10px;}
        .desc-copy {font-size: 0.9rem;text-align: left; top: calc(50% + 1px);transform: translateY(-50%);}
        .removetransform {transform: unset;}
        .btnheight {height: unset;}

        .float-right {float: none;}
        .float-left {float: none;}
        .img-sec {width:100%;}
        .content-sec {width: 100%;position:relative;top: unset;transform: unset;-webkit-transform: unset;padding-top: 20px;}
        .detail-content {top: unset;position: unset;transform:unset;-webkit-transform:unset;}
        .rightpadding {padding-right:0px;}

        .content-sec.float-left {padding-left: unset;position: unset;left: unset;}
        .vtecturbocol {width: 100%;}

        .sensingbtn {width: 95%;height: 90px;}
        .cta{display:none;}
        .sensingbtn::after {display:block;content: url(/img/interface/arrow-short-right-red.svg);position: absolute;right: 15px; top:calc(50% + 3px); transform:translateY(-50%);}
    }
</style>

<section id="second-menu">
    @include('brand.tech-menu')
</section>

<section>

    <!-- banner -->
    <div class="tech-banner">
        <div class="text-container">
            <div class="header">Honda SENSING &amp; <br>OTHER ADVANCED SAFETY FEATURES</div>
        </div>
    </div>

    <!-- description -->
    <div class="desc-fold maxwidth783">
        <h2>Honda SENSING. <br>OUR DREAM OF A COLLISION-FREE SOCIETY.</h2>
        <div class="desc-copy removetransform">We strive towards realising a collision-free society with our global safety concept, ‘Safety for Everyone’. This concept applies not only to automobile occupants and motorcycle riders, but everyone who shares the road. </div><br>
        <div class="desc-copy removetransform">Having studied past road accidents, the analysis shows that many fatal road accidents (including those which involve pedestrians) are caused by cars straying from their lanes. Thus, we developed Honda SENSING –  a driver-assistive technology which detects and take actions to avoid situations such as one-car accident, collisions, pedestrian injuries and missed road signs for road users. It provides safety, while ensuring a fun drive. </div>
    </div>

        <div class="vtecturborow maxw1200">
            <div class="vtecturbocol">
                <div class="img-sec centerdiv w579">
                    <img src="{{url('img/technology/02_sensing/01_GIF/HondaSensing_01.gif')}}" alt="">
                </div>
            </div>
            <div class="vtecturbocol">
                <div class="img-sec centerdiv w579">
                    <img src="{{url('img/technology/02_sensing/01_GIF/HondaSensing_02.gif')}}" alt="">
                </div>
            </div>
        </div>

</section>
<div class="space"></div>

<section class="grey">
    <div class="space"></div>
    <h2>LEARN HOW Honda SENSING <BR>ASSIST YOU ON THE ROAD</h2>
    <div class="sensingbtn-row">
        <a href="{{url('technology/honda-sensing/rdm')}}">
            <div class="sensingbtn">
                <div class="desc-copy btnheight">Road Departure Mitigation (RDM)</div>
                <div class="cta">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </div>
        </a>
        <a href="{{url('technology/honda-sensing/cmbs')}}">
            <div class="sensingbtn">
                <div class="desc-copy btnheight">Collision Mitigation Braking System (CMBS)</div>
                <div class="cta">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </div>
        </a>
        <a href="{{url('technology/honda-sensing/acc')}}">
            <div class="sensingbtn">
                <div class="desc-copy btnheight">Adaptive Cruise Control (ACC) With Low-speed Follow</div>
                <div class="cta">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </div>
        </a>
        <a href="{{url('technology/honda-sensing/lkas')}}">
            <div class="sensingbtn">
                <div class="desc-copy btnheight">Lane Keep Assist System (LKAS)</div>
                <div class="cta">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </div>
        </a>
    </div>

    <div class="space"></div>

    <h2>OTHER ADVANCED SAFETY FEATURES</h2>
    <div class="sensingbtn-row">
        <a href="{{url('technology/honda-sensing/multi-view-camera')}}">
            <div class="sensingbtn">
                <div class="desc-copy btnheight">Multi-view Camera System</div>
                <div class="cta">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </div>
        </a>
        <a href="{{url('technology/honda-sensing/wide-angle-rearview')}}">
            <div class="sensingbtn">
                <div class="desc-copy btnheight">Wide-angle Rearview Camera System</div>
                <div class="cta">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </div>
        </a>
        <a href="{{url('technology/honda-sensing/parking-sensor')}}">
            <div class="sensingbtn">
                <div class="desc-copy btnheight">Parking Sensor System</div>
                <div class="cta">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </div>
        </a>
        <a href="{{url('technology/honda-sensing/backing-out-support')}}">
            <div class="sensingbtn">
                <div class="desc-copy btnheight">Backing Out Support</div>
                <div class="cta">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </div>
        </a>
    </div>

    <div class="space"></div>
</section>

<section class="model-selection section-gap">
    <h2>EXPLORE ALL MODELS with Honda SENSING</h2>
    {{-- @include('brand.sensing-model-carousel') --}}
    @php
        $model_carousel_only_show = ['city', 'accord', 'civic','crv', 'odyssey'];
    @endphp
    @include('components.model-carousel')
</section>
<script>
$('.owl-carousel').on('initialized.owl.carousel', function () {
    const stage = $(this).find('.owl-stage');
    const containerWidth = $(this).width();
    const stageWidth = stage.width();
    const offset = (containerWidth - stageWidth) / 2;
    stage.css('transform', `translate3d(${offset}px, 0, 0)`);
});
</script>


@stop


