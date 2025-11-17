
@extends('layouts.base')

@section('page-title')
Honda V-TEC Turbo
@endsection


@section('content')

<style>
    .tech-banner {background: url(../img/technology/01_turbo/03_Image/editted/HEROBANNER-Turbo.jpg)no-repeat top center;background-size: cover;height: 420px;color: #fff;}
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
    .h100 {height: 120px;}

    .vtecturbocol {float: left;width: 50%;padding: 45px;}
    .vtecturborow:after {content: "";display: table;clear: both;}

    @media only screen and (max-width: 768px) {
        .tech-banner {background: url(../img/technology/01_turbo/03_Image/editted/HEROBANNER-Turbo.jpg)no-repeat center;background-size: cover;height: 170px;}
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
        .h100 {height: unset;}
    }
</style>

<section id="second-menu">
    @include('brand.tech-menu')
</section>

<section>
    <!-- banner -->
    <div class="tech-banner">
        <div class="text-container">
            <div class="header">Honda VTEC TURBO</div>
        </div>
    </div>

    <div class="vtecturborow maxw1200">
        <div class="vtecturbocol">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/01_turbo/03_Image/01_VTEC_TURBO.jpg')}}" alt="">
            </div>
            <h2>1.5L VTEC TURBO</h2>
            <div class="desc-copy h100">The 1.5L VTEC TURBO engine combines its turbo charger with a direct injection system and variable valve timing mechanism, retaining all the fuel economy benefits of a small engine.</div>
            <a href="{{url('technology/honda-vtec-turbo/1.5')}}"><div class="cta">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
        </div>
        <div class="vtecturbocol">
            <div class="img-sec img-sec-fullwidth centerdiv">
                <img src="{{url('img/technology/01_turbo/03_Image/02_VTEC_TURBO.jpg')}}" alt="">
            </div>
            <h2>2.0L VTEC TURBO</h2>
            <div class="desc-copy h100">In contrast with the 1.5L VTEC TURBO engine which is fuel efficient and fun, the 2.0L VTEC TURBO engine focuses instead on power.</div>
            <a href="{{url('technology/honda-vtec-turbo/2.0')}}"><div class="cta">LEARN MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div></a>
        </div>
    </div>

</section>

<section class="model-selection section-gap">
    <h2>EXPLORE ALL MODELS with Honda VTEC TURBO</h2>
    {{-- @include('brand.turbo-model-carousel') --}}
    @php
        $model_carousel_only_show = ['accord','civic','crv','type-r'];
    @endphp
    @include('components.model-carousel')
</section>





@stop

