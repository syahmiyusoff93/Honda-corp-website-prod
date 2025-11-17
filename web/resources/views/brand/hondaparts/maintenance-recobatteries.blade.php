
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
        <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Batteries/Battery_Top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Recommended BATTERIES</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Honda Recommended Batteries</h2>
        <div class="desc-copy">Recommended batteries have been designed and meticulously engineered with substantial input and consultation from us. Equip your vehicle with a recommended battery and enjoy the ride of your life.</div>
        <div class="space"></div>

        <h2>Advantages of Honda Recommended Batteries</h2>
        <div class="space"></div>
        <div class="pink-copy-no" style="width:unset;">01 <span class="desc-copy bold" style="font-style:normal;vertical-align: middle;"> High-powered</span></div>
        <div class="img-sec centerdiv">
            <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Batteries/01battery.png')}}" alt="">
        </div>
        <div class="desc-copy">The Recommended battery is designed to produce an optimum Honda-quality performance for your vehicle.</div>
        <br>
        <div class="desc-copy">
            <span style="color: #e01327;">i.</span> Offers 12V of electric power<br>
            <span style="color: #e01327;">ii.</span> Provides electricity as it is the car's source of electric energy<br>
            <span style="color: #e01327;">iii.</span> Powers the air-conditioning system, lights, audio system and engine kickstarts<br>
            <span style="color: #e01327;">iv.</span> Highly-compatible with i-VTEC engines<br>
            <span style="color: #e01327;">v.</span> 1 Year Warranty
        </div>
        <div class="space"></div>

        <div class="pink-copy-no" style="width:unset;">02 <span class="desc-copy bold" style="font-style:normal;vertical-align: middle;"> Long-lasting</span></div>
        <div class="img-sec centerdiv">
            <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Batteries/02battery1.png')}}" alt="">
        </div>
        <div class="desc-copy">Innovatively engineered with lightweight, stronger grids for a longer service life, and better value for your Honda.</div>
        <div class="space"></div>

        <div class="pink-copy-no" style="width:unset;">03 <span class="desc-copy bold" style="font-style:normal;vertical-align: middle;"> Maintenance-free</span></div>
        <div class="img-sec centerdiv">
            <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Batteries/03battery3.jpg')}}" alt="">
        </div>
        <div class="space"></div>
        <div class="desc-copy">Battery water top-up is not required for Recommended batteries. You’ll never have to worry about running low on battery water ever again.</div>
        <div class="desc-copy"><br>The Burst Prevention Vent Plug protects the battery from rupturing caused by external spark stimulation.</div>
        <div class="desc-copy"><br>A special Water Vapour Pressure Control Sticker keeps the battery water from vapouring.</div>

        
        <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


