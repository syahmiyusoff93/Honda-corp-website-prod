@php
    /*
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $modulo_img['city'] = 'img/mock/city/modulo.jpg';
    $modulo_img['accord'] = 'img/mock/accord/modulo.jpg';
    $modulo_img['hrv'] = 'img/mock/hrv/modulo.jpg';
    $modulo_img['crv'] = 'img/mock/crv/modulo.jpg';
    $modulo_img['brv'] = 'img/mock/brv/modulo-2.jpg';
    $modulo_img['civic'] = 'img/mock/civic/modulo-2.jpg';
    $modulo_img['jazz'] = 'img/mock/jazz/modulo.jpg';
    $modulo_img['odyssey'] = 'img/mock/odyssey/accessories_landing.jpg';
    $modulo_img['type-r'] = 'img/mock/typer/typer-accessories-landing.png';
    */

    /*
    SAI 20200507:
    Accessories landing image now set in DeltaEcho: model > Accessories > General Settings
    No need to hard code aymore.
    DO NOT hard code any content-related stuff unless in utter DESPERATION. Even then, update DeltaEcho to accomodate the content updates and remove the hardcode
    */

@endphp

{{--
<!-- <div class="model-name"><img src="{{url(@$model_info->name_img)}}" alt=""></div> -->
<!-- <img class="car-model" src="{{url('img/mock/360model.png')}}" alt=""> -->
 --}}

@if (!empty($model_info->accessories->acc_hero_img))
    <img class="car-model lazyload--" src="{{$model_info->accessories->acc_hero_img}}" alt="">
@endif

{{--
<!-- <div id="threesixtyframes" class="car-model" style="z-index:1;"></div>
<div class="model-indicator for-desktop"><img src="{{url('img/mock/360indicator.png')}}" alt=""></div>
<div class="model-indicator for-mobile"><img src="{{url('img/mock/360indicator-m.png')}}" alt=""></div> -->
--}}

@isset($sprites)
    <script>
        // 360 exterior
        $(function(){
            var frames = "{{$sprites}}";
                frames = frames.split(',');

                $("#threesixtyframes").spritespin({
                width : 623,
                height: 415,
                frames: frames.length,
                behavior: "drag", // "hold"
                module: "360",
                sense : -1,
                source: frames,
                animate : true,
                loop: false,
                stopFrame: 33,
                frameWrap : true,
                frameStep : 1,
                frameTime : 80,
                enableCanvas : true
                });
                // 360exterior end
            });

    </script>
@endisset
