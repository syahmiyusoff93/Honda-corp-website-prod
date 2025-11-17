
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
        <img src="{{url('img/hondaParts/04_ValueAdded/Wheel_Lock_Nut/Wheelnut_Top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Wheel Lock Nut</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <div class="desc-copy">Protect your wheels with Honda Access lock nuts which can only be unlocked with a unique security key.</div>
        <div class="space"></div>
        <div class="img-sec centerdiv">
            <img src="{{url('img/hondaParts/04_ValueAdded/Wheel_Lock_Nut/WheelLockNut_02.png')}}" alt="">
        </div>
        <div class="space"></div>

        <h2>Advantages of Wheel Lock Nut</h2>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Wheel_Lock_Nut/Icons/Nut01.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Hardened carbon steel construction ensures long lasting durability</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Wheel_Lock_Nut/Icons/Nut02.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Anti-rust and corrosion proof</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Wheel_Lock_Nut/Icons/Nut03.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Best triple-nickel chrome plating in the industry</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Wheel_Lock_Nut/Icons/Nut04.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Unique computer generated key pattern</div>
            </div>
        </div>
        <div class="space"></div>
        
        <div class="space"></div>

        
</section>

        <section>
            <div class="" style="padding-bottom: 30px;">
                <div class="stage-contained">
                    <div class="note-container" style="margin: 0px 20px 0px 20px;">
                        <div class="note-title more long">DISCLAIMERS</div>
                        <div class=" expand-content" style="display: none; max-width: 768px;">
                            <ul class="note">
                                <li>1. Not recommended for steel wheels.<li>
                                <li>2. First installation can only be done at Honda Authorised Service Centres.<li>
                                <li>3. Please keep the Wheel Lock Nut key safe at all times. If you lose your key, you may purchase a replacement key at Honda Authorised Service Centres.<li>
                                <li>4. The product is not compatible with Type R.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .note-container .more.long:after {left:unset;}
            </style>
        </section>

        


@include('brand.hondaparts.hondaparts-style')

@stop


