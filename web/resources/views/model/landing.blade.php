@php
$APIPATH = config('global.APIPATH');
$honda_api_context = config('global.APICONTEXT');

$data = file_get_contents($APIPATH.'model_'.$model_slug.'_variants.json', false, $honda_api_context);
$data = json_decode($data);
$model_info = $data->model;
$variant_info = $data->payload;
// Rearrange variants by weight
if ($variant_info) {
    usort($variant_info, function($a, $b) { return strcmp($a->sequence, $b->sequence); });
}

//api/model/city/page/landing

$data = file_get_contents($APIPATH.'model_'.$model_slug.'_page_landing.json', false, $honda_api_context);
$data = json_decode($data);
$story = $data->payload;


@endphp

@extends('layouts.modelinner')

@section('page-meta')

    @php
        $metadata['title'] = 'Honda '.$model_info->name;
        $metadata['description'] = @$_hero['hero_img'];
        $metadata['keywords'] = $metadata['title'] . 'honda, honda Malaysia, malaysia automotive, power of dreams, car dealer, car showroom, car model, test drive';
        $metadata['image'] = asset(@$_hero['hero_img']);

        if(!empty($metadata['image'])){
            //list($img_width, $img_height, $img_type, $img_attr) = getimagesize($metadata['image']);
        }
    @endphp

    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$metadata['title']}}" />
    <meta property="og:description" content="{{$metadata['description']}}" />
    <meta property="og:image" content="{{$metadata['image']}}" />
    {{-- <meta property="og:image:width" content="{{@$img_width}}" />
    <meta property="og:image:height" content="{{@$img_height}}" /> --}}
    <meta name="description" content="{{$metadata['description']}}"/>
    <meta name="keywords" content="{{$metadata['keywords']}}"/>

    <style>
        #connect-container {
           /* padding-top: 50px;*/
        }
        
        .img-sec.float-left {
           /* text-align: right;*/
            overflow: hidden;
        }

        .float-left {
            float: left;
        }

        .float-left {
            float: right;
        }

        .img-sec {
            width: calc(50% - 25px);
        }

        .img-sec img {
            transition: all 1s;
            display: block;
            width: 100%;
            height: auto;
            transform: scale(1);
            image-rendering: auto;
        }

        .content-sec {
            width: 50%;
            margin-right: 25px;
            height: 100%;
           /* padding-left: calc(2.5% + 50px);*/
           padding-right: 85px;
           position: absolute;
             top: 20%;
        }



    


        .img-sec img:hover {
            transform: scale(1.1);
        }


        @media only screen and (max-width: 768px) {



            #connect-container {
                padding-top: 30px;

            }

            .img-sec {
                width: 100%;
            }

            .content-sec {
                width: 100%;
                position: relative;
                top: unset;
                transform: unset;
                -webkit-transform: unset;
                padding-top: 20px;
                 padding-left: 25px;
                padding-right: 0px;
                position: relative;
                top: 0%;

            }

            .float-right {
                float: none;
            }
        }


        <?php if ( $model_slug == "city-hatchback" ) { ?>
            li.tab-slider-trigger {
             padding: 16px 26px !important;
            }

        <?php  } ?>

    </style>




@stop

@section('page-title')
   Honda {{$model_info->name}}
@stop

@section('inner-content')

    <section class="model-landing-hero city" id="hero-banner">
        @include('components.model-hero')
    </section>

    <section class="performance section-gap">
        <h2>HIGHLIGHTS</h2>
        @include('components.model-usp')
    </section>

    {{-- ALL THE SECTIONS OF FEATURES IS LOCATED INSODE model-stories.blade.php  --}}
        @include('components.model-stories-wdata')

    <section id="gallery" class="section-gap-inner gallery" >
        <h2>GALLERY</h2>
        @include('components.model-gallery-wdata')
    </section>

    <section class="color-container section-gap-inner" id="colour-accessories">
        {{-- <h2>Colours &amp; accessories</h2> --}}
        <h2>ACCESSORIES</h2>
        @include('components.model-color-acc')
    </section>


    <section class="spec-container section-gap-inner" id="spec-price">
        <div class="container">
            @if ($model_slug == "odyssey") 
             <h2 class="spec-price">SPECIFICATIONS</h2>
            @else
            <h2 class="spec-price">SPECIFICATIONS &amp; PRICING</h2>
            @endif

            @include('components.model-pricing-section')
        </div>
    </section>


    <section class="shopping-tools body-copy grey container section-gap" id="shopping-tools" style="padding-top: 40px; margin-top: -40px;">
        @include('components.shopping-tools')
        <div class="clearfix"></div>
    </section>

    <section class="happenings section-gap">
    <h2>HAPPENINGS</h2>
        @include('components.happenings-wdata')
    </section>


    <section class="model-selection section-gap">
        <h2>EXPLORE ALL MODELS</h2>
        @include('components.model-carousel')
    </section>


    <section class="prime-cta section-gap-last grey ">
        @include('components.withdreamlink')
    </section>

    <script>
     $("document").ready(function(){

        console.log("v1.0c");
        var mslug = "{{$model_slug}}";
        if ( mslug  == "crv") {

            /* $( ".tab-slider-tabs > li:nth-child(4)").insertBefore(".tab-slider-tabs > li:nth-child(3)"); */
            /* $( ".tab-slider-tabs > li:nth-child(4)").css('display', 'none'); */
            
        }
        else if ( mslug  == "city") {

          //  $( ".tab-slider-tabs > li:nth-child(5)").insertBefore(".tab-slider-tabs > li:nth-child(4)");
            
        }


        if ( mslug  == "city-hatchback") {
            $(".tab-slider-tabs > [rel=tab5]").insertBefore(".tab-slider-tabs > [rel=tab4]");
            $("#spec-price > div > div > div.tab-slider-nav.for-desktop > ul > li:nth-child(5)").insertBefore("#spec-price > div > div > div.tab-slider-nav.for-desktop > ul > li:nth-child(4)");
            $("#tab4 > div.price").text("RM 100,900.00");
            $("#tab5 > div.price").text("RM 112,900.00");
        }

      });
    </script>
    




@stop

