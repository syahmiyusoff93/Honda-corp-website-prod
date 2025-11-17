
@extends('layouts.base')

@section('page-title')
Manufacturing
@endsection


@section('content')

<style>
    .about-banner {background: url(../img/about/manufacturing/banner-manufacturing3.jpg)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
    .text-container {top: 50%;transform: translate(0, -50%);text-align: center;}
    .text-container .header {font-size: 2.25rem;font-weight: 400;line-height: 54px;letter-spacing: 7.2px;text-shadow: 0px 2px 24px rgba(0,0,0,0.5);margin-top: 15px;max-width: 1200px;margin-left: auto;margin-right: auto;}

    .desc-fold {padding: 70px 20px;}
    .desc-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;max-width: 700px;margin: auto;}

    .content-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;}
    .full-content {background: url(../img/about/manufacturing/1st-fold.png)no-repeat top center;background-size: cover;height: 800px;}
    .full-content-container {max-width: 821px; padding-top: 90px; margin: auto;}

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

    @media only screen and (max-width: 768px) {
        .about-banner {background: url(../img/about/manufacturing/banner-manufacturing3.jpg)no-repeat center;background-size: cover;height: 170px;}
        .text-container .header {font-size: 1.25rem;letter-spacing: 1.2px;}

        .full-content {background: linear-gradient(#f2faff, #f5fbff8a), url(../img/about/manufacturing/1st-fold.png)no-repeat bottom;background-size: contain;background-color: #f2faff;height: 760px;}
        .full-content-container {padding: 50px 20px 0 20px;}

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

<section class="service-tab-menu">
        <div class="menu-toggle smooth-slide">
            <input type="checkbox" id="service-tab-menu-check">
                <div class="service-tab-menu-btn">
                <label for="service-tab-menu-check">
                    <span></span>
                </label>
                </div>
                <ul>
                    <li><a href="{{url('about-us')}}">About Us</a></li>
                    <li><a href="{{url('about-us/founder')}}">Our Founder</a></li>
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('about-us/manufacturing')}}">Manufacturing</a></li>
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
            <div class="header">MANUFACTURING</div>
        </div>
    </div>

    <!-- description -->
    <div class="desc-fold">
        <h2 style="max-width: 700px;margin: auto;">Honda Malaysia opened its doors in 2003, proudly rolling out its first car, a CR-V. <span style="white-space: nowrap;">It marked</span> the beginning of Honda’s feat to support our dreams of delivering greater value to Malaysians.</h2>
    </div>

    <!-- main fold -->
    <div class="full-content">
        <div class="full-content-container">
            <h2>THE ASSEMBLY OF DREAMS</h2>
            <div class="content-copy" style="color: #28292c;">Operating for over 18 years, Honda has two production lines at this plant situated at Pegoh Industrial Park, Melaka. The first plant started its operations in 2003. To grow Honda Malaysia at an accelerated rate, the second production line was opened in 2014, doubling the production capacity from 50,000 units to 100,000 units of vehicles annually, and from 200 units to 400 units daily.</div>
            <div class="content-copy" style="color: #28292c;"><br>The newer production line also incorporated some new technologies such as an automated Smart Welding Machine and a state-of-the-art painting facility including Spray Robots and Under Body Coating, which improved the accuracy of the body and quality of the body paint and coating thickness.</div>
        </div>
    </div>

    <!-- left right content 1 -->
    <div class="">
        <div class="container">
            <div class="img-sec float-right">
                <img src="{{url('img/about/manufacturing/2nd-fold.png')}}" alt="">
            </div>
            <div class="content-sec float-right">
                <div class="detail-content">
                    <h2></h2>
                    <div class="content-copy rightpadding" style="text-align: left;">The plant spreads over 80 acres of land with a total built-up area of 13 acres. It boasts 3 zones; the main plant which houses the Complete Knock Down Unit (CKD) assembly plant and its auxiliary buildings, and the Complete Built-Up Unit (CBU) pre-delivery operation.<br><br>The Green Factory concept is actively pursued at the Pegoh Plant. High efficiency equipments have been installed and lean processes are adopted to lower power consumption. Numerous green initiatives have been implemented in both the buildings and equipment. </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    <!-- left right content 2 -->
    <div class="">
        <div class="container">
            <div class="img-sec float-left">
                <img src="{{url('img/about/manufacturing/ambitiongrowth2.jpg')}}" alt="">
            </div>
            <div class="content-sec float-left">
                <div class="detail-content">
                    <h2 style="text-align: left;">THE AMBITION OF GROWTH</h2>
                    <div class="content-copy" style="text-align: left;">The expansion of the second plant marks a great feat for the brand’s contribution to the Malaysian economy. Having grown to over 101 authorised dealers and selling over 900,000 units nationwide, Honda continues to deliver everything we do with passion, pride, and satisfaction of our people while achieving greater growth in Malaysia.</div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    <!-- left right content 3 -->
    <div class="">
        <div class="container">
            <div class="img-sec float-right">
                <img src="{{url('img/about/manufacturing/longtermvision2.jpg')}}" alt="">
            </div>
            <div class="content-sec float-right">
                <div class="detail-content">
                    <h2 style="text-align: left;">A LONG TERM VISION</h2>
                    <div class="content-copy rightpadding" style="text-align: left;">Focused on environmental-friendliness, quality, cost competitiveness, self-reliability, and conduciveness, the plant also realises our long-term vision of becoming a major player in the ASEAN region.</div>
                </div>
            </div>

            <div class="clearfix"></div>
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
            <a href="{{url('about-us/achievements')}}">
                <li>
                    <div class="p-item">
                        <img src="{{url('img/about/more/achievement.png')}}" alt="" />
                    </div>
                    <div class="cta">Achievements<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </li>
            </a>

            <a href="{{url('discover/dealer-awards')}}">
                <li>
                    <div class="p-item">
                        <img src="{{url('img/about/more/dealerawards.png')}}" alt="" />
                    </div>
                    <div class="cta" style="text-transform:initial !important">Honda DEALERS AWARD<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </li>
            </a>

            <a href="{{url('about-us')}}">
                <li>
                    <div class="p-item">
                        <img src="{{url('img/about/more/aboutus.png')}}" alt="" />
                    </div>
                    <div class="cta">About Us<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                </li>
            </a>
        </ul>


        <!-- <ul class="for-mobile-usp owl-carousel owl-theme">
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
        </ul> -->
    </div>
    <div class="clearfix"></div>
</section>



@stop


