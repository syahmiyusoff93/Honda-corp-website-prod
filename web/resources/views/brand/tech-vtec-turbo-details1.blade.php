
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

    .vtecturbocol {float: left;width: 50%;padding: 45px;}
    .vtecturborow:after {content: "";display: table;clear: both;}

    @media only screen and (max-width: 768px) {
        .tech-banner {background: url(../img/technology/00_landing/banner2.png)no-repeat left;background-size: cover;height: 170px;}
        .text-container .header {font-size: 1.25rem;letter-spacing: 1.2px;}


        .container {padding: 35px 20px;}
        .desc-copy {font-size: 0.9rem;}

        .float-right {float: none;}
        .float-left {float: none;}
        .img-sec {width:100%;}
        .content-sec {width: 100%;position:relative;top: unset;transform: unset;-webkit-transform: unset;padding-top: 20px;}
        .detail-content {top: unset;position: unset;transform:unset;-webkit-transform:unset;}
        .rightpadding {padding-right:0px;}

        .content-sec.float-left {padding-left: unset;position: unset;left: unset;}
        .vtecturbocol {width: 100%;padding: 0 20px;}
        .w718 {width:100%;}
        .w579 {width:100%;}
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
        <h2>1.5L VTEC TURBO<br>THE TURBO ENGINE WITH EXCEPTIONAL PERFORMANCE AND FUEL ECONOMY</h2>
        <div class="desc-copy">Traditionally, turbo engines are deemed ‘high power, low fuel economy’ but Honda’s VTEC TURBO is an engine that achieves fuel efficiency without compromising the enjoyment and quality of the ride.</div>
        <div class="img-sec img-sec-fullwidth centerdiv">
            <img src="{{url('img/technology/01_turbo/03_Image/03_Turbo.jpg')}}" alt="">
            <div class="desc-copy">1.5L VTEC TURBO</div>
        </div>

        <div class="desc-copy">The 1.5L VTEC TURBO combines its turbo charger with a direct injection system and variable valve timing mechanism, retaining all the fuel economy benefits of a small engine. As a result, it produces a feel of power that is smooth from low revs to the high end, exceeding the torque of a 2.4L engine. This keeps acceleration exhilarating on any roads – urban driving to highways and even uphill climbs.</div>
        <div class="img-sec img-sec-fullwidth centerdiv">
            <video controls="" autoplay="" name="media" class="w718">
                <source src="{{url('img/technology/01_turbo/02_Videos/15L_VTEC_TURBO_Engine.mp4')}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="space"></div>
        <h2>VTEC TURBO FUEL EFFICIENT UNDER ANY CONDITION</h2>
        <div class="desc-copy">The VTEC TURBO engine is fuel efficient regardless of driving conditions – from city driving with frequent stopping and starting, to highway driving. On city drives, a 2.4L naturally-aspirated engine produces high torque because of its displacement. The engine produces more torque than the 2.4L naturally-aspirated engine, thanks to its turbo. On top of that, it also allows a small, 1.5L engine to perform as well as a 2.4L engine.</div>
        <div class="img-sec img-sec-fullwidth centerdiv">
            <img src="{{url('img/technology/01_turbo/03_Image/04_Diagram.jpg')}}" alt="">
        </div>
    </div>

</section>

<section class="grey">
    <!-- left right content 1 -->
    <div class="">
        <div class="container">
            <div class="img-sec float-right">
                <img src="{{url('img/technology/01_turbo/01_Gif/HondaTech_Turbo1_VitalThree.gif')}}" alt="">
            </div>
            <div class="content-sec float-right">
                <div class="detail-content">
                    <h2 style="text-align: left;">VTEC TURBO’s 3 Vital Technologies</h2>
                    <div class="content-copy rightpadding" style="text-align: left;">Honda’s VTEC TURBO realises high fuel economy and exhilarating power through three vital technologies – Dual VTC for Intake and Exhaust, Direct Injection System and High Tumble Intake Port, and Highly-responsive Turbocharger with Electronic Wastegate.</div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    {{-- THIS PROBABLY A NEW CONTENT TYPE FOR PAGE BUILDER --}}
        <div class="comp-tabbed-content">
            <div class="tab-nav top-line-gap">
                <ul class="body-copy">
                    <li class="thetab animate" data-target="turbovtectab1">Direct Injection System</li>
                    <li class="thetab animate" data-target="turbovtectab2">Dual VTC</li>
                    <li class="thetab animate" data-target="turbovtectab3">Turbocharger</li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="tab-content maxw1200">
                <div id="turbovtectab1" class="tab-body">
                    <div class="space"></div>
                    <h2>1. Direct injection system and high tumble intake port</h2>
                    <div class="desc-copy">The VTEC TURBO uses direct injection technology to inject fuel directly into the cylinders, lowering the temperature within the cylinders by the gasoline’s vaporisation heat. Thanks to the cooling effect of direct injection and rapid combustion by high tumble flow, fuel is quickly and efficiently burned. </div>
                    <div class="vtecturborow">
                        <div class="vtecturbocol">
                            <div class="img-sec centerdiv w579">
                                <img src="{{url('img/technology/01_turbo/03_Image/editted/01.jpg')}}" alt="">
                                <div class="desc-copy">Overview of Direct Injection System</div>
                            </div>
                        </div>
                        <div class="vtecturbocol">
                            <div class="img-sec centerdiv w579">
                                <video controls="" autoplay="" name="media" class="w579">
                                    <source src="{{url('img/technology/01_turbo/02_Videos/Direct+Injection+System+and+High+Tumble+Intake+Port.mp4')}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="desc-copy">How it works</div>
                            </div>
                        </div>
                    </div>

                    <h2>Within the combustion chamber</h2>
                    <div class="vtecturborow">
                        <div class="vtecturbocol">
                            <div class="img-sec centerdiv w579">
                                <img src="{{url('img/technology/01_turbo/01_Gif/HondaTech_Turbo1_Injection_01.gif')}}" alt="">
                                <div class="desc-copy">Fuel injection - Burning behaviour</div>
                            </div>
                        </div>
                        <div class="vtecturbocol">
                            <div class="img-sec centerdiv w579">
                                <img src="{{url('img/technology/01_turbo/01_Gif/HondaTech_Turbo1_Injection_02.gif')}}" alt="">
                                <div class="desc-copy">Fuel injection behaviour</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="turbovtectab2" class="tab-body">
                    <div class="space"></div>
                    <h2>2. Dual VTC for intake and exhaust</h2>
                    <div class="desc-copy">With VTEC TURBO, Valve Timing Control (VTC) changes the timing for intake and exhaust valves to operate, controlling the amount of time both types of valves are simultaneously open – this allows efficient supercharging even at low engine revs. </div>
                    <div class="vtecturborow">
                        <div class="vtecturbocol">
                            <div class="img-sec centerdiv w579">
                                <img src="{{url('img/technology/01_turbo/03_Image/editted/02.jpg')}}" alt="">
                            </div>
                            <div class="desc-copy">Overview of Dual VTC</div>
                        </div>
                        <div class="vtecturbocol">
                            <div class="img-sec centerdiv w579">
                                <video controls="" autoplay="" name="media" class="w579">
                                    <source src="{{url('img/technology/01_turbo/02_Videos/Dual+VTC+for+Intake+and+Exhaust.mp4')}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="desc-copy">How it works</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="turbovtectab3" class="tab-body">
                    <div class="space"></div>
                    <h2>3. Turbocharger with electronic wastegate</h2>
                    <div class="desc-copy">‘Turbo lags’ are a typical outcome of conventional turbo engines. Accelerations tend to lag upon accelerating, as exhaust energy must rise to spin the turbines which then increase intake amount. This problem is rectified with the VTEC TURBO – using a turbocharger with electronic wastegates equipped with small-diametre turbines that spin efficiently on small exhaust energy. As a result, the turbo engine is sharp and rapidly responds to how the accelerator pedal is depressed. </div>
                    <div class="vtecturborow">
                        <div class="vtecturbocol">
                            <div class="img-sec centerdiv w579">
                                <img src="{{url('img/technology/01_turbo/03_Image/editted/03.jpg')}}" alt="">
                            </div>
                            <div class="desc-copy">Overview of Turbocharger</div>
                        </div>
                        <div class="vtecturbocol">
                            <div class="img-sec centerdiv w579">
                                <img src="{{url('img/technology/01_turbo/03_Image/editted/04.jpg')}}" alt="">
                            </div>
                            <div class="desc-copy">Overview of Turbocharger</div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                 @media only screen and (max-width: 480px) {
                .spec-container .tab-slider-trigger, .comp-tabbed-content .thetab {padding: 16px 7px; font-size: 10px;}
                .tab-content {padding: 0 20px;}
                 }
            </style>
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

</section>

<section class="model-selection section-gap">
    <h2>EXPLORE ALL MODELS with Honda VTEC TURBO</h2>
    @include('brand.turbo-model-carousel')
</section>



@stop


