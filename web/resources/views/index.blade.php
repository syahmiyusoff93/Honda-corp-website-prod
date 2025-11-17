
@extends('layouts.base')

@section('page-meta')

    @php
        $metadata['title'] = 'Honda - The Power Of Dreams';
        $metadata['description'] = 'Welcome to Honda Malaysia. Browse the latest Honda Models, Book Test Drives, Compare Vehicles & More. Logon To Honda Malaysia Today.';
        $metadata['keywords'] = 'honda, honda Malaysia, malaysia automotive, power of dreams, car dealer, car showroom, car model, test drive';
        $metadata['image'] = config('global.webconfig')->share_img_generic;

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
@stop


@section('content')

    <div class="body-wrapper">
    <section class="landing-hero">
        @include('components.site-hero-wdata')
    </section>

    <section class="shopping-tools body-copy grey container section-gap" id="shopping-tools" style="padding-top: 40px; margin-top: -40px;">
        @include('components.shopping-tools')
    </section>

    <section class="model-selection section-gap">
        <h2>EXPLORE ALL MODELS</h2>
        @include('components.model-carousel')
    </section>

    <section class="happenings section-gap grey">
        <h2>HAPPENINGS</h2>
        @include('components.happenings-wdata')
    </section>

    <section class="prime-cta section-gap-last grey">

        @include('components.withdreamlink')
    </section>

    </div>

    <script>
        $(document).ready(function(){
            $(".sub-title:contains('The All-New City Hatchback V-SENSING, Most Complete')").html("The All-New City Hatchback V&#8209;SENSING, Most Complete");
        });

    </script>


    {{-- <script>
        // erase cookie for testing cookie notice - remove once client approved
            eraseCookie('hondamyweb_cnotice');
    </script> --}}

@stop

@section('body-top')
    {{--

        SAI 20200818:
    This is a section to inject script/custom code to the very beginning right after opening of <body>

    --}}

@endsection

<!-- test commit -->
