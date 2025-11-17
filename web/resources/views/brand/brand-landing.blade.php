
@extends('layouts.base')

@section('page-title')
Our Brand
@endsection

@section('content')

<style>
    .wrapper {max-width: 1270px;margin: auto;padding-top: 50px;}
    .about-banner {background: url(../img/about/landing/update/brandlanding_about.png)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
    .text-container {top: 50%;transform: translate(0, -50%);text-align: center; color: #fff;}
    .text-container .brandheader {font-size: 24px;font-weight: 400;line-height: 54px;letter-spacing: 3px;text-shadow: 0px 2px 24px rgba(0,0,0,0.5);margin-top: 15px;max-width: 1200px;margin-left: auto;margin-right: auto;}
    .text-container .brandcat {font-size: 14px; font-weight: 400; line-height: 22px; letter-spacing: 1px;display:block;}
    .cta {display:none; color:#fff;}

    .maxw290{max-width: 290px;margin: auto;}

    /* .about-banner:hover {opacity: 0.9;} */
    .about-banner:hover .red-arrow {opacity: 1;}

    .box {display: inline-block; width:46.3%; height: 370px; vertical-align:top;padding: 65px;margin: 20px;transition: .5s ease;position: relative;}
    /* .box:hover {opacity: 0.9;} */
    .box1 {background: url(../img/about/landing/update/brandlanding_founder.png)no-repeat top center;background-size: cover;}
    .box2 {background: url(../img/about/landing/update/brandlanding_tech.png)no-repeat top center;background-size: cover;}
    .box3 {background: url(../img/about/landing/update/brandlanding_press.png)no-repeat top center;background-size: cover;}
    .box4 {background: url(../img/about/landing/update/HONDA_CEO_2025_thumbnail.jpg)no-repeat top center;background-size: cover;}
    /* .box4 {background: url(../img/about/landing/update/award-dealer-thumbail-2024.png)no-repeat top center;background-size: cover;} */
    /* .box4 {background: url(../img/about/landing/update/brandlanding_award.png)no-repeat top center;background-size: cover;} */
    .box5 {background: url(../img/about/landing/update/HondaBrand_WD.jpg)no-repeat top center;background-size: cover; width: 96%;}
    .red-arrow {float: none; opacity: 0;}

    .about-banner:hover .overlayhovereffect {width:100%;height:100%;position:absolute;background-color:#000;opacity:0.5;}
    .box:hover .overlayhovereffect {width:100%;height:100%;position:absolute;background-color:#000;opacity:0.5;margin: -65px;}
    .box:hover .red-arrow {opacity: 1;}

    @media only screen and (max-width: 1030px) {

        .box {width: 96%;height: 216px;padding:5px;}
        .box5 {width: 96%;}
        .box5 {background: url(../img/about/landing/update/HondaBrand_WD.jpg)no-repeat top center;background-size: cover;}

        .box:hover .overlayhovereffect {display: none;}
        .about-banner:hover .overlayhovereffect {display: none;}
    }

    @media only screen and (max-width: 768px) {
        .about-banner {background: url(../img/about/landing/update/brandlanding_about_m.png)no-repeat left;height: 216px;}
        .text-container .brandheader {font-size: 1.25rem;letter-spacing: 1.2px;}
        .text-container .brandcat {display:none;}
        .cta {display:block;}

        .box {width: 89%;height: 216px;padding:5px;}
        .box5 {width: 89%;}
        .box5 {background: url(../img/about/landing/update/brandlanding_withdream_m.png)no-repeat top center;background-size: cover;}

        .box:hover {opacity: none;}
        .box:hover .red-arrow {opacity: 0;}
        .about-banner:hover {opacity: none;}
        .about-banner:hover .red-arrow {opacity: 0;}
        .box:hover .overlayhovereffect {display: none;}
        .about-banner:hover .overlayhovereffect {display: none;}

    }
</style>

<section>
    <!-- banner -->
    <a href="{{url('about-us')}}">
        <div class="about-banner">
            <div class="overlayhovereffect"></div>
            <div class="text-container">
                <div class="brandheader">ABOUT US</div>
                <div class="brandcat">Discover our brand vision, heritage and what propels the Power of Dreams.</div>
                <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                <div class="red-arrow"></div>
            </div>
        </div>
    </a>

    <!-- boxes -->
    <div class="wrapper">

        <a href="{{url('about-us/founder')}}">
            <div class="box box1">
                <div class="overlayhovereffect"></div>
                <div class="text-container">
                    <div class="brandheader">OUR FOUNDER</div>
                    <div class="brandcat maxw290">Our founding father Soichiro Honda and the inception of Honda.</div>
                    <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                    <div class="red-arrow"></div>
                </div>
            </div>
        </a>

        <a href="{{url('technology/advanced-technology')}}">
            <div class="box box2">
                <div class="overlayhovereffect"></div>
                <div class="text-container">
                    <div class="brandheader">OUR TECHNOLOGY</div>
                    <div class="brandcat maxw290">A look at the current, and past cutting-edge Honda technology.</div>
                    <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                    <div class="red-arrow"></div>
                </div>
            </div>
        </a>

        <a href="{{url('press-release')}}">
            <div class="box box3">
                <div class="overlayhovereffect"></div>
                <div class="text-container">
                    <div class="brandheader">PRESS RELEASE</div>
                    <div class="brandcat maxw290">News coverage of Honda throughout the years.</div>
                    <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                    <div class="red-arrow"></div>
                </div>
            </div>
        </a>

        <a href="{{url('discover/dealer-awards')}}">
            <div class="box box4">
                <div class="overlayhovereffect"></div>
                <div class="text-container">
                    <div class="brandheader">DEALER AWARDS</div>
                    <div class="brandcat maxw290">Honda dealers recognised for their outstanding performance.</div>
                    <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                    <div class="red-arrow"></div>
                </div>
            </div>
        </a>

    </div>

</section>

<section class="model-selection section-gap">
        <h2>EXPLORE ALL MODELS</h2>
        @include('components.model-carousel')
</section>


@stop


