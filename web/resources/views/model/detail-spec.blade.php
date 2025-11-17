@php

$inner_section = 'spec';

$APIPATH = config('global.APIPATH');
$honda_api_context = config('global.APICONTEXT');

$data = file_get_contents($APIPATH.'model_'.$model_slug.'_variants.json', false, $honda_api_context);
$data = json_decode($data);
$variants = $data->payload;
// Rearrange variants by weight
if ($variants) { 
    usort($variants, function($a, $b) { return strcmp($a->sequence, $b->sequence); }); 
}
$model_info = $data->model;

foreach($variants as $v){
    $data = file_get_contents($APIPATH.'fullspec_variant_'.$v->id.'.json', false, $honda_api_context);
    $data = json_decode($data,true);
    $v->spec = $data['payload'];
    $variantids[] = $v->id;
}


//dd($variants);

$APIPATH = config('global.APIPATH');
$honda_api_context = config('global.APICONTEXT');

$data = file_get_contents($APIPATH.'variants.json', false, $honda_api_context);
$data = json_decode($data);
$allvariants = $data->payload;

// all label legend
$data = file_get_contents($APIPATH.'spec_legend.json', false, $honda_api_context);
$data = json_decode($data, true);
$labellagend = $data['payload'];

//grouped legends for table generation
$data = file_get_contents($APIPATH.'spec_legend_grouped.json', false, $honda_api_context);
$data = json_decode($data);
$groupedlegend = $data->payload;

$ownvariantonly = true;

$__menu = config('global.menus');
// Show only the requested tools in the mobile floating bar, in this order
$__desired = config('global.desired');
$desired = $__desired;
$found = [];
foreach ($__menu['shopping-tool'] as $itm) {
    if (in_array(strtolower($itm[0]), array_map('strtolower', $desired))) {
        $found[] = $itm;
    }
}

// Preserve desired order
$mobileTools = [];
foreach ($desired as $d) {
    foreach ($found as $f) {
        if (strtolower($f[0]) === strtolower($d)) {
            $mobileTools[] = $f;
            break;
        }
    }
}

@endphp

@extends('layouts.modelinner')

@section('page-title')
    Specifications - Honda {{$model_info->name}}
@stop

@section('inner-content')
<style>
    
   .dropdown-menu.sai-dd-item > li[data-vid="48"] {
        display: none !important;
    }

