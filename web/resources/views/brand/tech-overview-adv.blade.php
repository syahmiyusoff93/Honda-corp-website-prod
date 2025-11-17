
@extends('layouts.base')

@section('page-title')
Honda Advanced Technology
@endsection


@section('content')

    <style>
        .tech-banner {background: url(../img/technology/00_landing/banner1.png)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
        .text-container {top: 50%;transform: translate(0, -50%);text-align: center;}
        .text-container .header {font-size: 2.25rem;font-weight: 400;line-height: 54px;letter-spacing: 7.2px;text-shadow: 0px 2px 24px rgba(0,0,0,0.5);margin-top: 15px;max-width: 1200px;margin-left: auto;margin-right: auto;}

        .desc-fold {padding: 70px 20px;}
        .desc-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;max-width: 700px;margin: auto;}

        .content-copy {text-align: center;font-size: 1rem;color: #5e6063;letter-spacing: 0.25px;line-height: 1.75rem;font-weight: 400;}


        .container {width: 100%;max-width: 1200px;margin: auto;padding: 70px 10px;position: relative;}
        .img-sec.float-right {text-align: right; overflow: hidden;}
        .img-sec.float-left {overflow: hidden;}
        .img-sec {width: calc(50% - 25px);}


        .img-sec img:hover {transform: scale(1.1);}

        .img-sec img {transition: all 1s;display: block;width: 100%;height: auto;transform: scale(1);image-rendering: auto;}
        .content-sec {width: 50%;margin-right: 25px;position: absolute;top: 50%;position: absolute;transform: translate(0, -50%);-webkit-transform: translate(0, -50%);height: 100%;}

        .float-right {float: right;}
        .float-left {float: left;}

        .content-sec.float-left {padding-left: calc(2.5% + 25px);position: absolute;left: 50%;}

        .detail-content {top: 50%;position: absolute;transform: translate(0, -50%);-webkit-transform: translate(0, -50%);}
        .rightpadding {padding-right:90px;}

        @media only screen and (max-width: 768px) {
            .tech-banner {background: url(../img/technology/00_landing/banner1-mobile.jpg)no-repeat center;background-size: cover;height: 170px;}
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
        <!-- banner -->
        <div class="tech-banner">
            <div class="text-container">
                <div class="header">Honda ADVANCED TECHNOLOGY</div>
            </div>
        </div>

        <div class="">
            <a href="https://global.honda/en/Googlebuilt-in/malaysia/">
                <div class="container">
                    <div class="img-sec float-left">
                        <img src="{{url('img/technology/06_gas/GAS-manual-03.jpeg')}}" alt="">
                        {{-- <img src="{{url('img/technology/06_gas/GAS-manual-01.png')}}" alt=""> --}}
                    </div>
                    <div class="content-sec float-left">
                        <div class="detail-content">
                            <h2 style="text-align: left;">Honda Google Automotive Services</h2>
                            <div class="content-copy rightpadding" style="text-align: left;">
                                Honda's new connectivity system comes with Google built-in. features integrated Googles Assistant, Google Maps, and more on Google Play at your fingertips. So, you can always stay connected creating a more joyful and seamless driving experience.
                            </div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>

        <!-- left right content 1 connect-->
       
        <div class="">
            <a href="{{url('technology/honda-connect')}}">
                <div class="container">
                        <div class="img-sec float-right">
                            <img src="{{url('img/technology/05_connect/connect-thumbnail.jpg')}}" alt="">
                        </div>
                        <div class="content-sec float-right">
                            <div class="detail-content">
                                <h2 style="text-align: left;">Honda CONNECT</h2>
                                <div class="content-copy rightpadding" style="text-align: left;">Control your car remotely, check on its status from your phone, and allow it to get help in an emergency on its own with Honda CONNECT: The next step in Honda advanced technology that completely changes your safety, security and convenience on the road.</div>
                                <div class="red-arrow"></div>
                            </div>
                        </div>

                    <div class="clearfix"></div>
                </div>

            </a>
        </div>
        

        <!-- left right content 1 -->
        
        <div class="">
            <a href="{{url('technology/honda-sensing')}}">
                <div class="container">
                        <div class="img-sec float-left">
                            <img src="{{url('img/technology/00_landing/SENSING.jpg')}}" alt="">
                        </div>
                        <div class="content-sec float-left">
                            <div class="detail-content">
                                <h2 style="text-align: left;">Honda SENSING</h2>
                                <div class="content-copy rightpadding" style="text-align: left;">Our dream of a collision-free society, not exclusive to automobile occupants and motorcycle riders, but everyone who shares the road.</div>
                                <div class="red-arrow"></div>
                            </div>
                        </div>

                    <div class="clearfix"></div>
                </div>

            </a>
        </div>

        <!-- left right content 2 -->
        <div class="">
            <a href="{{url('technology/honda-vtec-turbo')}}">
                <div class="container">
                    <div class="img-sec float-right">
                        <img src="{{url('img/technology/00_landing/TURBO.jpg')}}" alt="">
                    </div>
                    <div class="content-sec float-right">
                        <div class="detail-content">
                            <h2 style="text-align: left;">Honda VTEC TURBO</h2>
                            <div class="content-copy" style="text-align: left;">Two exceptional manifestation of the VTEC turbocharge technology – one that balances performance and fuel economy, and the other which focuses on power.</div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>

        <!-- left right content 3 -->
        {{-- <div class="">
            <a href="{{url('technology/honda-sport-hybrid')}}">
                <div class="container">
                    <div class="img-sec float-left">
                        <img src="{{url('img/technology/00_landing/HYBRID.jpg')}}" alt="">
                    </div>
                    <div class="content-sec float-left">
                        <div class="detail-content">
                            <h2 style="text-align: left;">Honda SPORT HYBRID i-DCD</h2>
                            <div class="content-copy rightpadding" style="text-align: left;">The i-DCD system switches seamlessly between electric mode and thrilling sport mode.</div>
                            <div class="red-arrow"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div> --}}


    </section>

@stop


