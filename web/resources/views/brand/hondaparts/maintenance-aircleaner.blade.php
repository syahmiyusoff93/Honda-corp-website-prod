
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
    
    <div class="img-sec w20perc centerdiv">
        <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Air_Cleaner/AirCleaner2.png')}}" alt="">
    </div>
    <h2 style="margin-bottom:0;">Genuine Air Cleaner</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    <div class="maxwidth785">
        <h2>Honda Genuine Air Cleaner</h2>
        <div class="desc-copy">Honda genuine air cleaner is designed to provide the finest micron filtration efficiency, ensuring smooth clean air into your engine.</div>
    </div>
   
    
    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