</style>


    <section class="model-inner-container stage-contained spec-inner drop-table">
        <div class="intro first">
            <h2>SPECIFICATIONS</h2>
            @if ($model_slug == "en1")
            <div class="intro-title grey"></div>
            @else
            <div class="intro-title grey">Select your desired Honda variants for a specs comparison.</div>
            @endif
            {{-- <div class="intro-title grey">Select your desired Honda variants for a specs comparison.</div> --}}
        </div>

        <div class="details-container">
            @include('components.model-dropdown')
        </div>
    </section>

    {{--  -------- COMPARE TABLE & FUNCTIONALITIES -------------------  --}}
    <?php if ($model_slug == "en1")  { ?>
        @include('components.spec-compare-ev')
    <!--- everything else  -->
    <?php } else { ?>
        @include('components.spec-compare')
    <?php } ?>

    <?php if ($model_slug == "city-hatchback")  { ?>
    <div class="stage-contained">
        <div class="note-container">
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note">
                    <li>1. <img src="{{url('img/interface/icn-tick-black.png')}}"> Standard</li>
                    <li>2. ^Combination Leather</li>
                    <li>3. Actual model, features and specifications may vary in detail from image shown. Subject to change without prior notice.</li>
                    <li>4. Colours are subject to stock availability. *Android Auto™ will be available upon official launch of the service in Malaysia.</li>
                    
                </ul>
            </div>
        </div>
    </div>

   <!--- civic hev  -->
   <?php } else if ($model_slug == "civic") { ?>
    <div class="stage-contained">
        <div class="note-container">
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note">
                    <li>1. <img src="{{url('img/interface/icn-tick-black.png')}}"> Standard</li>
                    <li>2. ^Combination Leather</li>
                    <li>3. Actual model, features and specifications may vary in detail from image shown. Subject to change without prior notice.</li>
                    <li>4. Colours are subject to stock availability. *Android Auto™ will be available upon official launch of the service in Malaysia.</li>
                    
                </ul>
            </div>
        </div>
    </div>
   <!-- civic end -->

   <!--- hrv  -->
   <?php } else if ($model_slug == "hrv") { ?>
    <div class="stage-contained">
        <div class="note-container">
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note">
                    <li>1. <img src="{{url('img/interface/icn-tick-black.png')}}"> Standard</li>
                    <li>2. ^Combination Leather</li>
                    <li>3. Actual model, features and specifications may vary in detail from images shown.</li>
                    <li>4. Subject to change without prior notice.</li>
                    <li>5. Colours are subject to stock and availability.</li>
                    <li>6. *Android Auto<sup style="font-size: 0.8em;">™</sup>  will be available upon official launch of the service in Malaysia.</li>
                </ul>
            </div>
        </div>
    </div>
   <!-- hrv end -->

   <!-- ev start -->
<?php } else if ($model_slug == "en1") { ?>
    <div class="stage-contained">
        <div class="note-container">
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note">
                    <li>1. <img src="{{url('img/interface/icn-tick-black.png')}}"> Standard</li>
                    <li>2. Actual model, features and specifications may vary in detail from images shown.</li>
                    <li>3. Subject to change without prior notice.</li>
                    <li>4. Colours are subject to stock availability.</li>
                    <li>5. *Terms and conditions apply.</li>
                </ul>
            </div>
        </div>
    </div>
   <!-- ev end -->

   <!--- everything else  -->
   <?php } else { ?>
        <div class="stage-contained">
        <div class="note-container">
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note">
                    <li>1. <img src="{{url('img/interface/icn-tick-black.png')}}"> Standard</li>
                    <li>2. ^Combination Leather</li>
                    <li>3. Actual model, features and specifications may vary in detail from images shown.</li>
                    <li>4. Subject to change without prior notice. Colours are subject to stock availability.</li>
                    <li>5. *Android Auto<sup style="font-size: 0.8em;">™</sup> will be available upon official launch of the service in Malaysia.</li>
                </ul>
            </div>
        </div>
    </div>
   <?php } ?>

   <section class="shopping-tools body-copy grey container section-gap" id="shopping-tools" style="padding-top: 40px; margin-top: -40px;">
        <h2 style="padding-top:40px;">SHOPPING TOOLS</h2>
        
        @foreach ($__menu['shopping-tool'] as $item)
            <a href="{{$item[1]}}" class="shoptool-item {{$item[3]}}">
                <img  class="lazyload" data-src="{{versioned_asset('img/icon/'.$item[2])}}" alt="{{$item[0]}}">
                <div class="st-text"> {{$item[0]}}</div>
            </a>
        @endforeach
        <div class="clearfix"></div>

        {{-- Mobile floating bottom bar (only show on small screens) --}}
        <div class="mobile-shopping-tools" aria-hidden="false">
            @foreach ($mobileTools as $m)
                <a href="{{$m[1]}}" class="mst-item" title="{{$m[0]}}" aria-label="{{$m[0]}}">
                    <img src="{{ versioned_asset('img/icon/'.$m[2]) }}" alt="{{$m[0]}}" />
                    <span>{{$m[0]}}</span>
                </a>
            @endforeach
        </div>
    </section>

   <!-- everything else end -->

    <script>
     $("document").ready(function(){
        var mslug = "{{$model_slug}}";
        if ( mslug  == "crv") {

            $( ".sai-ddselect-0 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)").insertBefore(".sai-ddselect-0 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(3)" );
            $( ".sai-ddselect-1 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)").insertBefore(".sai-ddselect-1 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(3)" );
            $( ".sai-ddselect-2 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)").insertBefore(".sai-ddselect-2 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(3)" );
            $( ".sai-ddselect-3 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)").insertBefore(".sai-ddselect-3 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(3)" );
        }
        else if ( mslug  == "city") {

            $( ".sai-ddselect-0 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)").insertBefore(".sai-ddselect-0 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)" );
            $( ".sai-ddselect-1 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)").insertBefore(".sai-ddselect-1 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)" );
            $( ".sai-ddselect-2 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)").insertBefore(".sai-ddselect-2 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)" );
            $( ".sai-ddselect-4 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)").insertBefore(".sai-ddselect-4 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)" );

            $( ".dropdown-menu.sai-dd-item > li:nth-child(6)").css("display", "none" );
            $( ".sai-ddselect-5").css("display", "none" );
        }

        else if ( mslug  == "city-hatchback") {
            $("#mainstage > section.model-inner-container.stage-contained.spec-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-3").insertBefore("#mainstage > section.model-inner-container.stage-contained.spec-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-4");
        }

        else if ( mslug  == "wr-v") {
            $( ".dropdown-menu.sai-dd-item > li:nth-child(5)").css("display", "none" );
            $( ".sai-ddselect-4").css("display", "none" );
            $( ".col4").css("display", "none" );
        }


      });
    </script>






@stop
