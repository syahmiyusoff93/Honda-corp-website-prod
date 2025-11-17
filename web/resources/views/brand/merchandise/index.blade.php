@extends('layouts.base')

@section('metadata')

@endsection

@section('content')

    <div class="body-wrapper content-inner">

        <section class="hero-banner">
            <div class="text-container">

                <div class="cat"></div>
                <div class="header">
                    <div class="bunting"><img src="{{url('img/merchandise/TEI-Ribbon.png')}}" alt=""></div>
                    Honda <span class="breakonmobile">OFFICIAL MERCHANDISE</span>
                </div>
            </div>
        </section>

        <section class="mid-yt">
            <h3>COLLECTIONS FOR EVERY LIFESTYLE</h3>
            <p>Designed by values that shape us. Own your uniqueness with Honda merchandise for every occasion.</p>

            <iframe width="560" height="315" src="https://www.youtube.com/embed/8PV32OiDb3Y?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

        </section>

        <section class="browse bg-grey2">
            <h3>BROWSE OUR COLLECTIONS</h3>

            <ul class="catlist">
                @foreach (['corporate','lifestyle','activewear','travel'] as $item)
                    <li style="background:url({{versioned_asset('img/merchandise/btn_'.$item.'.jpg')}}) no-repeat center center; background-size:cover;">
                        <a href="{{url('merchandise/'.$item)}}">

                            <div>{{strtoupper($item)}}<img class="arrow" src="{{versioned_asset('img/interface/arrow-long-right-white.svg')}}" alt=""></div>
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="btn-container">
                <a href="{{url('img/merchandise/Honda_Official_Merchandise.jpg')}}" target="_blank" class="prime-cta-white" style="background: black; color:white;">
                    <span>DOWNLOAD BROCHURE</span>
                    <div class="overlay"></div>
                </a>
            </div>
            <div class="clearfix"></div>
        </section>

        @include('brand.merchandise.module-ctahook')
    </div>

    @include('brand.merchandise.module-style')
    <style>
        .content-inner .hero-banner {background-image:url({{url('img/merchandise/hero_banner_bg.png')}}); }
        .content-inner .hero-banner .text-container .header {color: #282A2F; }
        .content-inner .hero-banner .text-container .header {padding: 0 150px; max-width:880px; max-width:1180px;}
        .hero-banner .bunting { position: absolute; top:-200px;; left:0; max-width: 138px;}
        .bunting img {width:100%;}

        iframe {display: inherit;padding-bottom:25px;}

        .catlist {margin: 25px auto; width: fit-content; text-align: center;}
        .catlist li {width:267px; height:200px; display: inline-block; margin: 15px;}
        .catlist li a {width:100%; height: inherit; color:white; font-size:1.375rem;display: inline-block; background: rgba(0,0,0,.6); text-align: center;}
        .catlist li a:hover {background: rgba(0,0,0,.7); color:#E01327;}
        .catlist li a>div { margin-top:33%;}
        .catlist li .arrow {display: none; margin:auto; margin-top:20px;}

        @media screen and (max-width: 480px) {
            .content-inner .hero-banner .text-container .header {padding: 0 70px; line-height:1.5em; font-size:.9em;}
            .hero-banner .bunting { top:-60px; left:5px; max-width: 60px;}

            .catlist li  { width:calc(100% - 20px); margin:5px 10px;}
            .catlist li .arrow { display: block;}
            .catlist li a>div { margin-top:25%;}

            iframe {width:100%;}
            .breakonmobile {display: block;}
        }

    </style>
@stop
