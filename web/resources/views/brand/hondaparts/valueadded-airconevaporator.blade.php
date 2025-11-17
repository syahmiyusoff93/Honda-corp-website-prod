
@extends('layouts.base')


@section('content')

<div style="height: 50px;background: #191616;">
        <a href="{{url('aftersales/honda-parts#valueadded')}}" class="">
            <div style="padding: 15px 30px;font-size: 12px;">
                <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link">
                <span class="backtocopy" style="color: #fff;padding: 0 5px;width:unset;bottom:3px;">BACK TO Honda PARTS</span>
            </div>
        </a>
</div>
<section class="maxw1200">
    <div class="space"></div>
    
    <div class="img-sec centerdiv w5perc">
        <img src="{{url('img/hondaParts/04_ValueAdded/Air-Cond_Evaporator_Cleaner/aircondspray.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Air-Cond Evaporator Cleaner</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <div class="desc-copy">Have you ever switched on your car’s air conditioner, only to be greeted with a gust of musty air? That stench is most likely caused by mold and bacteria in your air conditioning unit. It’s not uncommon especially if you run your air conditioning unit only on recirculate (inside air). While air fresheners can mask these odours, it’s only a short term solution.</div>
        <div class="space"></div>

        <h2>Advantages of Air-Cond Evaporator Cleaner</h2>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Air-Cond_Evaporator_Cleaner/ADV_01.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Improves air quality in your car</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Air-Cond_Evaporator_Cleaner/ADV_02.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Keeps your air conditioning evaporator clean</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Air-Cond_Evaporator_Cleaner/ADV_03.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Flushes out bacteria and bad odours</div>
            </div>
        </div>

    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


