
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
        <img src="{{url('img/hondaParts/02_Parts_Landing_ValueAdded/aircondadditive.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Air-cond Additive</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <div class="desc-copy">Honda Air Conditioner Additive is an innovative lubricant that is added to the air conditioner system to give cool comfort, even on the hottest days.</div>
        <div class="space"></div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box" style="width: 100%">
                <div class="desc-copy bold box-white font14px" style="margin-bottom: 40px;height:unset;">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Air-Cond-Additive/aca01.png')}}" alt="" style="width: calc(10% - -100px);">
                    <div class="" style="margin-top: -15px;padding-bottom: 20px;">Faster and more efficient cooling</div>
                </div>
                <div class="desc-copy bold box-grey font14px" style="margin-bottom: 40px;height:unset;">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Air-Cond-Additive/aca02.png')}}" alt="" style="width: calc(10% - -100px);">
                    <div class="" style="margin-top: -15px;padding-bottom: 20px;">Minimises noise and vibration</div>
                </div>
                <div class="desc-copy bold box-white font14px" style="margin-bottom: 40px;height:unset;">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Air-Cond-Additive/aca03.png')}}" alt="" style="width: calc(10% - -100px);">
                    <div class="" style="margin-top: -15px;padding-bottom: 20px;">Helps to prevent rust</div>
                </div>
                <div class="desc-copy bold box-grey font14px" style="margin-bottom: 40px;height:unset;">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Air-Cond-Additive/aca04.png')}}" alt="" style="width: calc(10% - -100px);">
                    <div class="" style="margin-top: -15px;padding-bottom: 20px;">Compatible with all Honda models*</div>
                </div>
            </div>


        </div>

        <div class="note-container stage-contained">
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note">
                <li>1. *Compatible for all Honda vehicles that uses POE (Polyol ester) oil and PAG (Polyalkylene Glycol) as the refrigerant HFC&#8209;134a (R&#8209;134a).</li>
                <li>2. Terms and conditions apply.</li>
                </ul>
            </div>
        </div>

        <div class="space"></div>
    </div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


