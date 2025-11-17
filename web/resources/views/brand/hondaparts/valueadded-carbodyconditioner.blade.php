
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
        <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/vap-car-body-conditioner.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Car Body Conditioner</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h3 class="bold" style="text-align: left">How to use</h3>
        <div class="desc-copy" style="text-align: left">Three simple steps to experience the transformative effects of your Car Body Conditioner.</div>
        <div class="space"></div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box steps-copy" style="width: 100%;">
                <div class="desc-copy bold box-white font14px" style="margin-bottom: 40px;height:unset;display:flex;align-items:center;">
                    <p>1</p>
                    <img src="https://stg.honda.com.my/img/hondaParts/04_ValueAdded/car-body-conditioner/step1.png" alt="" style="width: calc(0% - -85px);">
                    <p>Wash the car and ensure the surface is clean and dry.</p>
                </div>
                <div class="desc-copy bold box-white font14px" style="margin-bottom: 40px;height:unset;display:flex;align-items:center;">
                    <p>2</p>
                    <img src="https://stg.honda.com.my/img/hondaParts/04_ValueAdded/car-body-conditioner/step2.png" alt="" style="width: calc(0% - -85px);">
                    <p>Apply Car Body Conditioner.</p>
                </div>
                <div class="desc-copy bold box-white font14px" style="margin-bottom: 40px;height:unset;display:flex;align-items:center;">
                    <p>3</p>
                    <img src="https://stg.honda.com.my/img/hondaParts/04_ValueAdded/car-body-conditioner/step3.png" alt="" style="width: calc(0% - -85px);">
                    <p>Wipe with dry cloth. Admire the shine.</p>
                </div>
            </div>
        </div>

        <h2 class="bold">THE POWER OF CAR BODY CONDITIONER</h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/car-body-conditioner/power1.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Repels water & dirt to protect car coat</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/car-body-conditioner/power2.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Creates ultra-reflective shine</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/car-body-conditioner/power3.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Wipes off easily - no water marks</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/car-body-conditioner/power4.png')}}" alt="" style="width: 90px;">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Last up to <br> 10 car washes</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/car-body-conditioner/power5.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Easy do-it-yourself application</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="img-sec img-sec-80prec centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/car-body-conditioner/power6.png')}}" alt="">
                </div>
                <div class="desc-copy" style="margin-top:30px;">Suitable for all Honda models</div>
            </div>
        </div>
        <div class="space"></div>

        <div class="note-container stage-contained">
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note">
                    <li>1. Terms and conditions apply.</li>
                    <li>2. **Up to 3 months per application.</li>
                </ul>
            </div>
        </div>

        <div class="space"></div>
    </div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


