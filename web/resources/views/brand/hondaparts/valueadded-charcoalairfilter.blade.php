
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
    
    <div class="img-sec one-img-size centerdiv">
        <img src="{{url('img/hondaParts/04_ValueAdded/Charcoal_Air_Filter/CharcoalAirFilter_Top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Charcoal Air Filter</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <div class="desc-copy">Spending time stuck in traffic is a frustrating routine for city drivers. What’s worse is that the quality of air in these situations is far from healthy. If your daily commute involves spending lots of time in traffic, we suggest getting a charcoal air filter to keep harmful gases and <span style="white-space:nowrap;">odours out.</span></div>
        <div class="space"></div>

        <h2>Advantages of Charcoal Air Filter</h2>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Charcoal_Air_Filter/HA_03@3x.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">95% filtration efficiency at 5μm particle size</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Charcoal_Air_Filter/Adv_02.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Activated carbon filters fine particles up to 0.3 microns</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Charcoal_Air_Filter/Adv_03.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Permanent electrostatic technologgy boost filtration efficiency</div>
            </div>
        </div>
        <div class="space"></div>

        <div class="img-sec img-sec-fullwidth centerdiv">
            <img src="{{url('img/hondaParts/04_ValueAdded/Charcoal_Air_Filter/AP_HazeDiagram.png')}}" alt="">
        </div>

    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


