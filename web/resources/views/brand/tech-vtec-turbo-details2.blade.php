
@extends('layouts.base')

@section('page-title')
Honda VTEC Turbo
@endsection

@section('content')

<style>
    .tech-banner {background: url(../img/technology/00_landing/banner2.png)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
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
    .w87perc {width:87%;}

    .vtecturbocol {float: left;width: 50%;}
    .vtecturborow:after {content: "";display: table;clear: both;}

    @media only screen and (max-width: 768px) {
        .tech-banner {background: url(../img/technology/00_landing/banner2.png)no-repeat left;background-size: cover;height: 170px;}
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
        .vtecturbocol {width: 100%;}
    }
</style>

<section>
    <div style="height: 50px;background: #ececec;margin-bottom: -15px;">
        <a href="{{url('technology/honda-vtec-turbo')}}" class="">
            <div style="padding: 15px 30px;font-size: 12px;">
                <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link">
                <span class="backtocopy" style="color: #565656;padding: 0 5px;width:unset;bottom:3px;">BACK TO Honda VTEC TURBO</span>
            </div>
        </a>
    </div>

    <!-- description -->
    <div class="desc-fold maxwidth783">
        <h2>2.0 VTEC TURBO</h2>
        <div class="desc-copy">In contrast with the 1.5L VTEC Turbo which is fuel efficient and fun, the 2.0L VTEC TURBO focuses instead on power. It inherits the basic design of the 1.5L version and is equipped with a variable lift mechanism with enhanced cooling performance, realising <span style="white-space:nowrap;">higher output.</span></div>
        <div class="img-sec img-sec-fullwidth centerdiv">
            <img src="{{url('img/technology/01_turbo/03_Image/09_Turbo.jpg')}}" alt="">
            <div class="desc-copy">2.0L VTEC TURBO</div>
        </div>

        <div class="desc-copy">The integration results in an engine with the fuel economy of a 2.0L straight 4-cylinder engine, and 320PS power, equivalent to a large 6-cylinder engine. Fitted on the <span style="white-space:nowrap;">Civic Type R</span>, it takes full advantage of the high performance and light weight of this engine, setting a new front-wheel drive lap record* of 7 minutes 43.80 seconds** at the Nürburgring Nordschleife***. The 2.0L VTEC TURBO engine is considerate of environmental performance demanded in these times yet pursues an even more enjoyable <span style="white-space:nowrap;">driving experience.</span> </div>
    </div>

        <div class="vtecturborow maxw1200">
            <div class="vtecturbocol">
                <div class="img-sec centerdiv w579">
                    <img src="{{url('img/technology/01_turbo/03_Image/10_IMG_5.jpg')}}" alt="">
                    <div class="desc-copy">Variable lift mechanism</div>
                </div>
            </div>
            <div class="vtecturbocol">
                <div class="img-sec centerdiv w579">
                    <img src="{{url('img/technology/01_turbo/01_Gif/HondaTech_Turbo2_Cooling_01.gif')}}" alt="">
                    <div class="desc-copy">Enhanced cooling performance through measures such as cooling channel-equipped pistons</div>
                </div>
            </div>
        </div>

        <div class="img-sec centerdiv w87perc maxw1200">
            <img src="{{url('img/technology/01_turbo/03_Image/11.jpg')}}" alt="">
            <div class="desc-copy">Civic Type R sets fastest front-wheel drive lap at the Nürburgring*** <br>(Honda research as of April 2017)</div>
        </div>

</section>


<section class="model-selection section-gap">
    <h2>EXPLORE ALL MODELS with Honda VTEC TURBO</h2>
    @include('brand.turbo-model-carousel')
</section>
<section>
    <div class="" style="padding-bottom: 30px;background: #e9e9e9;">
        <div class="stage-contained">
            <div class="note-container" style="margin: 0px 20px 0px 20px;">
                <div class="note-title more long">DISCLAIMERS</div>
                <div class=" expand-content" style="display: none;">
                    <ul class="note">
                        <li>* 1 Honda research as of April 2017</li>
                        <li>** Honda measurement </li>
                        <li>*** Record of 2017</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style>
        .note-container .more.long:after {left:unset;}
    </style>
</section>



@stop


