
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
        <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/Ultraglass_Top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Ultra Glass Body Coating</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <div class="desc-copy">A specially formulated material to give your Honda an ultra-glossy, 9H glass-based, super smooth surface.</div>
        <div class="space"></div>

        <h2>Advantages of Honda Ultra Glass Body Coating</h2>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/Icons/GlassBody01.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Hardest glass-based coating by industry standards</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/Icons/GlassBody02.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Longer-lasting shine</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/Icons/GlassBody03.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Superior anti-fouling effect against acid rain and dust</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/Icons/GlassBody04.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Easy washing and low maintenance</div>
            </div>
        </div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/Icons/GlassBody05.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Improved protection against UV rays</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/Icons/GlassBody06.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Lasts up to 3 years (includes shine warranty)</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/Icons/GlassBody07.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Preserve your Honda’s resale value</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/Icons/GlassBody08.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>1 kit per car</div>
            </div>
        </div>
        <div class="space"></div>

        <h2>Shine Comparison</h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc" style="padding: 20px 0px;">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/COATED.png')}}" alt="">
                </div>
            </div>
            <div class="hondaparts-box w50perc" style="padding: 20px 0px;">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Glass_Body_Coating/NON-COATED.png')}}" alt="">
                </div>
            </div>
        </div>

        
    <div class="space"></div>
</section>

        <section>
            <div class="" style="padding-bottom: 30px;">
                <div class="stage-contained">
                    <div class="note-container" style="margin: 0px 20px 0px 20px;">
                        <div class="note-title more long">DISCLAIMERS</div>
                        <div class="expand-content" style="display: none; max-width: 768px;">
                            <ul class="note">
                                <li>1. Vehicle need to be inspected at Honda Authorised applicator once a year.<li>
                                <li>2. For illustration purposes only. Actual results may vary.<li>
                                <li>3. Other terms and conditions apply.<li>
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


