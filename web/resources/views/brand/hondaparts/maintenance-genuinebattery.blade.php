
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
        <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Batteries/GenuineBatteries.jpg')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Genuine Batteries</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Honda Genuine Maintenance-free Battery</h2>
        <div class="desc-copy">Genuine batteries have been designed and meticulously engineered with substantial input and consultation from us. Equip your vehicle with a genuine battery and enjoy the ride <span style="white-space:nowrap;">of your life.</span></div>
        <div class="space"></div>

        <h2>Get Genuine Batteries for Honda-quality Performance</h2>
        <div class="desc-copy"><span style="color: #e01327;">•</span> Meets the rigorous specification standards set by Honda R&D</div>
        <div class="desc-copy"><span style="color: #e01327;">•</span> Built for long battery life and Honda-quality performance</div>
        <div class="desc-copy"><span style="color: #e01327;">•</span> Perfect match for your Honda car</div>
        <div class="space"></div>

        <h2>Fuss-free Maintenance</h2>
        <div class="desc-copy">Visit a Honda Authorised Dealer and a trained technician will test your battery or install a new Honda Genuine Maintenance-free Battery if you need one.</div>
        <div class="space"></div>
        <div class="line-breaker"></div>
        <div class="space"></div>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc" style="padding-top: 0;">
                <div class="content-copy-no">01</div>
                <div class="desc-copy bold textalignleft marginleft55px">25% longer life compared to standard batteries</div><br>
                <div class="desc-copy textalignleft marginleft55px">FB battery life cycle is laboratory tested, and has performed according to actual traffic situations in Thailand and Japan. As the Original Equipment Manufacturer (OEM) for Honda, they have passed a variety of optimal Honda-quality tests.</div>
            </div>
            <div class="hondaparts-box w50perc" style="padding-top: 0;">
                <div class="content-copy-no">02</div>
                <div class="desc-copy bold textalignleft marginleft55px">Power retention without recharging (up to 1 month)</div><br>
                <div class="desc-copy textalignleft marginleft55px">FB batteries have lower self-discharge and are able to power on for as long as one month.</div>
            </div>
        </div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc" style="padding-top: 0;">
                <div class="content-copy-no">03</div>
                <div class="desc-copy bold textalignleft marginleft55px">Battery water refill not required</div><br>
                <div class="desc-copy textalignleft marginleft55px">This maintenance-free battery features a specially designed cap that protects it from water leaks and reduces acid evaporation.</div>
            </div>
        </div>

    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


