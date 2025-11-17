@php
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'happenings.json', false, $honda_api_context);
    $data = json_decode($data);
    $hdata = $data->payload;
@endphp

@extends('layouts.base')

@section('page-title')
    Happenings
@stop


@section('content')
<style>
    .happenings-landing .details-container .des .sub-title {
        max-width: 335px !important;
        margin: auto;
        margin-bottom: 5px;
    }
</style>


<div class="body-wrapper">
<section class="happenings-landing stage-contained innerpage">
    <div class="intro">
        <h2>HAPPENINGS</h2>
        <div class="intro-title grey">Our latest news and events including articles, press releases, and information about our upcoming events.</div>
    </div>

    <div class="details-container">
        <ul class="flex">

            @foreach ($hdata as $item)
                <li>
                    <div class="photo">
                        <a href="{{url('happening/'.$item->id.'/'.$item->slug)}}">
                            <img src="{{$item->thumb}}" alt="{{$item->title}} - thumbnail">
                        </a>
                    </div>
                    <div class="des">
                        <div class="sub-title">{!!$item->title!!}</div>
                        <div class="body-copy">{!!$item->short_desc!!}</div>
                        <a href="{{url('happening/'.$item->id.'/'.$item->slug)}}">
                            <div class="cta">READ MORE<img src="{{url('img/interface/arrow-short-right-red.svg')}}"></div>
                        </a>
                    </div>
                </li>

            @endforeach

        </ul>
    </div>





</section>
</div>
<script>
    $("document").ready(function(){

        $( "div.sub-title:contains('Honda City V SENSING, A Leader In Its Class')" ).html( "Honda City V SENSING, A&nbsp;Leader&nbsp;In&nbsp;Its&nbsp;Class");

        $( "div.sub-title:contains('Step Up Your Game With The All-New City Hatchback')" ).html('Step Up Your Game With The All&#8209;New City Hatchback');

        $(".sub-title:contains('The All-New City Hatchback V-SENSING, Most Complete')").html("The All-New City Hatchback V&#8209;SENSING, Most Complete");
	
	$( "div.sub-title:contains('Service Win Prosperity')" ).html('The Results Are In!');

    });
</script>
@stop
