
@extends('layouts.base')


@section('content')

<div style="height: 50px;background: #191616;">
        <a href="{{url('aftersales/honda-parts')}}" class="">
            <div style="padding: 15px 30px;font-size: 12px;">
                <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link">
                <span class="backtocopy" style="color: #fff;padding: 0 5px;width:unset;bottom:3px;">BACK TO Honda PARTS</span>
            </div>
        </a>
</div>
<section class="maxw1200">
    <div class="space"></div>
    
    <div class="img-sec one-img-size centerdiv">
        <img src="{{url('img/hondaParts/03_Maintenance/Disinfectant/Interior_Disinfectant.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Interior Disinfectant<br>(500 ml x2 Spray Bottle)</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <img class="poster maxw-800" src="img/hondaParts/03_Maintenance/Disinfectant/poster.png" alt="">
    </div>
    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


