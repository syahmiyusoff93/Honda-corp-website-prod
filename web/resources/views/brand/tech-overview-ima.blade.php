
@extends('layouts.base')

@section('page-title')
Honda IMA
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
    }
</style>

<section>
    <!-- banner -->
    <div class="tech-banner">
        <div class="text-container">
            <div class="header">HALLMARK OF INNOVATIONS</div>
        </div>
    </div>

    <!-- description -->
    <div class="desc-fold">
        <div class="desc-copy">Honda R&amp;D is the powerhouse that keeps Honda at the forefront of innovation - differentiating the brand from the rest. The ability to pursue our efforts in the advancement of technology whilst remaining grounded to our values is where our pride and value lies. </div>
    </div>

    <!-- left right content 1 -->
    <div class="">
        <a href="{{url('technology/honda-ima')}}">
            <div class="container">
                <div class="img-sec float-right">
                    <img src="{{url('img/technology/00_landing/IMA.jpg')}}" alt="">
                </div>
                <div class="content-sec float-right">
                    <div class="detail-content">
                        <h2 style="text-align: left;">Honda IMA</h2>
                        <div class="content-copy rightpadding" style="text-align: left;">IMA system incorporates two power sources, producing a synergised technology to enhance driving performance and environmental protection.</div>
                        <div class="red-arrow"></div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>



</section>





@stop


