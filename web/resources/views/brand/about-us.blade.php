
@extends('layouts.base')

@section('page-title')
About Us
@endsection
@section('content')

<style>
    .about-banner {background: url(../img/about/aboutus/banner-about-us2.jpg)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
    .text-container {top: 50%;transform: translate(0, -50%);text-align: center;}
    .text-container .header {font-size: 2.25rem;font-weight: 400;line-height: 54px;letter-spacing: 7.2px;text-shadow: 0px 2px 24px rgba(0,0,0,0.5);margin-top: 15px;max-width: 1200px;margin-left: auto;margin-right: auto;}

    .content-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;}
    .content-container {max-width: 821px; padding: 90px 20px 0 20px; margin: auto;}

    .embed-youtube {
    position: relative;
    padding-bottom: 56.25%; /* - 16:9 aspect ratio (most common) */
    /* padding-bottom: 62.5%; - 16:10 aspect ratio */
    /* padding-bottom: 75%; - 4:3 aspect ratio */
    padding-top: 30px;
    height: 0;
    overflow: hidden;}

    .embed-youtube iframe,
    .embed-youtube object,
    .embed-youtube embed { border: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%;}

    @media only screen and (max-width: 768px) {
        .about-banner {background: url(../img/about/aboutus/banner-about-us2.jpg)no-repeat left;background-size: cover;height: 170px;}
        .text-container .header {font-size: 1.25rem;letter-spacing: 1.2px;}
        .content-container {padding: 50px 20px 0 20px;}
    }

</style>

<section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                </label>
                </div>
                <ul>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('about-us')}}">About Us</a></li>
                    <li><a href="{{url('about-us/founder')}}">Our Founder</a></li>
                    <li><a href="{{url('about-us/manufacturing')}}">Manufacturing</a></li>
                    <li><a href="{{url('about-us/achievements')}}">Achievements</a></li>
                    <li><a href="{{url('discover/dealer-awards')}}">Honda Dealer Awards</a></li>
                </ul>
        </div>
        <div class="clearfix"></div>

<style>
/* overwrite */
    .service-tab-menu {background: #fff; margin-bottom: -15px;}
    .service-tab-menu ul li a {color: #000;}

    @media only screen and (max-width: 640px) {
        .service-tab-menu {display: none;}
    }
</style>
</section>

<section>
    <!-- banner -->
    <div class="about-banner">
        <div class="text-container">
            <div class="header">ABOUT US</div>
        </div>
    </div>

    <!-- main fold -->
    <div style="margin-bottom: 50px;">
        <div class="content-container">
            <h2>DISCOVER OUR BRAND VISION, HERITAGE AND WHAT PROPELS THE POWER OF DREAMS.</h2>
            <div class="content-copy">
                In our continued quest in the advancement of mobility to steer the improvement of everyone’s daily lives, we will focus our efforts in three key areas – mobility, robotics and AI. We also embrace the M.M. philosophy (man maximum and machine minimum, or maximum space for occupants, minimal space for machines) whereby the most efficient system is utilised for the performance of the driver whilst securing as much space. Driven by dreams at the core, we imagine ourselves expanding life’s potentials for the betterment of all.<br><br>
                <div class="embed-youtube" style="display: none;"><iframe width="560" height="315" src="https://www.youtube.com/embed/vtNIpM-NDBM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
            </div>
        </div>
    </div>


</section>

<!-- more from honda -->
<section style="background-color: #f5f5f5">
    <style>
        .container {width: 100%;max-width: 1200px;margin: auto;padding: 70px 10px;position: relative;}
        .more-maintitle {padding-bottom: 30px;font-size: 1.500rem;font-weight: 500;color: #282A2F;letter-spacing: 1px;}
        .container ul a li {display: inline-block; width: 30.5%; margin-right: 2.3%; vertical-align: text-top;}
        .p-item img {width: 100%;max-width: 368px;}

        @media only screen and (max-width: 768px) {
            .container ul a li {width: 100%;margin-top: 30px;}
        }
    </style>

    <div class="container">
        <div class="more-maintitle">MORE FROM Honda</div>
        <ul class="for-desktop-usp">
            {{-- <a href="{{url('about-us/achievements')}}">
                <li>
                    <div class="p-item">
                        <img src="{{url('img/about/more/achievement.png')}}" alt="" />
                    </div>
                    <div class="cta">Achievements<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </li>
            </a>

            <a href="{{url('about-us')}}">
                <li>
                    <div class="p-item">
                        <img src="{{url('img/about/more/aboutus.png')}}" alt="" />
                    </div>
                    <div class="cta">About Us<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </li>
            <a> --}}

            <a href="{{url('about-us/founder')}}">
                <li>
                    <div class="p-item">
                        <img src="{{url('img/about/more/founder.png')}}" alt="" />
                    </div>
                    <div class="cta">Our Founder<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </li>
            <a>

            <a href="{{url('about-us/manufacturing')}}">
                <li>
                    <div class="p-item">
                        <img src="{{url('img/about/more/manufacturing2.jpg')}}" alt="" />
                    </div>
                    <div class="cta">Manufacturing<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </li>
            </a>

            <a href="{{url('about-us/achievements')}}">
                <li>
                    <div class="p-item">
                        <img src="{{url('img/about/more/achievement.png')}}" alt="" />
                    </div>
                    <div class="cta">Achievements<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </li>
            </a>
        </ul>


         {{-- <ul class="for-mobile-usp owl-carousel owl-theme">
            <li>
                <div class="p-item">
                    <img src="{{url('img/about/more/achievement.png')}}" alt="" />
                </div>
                <div class="cta">Achievements<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </li>
            <li>
                <div class="p-item">
                    <img src="{{url('img/about/more/founder.png')}}" alt="" />
                </div>
                <div class="cta">Our Founder<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </li>
            <li>
                <div class="p-item">
                    <img src="{{url('img/about/more/aboutus.png')}}" alt="" />
                </div>
                <div class="cta">About Us<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
            </li>
        </ul>  --}}
    </div>
    <div class="clearfix"></div>
</section>



@stop


