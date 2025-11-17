
@extends('layouts.base')

@php
    $metadata['title'] = 'Download A Brochure';
    $metadata['description'] = 'Brochure collection of all Honda models currently on sale in Malaysia';
    $metadata['keywords'] = 'honda, honda Malaysia, malaysia automotive, power of dreams, car dealer, car showroom, car model, test drive, hire-purchase loan, calculator, loan calculator';
    $metadata['image'] = '';
@endphp

@section('page-meta')
    <meta property="og:url" content="{{Request::url()}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$metadata['title']}}" />
    <meta property="og:description" content="{{$metadata['description']}}" />
    <meta property="og:image" content="{{$metadata['image']}}" />
    <meta name="description" content="{{$metadata['description']}}"/>
    <meta name="keywords" content="{{$metadata['keywords']}}"/>
@stop

@section('page-title')
    {{$metadata['title']}}
@stop


@section('content')

<div class="body-wrapper">
<section class="download innerpage">
    <div class="inner-container">
        <div class="intro extrapadding">
            <h2>DOWNLOAD A BROCHURE</h2>
        </div>

        <div class="car-container stage-contained">
            <ul class="flex">

                @foreach (config('global.allmodels') as $item)
                    <li>
                        <div class="car-item">
                            @if ($item->name == 'e:N1')
                                    <div class="model-text" style="text-transform: initial;">{{$item->name}}</div>
                                    @else
                                    <div class="model-text">{{$item->name}}</div>
                                    @endif
                            {{-- <div class="model-text">{{$item->name}}</div> --}}
                            {{-- <!-- <div class="car-model">
                                <img src="{{$item->name_img}}" alt="">
                            </div> --> --}}
                            <div class="car-photo"><img src="{{$item->icon}}" alt="{{$item->name}}"></div>
                            <div class="car-cta">
                                <a href="{{$item->brochure}}" class="prime-cta-white">
                                    <span>Download</span>
                                    <div class="overlay"></div>
                                </a>
                            </div>
                        </div>
                    </li>
                    @if ($item->slug != 'type-r')

                    @endif

                @endforeach

            </ul>
        </div>
    </div>

</section>



</div>

@stop

