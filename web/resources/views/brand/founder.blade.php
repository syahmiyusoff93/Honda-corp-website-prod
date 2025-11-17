
@extends('layouts.base')

@section('page-title')
Our Founder
@endsection

@section('content')

<style>
    .about-banner {background: url(../img/about/founder/banner-our-founder2.jpg)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
    .text-container {top: 50%;transform: translate(0, -50%);text-align: center;}
    .text-container .header {font-size: 2.25rem;font-weight: 400;line-height: 54px;letter-spacing: 7.2px;text-shadow: 0px 2px 24px rgba(0,0,0,0.5);margin-top: 15px;max-width: 1200px;margin-left: auto;margin-right: auto;}

    .desc-fold {padding: 70px 20px;}
    .desc-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;max-width: 700px;margin: auto;}
    .redcopy {color: #e01327;font-size: 1.5rem;padding-top: 15px;line-height: 1.95rem;font-weight: 500;}

    .container {width: 100%;max-width: 1200px;margin: auto;padding: 70px 10px;position: relative;}
    .img-sec.float-right {text-align: right; overflow: hidden;}
    .img-sec {width: calc(50% - 25px);}

    .img-sec img {transition: all 1s;display: block;width: 100%;height: auto;transform: scale(1);image-rendering: auto;}
    .content-sec {width: 50%;margin-right: 25px;position: absolute;top: 50%;position: absolute;transform: translate(0, -50%);-webkit-transform: translate(0, -50%);height: 100%;}
    .content-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;}

    .float-right {float: right;}
    .float-left {float: left;}

    .content-sec.float-left {padding-left: calc(2.5% + 25px);position: absolute;left: 50%;}

    .detail-content {top: 50%;position: absolute;transform: translate(0, -50%);-webkit-transform: translate(0, -50%);}
    .rightpadding {padding-right:90px;}

    /* overwrite */

    .container-founder {padding-top: 0px;}
    .container-founder2 {padding-top: 100px;}
    .content-sec-founder {top:43%;}
    .grey-container-founder {background-color: #f5f5f5;margin-top: -100px;z-index: -1;}

    @media only screen and (max-width: 768px) {
        .about-banner {background: url(../img/about/founder/banner-our-founder2.jpg)no-repeat center;background-size: cover;height: 170px;}
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

        /* overwrite */

        .container-founder {padding-top: 35px;}
        .container-founder2 {padding-top: 35px;}
        .content-sec-founder {top:unset;}
        .grey-container-founder {margin-top: unset;z-index: unset;}
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
                    <li style="border-bottom: 3px solid #e32119;"><a href="{{url('about-us/founder')}}">Our Founder</a></li>
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
            <div class="header">OUR FOUNDER</div>
        </div>
    </div>

    <!-- description -->
    <div class="desc-fold" style="background-color: #f5f5f5;">
        <div class="desc-copy">MEET MR. SOICHIRO HONDA</div>
        <div class="desc-copy"><span class="redcopy">THE FOUNDER OF Honda,<br>ONE OF THE WORLD'S MIGHTIEST MOTOR CORPORATIONS.</span></div>
    </div>

    <!-- main fold -->
    <!-- <div class="full-content">
        <div class="full-content-container">
            <h2>THE ASSEMBLY OF DREAMS</h2>
            <div class="content-copy">Operating for over 15 years, Honda has two production lines at this plant situated at Pegoh Industrial Park, Melaka. The first plant started its operations in 2003. To grow Honda Malaysia at an accelerated rate, the second production line was open in 2014, doubling the production capacity of 50,000 units to 100,000 units of vehicles annually, and 200 units to 400 units daily. The newer production line also incorporates some new technologies such as automated Smart Welding Machine and state-of-the-art painting facility including Spray Robots and Under Body Coating, which improve the accuracy of the body and quality of the body paint and coating thickness.</div>
        </div>
    </div> -->

    <!-- left right content 1 -->
    <div class="">
        <div class="container container-founder">
            <div class="img-sec float-right">
                <img src="{{url('img/about/founder/earlydays.jpg')}}" alt="">
            </div>
            <div class="content-sec content-sec-founder float-right">
                <div class="detail-content">
                    <h2 style="text-align: left;">THE EARLY DAYS</h2>
                    <div class="content-copy rightpadding" style="text-align: left;">Mr. Soichiro Honda was born in Hamamatsu, in the Shizuoka Prefecture of Japan, in 1906. His father owned a blacksmith’s shop and repaired bicycles as a side-line.<br><br>As a teenager, Soichiro Honda was apprenticed to a car repair shop in Tokyo, but business was slack as there were few cars in the city at that time.<br><br>However, this changed after the devastation of the 1923 earthquake. The Japanese government decided to invest in mechanised mass transit.<br><br>To his luck, Mr. Honda found his services in heavy demand.</div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    <!-- left right content 2 -->
    <div class="grey-container-founder">
        <div class="container container-founder2">
            <div class="img-sec float-left">
                <img src="{{url('img/about/founder/newbeginning.png')}}" alt="">
            </div>
            <div class="content-sec float-left">
                <div class="detail-content">
                    <h2 style="text-align: left;">A NEW BEGINNING</h2>
                    <div class="content-copy" style="text-align: left;">Not one to give up, Mr. Soichiro Honda then studied metallurgy, and started a business producing engine parts.<br><br>After the devastation of World War II, Mr. Honda revived his business by fitting war surplus engines to bicycles. The intuitive and innovative former mechanic focused on designing and manufacturing products which appealed to him, starting with motorcycles. In 1948, the company which was to become a global giant took root as Japan’s post-war economy took its first bold steps towards expansion.</div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    <!-- left right content 3 -->
    <div class="">
        <div class="container">
            <div class="img-sec float-right">
                <img src="{{url('img/about/founder/partnering.png')}}" alt="">
            </div>
            <div class="content-sec float-right">
                <div class="detail-content">
                    <h2 style="text-align: left;">PARTNERING FOR SUCCESS</h2>
                    <div class="content-copy rightpadding" style="text-align: left;">During post war Japan and following his dare to dream ways, Mr. Honda began to seek talents within Japan whom he knew could work with him to achieve his goals. One such talent was Takeo Fujisawa who joined Honda in 1949, and together backed by their combined experience and intuitive prowess, they began to pave a way for the company.<br><br>A practical man with the wings of a dreamer, he instilled in others his fearless pursuit for excellence; where the road to success comes from being fearless - fear not failure, and learn on a constant. He also knew the value of continuous reinvestment in technology. A fast learner Mr. Honda learned to reach goals by going against the norm, by breaking tradition and by seeing with fresh eyes.</div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    <!-- left right content 4 -->
    <div class="">
        <div class="container">
            <div class="img-sec float-left">
                <img src="{{url('img/about/founder/innovation.png')}}" alt="">
            </div>
            <div class="content-sec float-left">
                <div class="detail-content">
                    <h2 style="text-align: left;">SPIRIT OF INNOVATION</h2>
                    <div class="content-copy" style="text-align: left;">Mr. Honda’s unconventional take at both work and play, became the company’s personality. He never followed the standard part of convention. He was the one you would see on the ground, checking R&D progress and helping workers assemble parts of an engine. He was the one expressive in his ideas and ideals, the one asking questions and the one who listens. The company became an extension of himself - adaptable, fluid, unpredictable, spirited.<br><br>The company became a giant in its own right, taking its place in history, and placing Soichiro Honda as a pioneer of advance mobility.</div>
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

            <a href="{{url('discover/dealer-awards')}}">
                <li>
                    <div class="p-item">
                        <img src="{{url('img/about/more/dealerawards.png')}}" alt="" />
                    </div>
                    <div class="cta" style="text-transform:initial !important">Honda DEALERS AWARD<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
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


