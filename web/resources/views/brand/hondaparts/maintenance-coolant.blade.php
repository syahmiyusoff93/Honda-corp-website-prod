
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
    
    <div class="img-sec one-img-size centerdiv w10perc">
        <img src="{{url('img/hondaParts/03_Maintenance/Long_Life_Coolant/longlifecoolant_top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">GENUINE LONG-LIFE COOLANT</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Honda Genuine Long-Life Coolant</h2>
        <div class="desc-copy">Specially designed for Honda's aluminium engines, the Honda Genuine Long-Life Coolant offers protection against rust and corrosion in the radiator and engine, whilst keeping engine temperatures stable.</div>
        <div class="space"></div>

        <h2>Advantages of Honda Genuine Long-Life Coolant</h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">01</div>
                <div class="desc-copy fontw500 textalignleft marginleft55px">Specially designed for Honda aluminium engine.</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">02</div>
                <div class="desc-copy fontw500 textalignleft marginleft55px">Contains a special "organic corrosion inhibitor" instead of silicate.</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">03</div>
                <div class="desc-copy fontw500 textalignleft marginleft55px">Excellent corrosion protection for aluminium heat-rejecting components.</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">04</div>
                <div class="desc-copy fontw500 textalignleft marginleft55px">No possibility of silicate gelling which causes radiator plugging and overheating.</div>
            </div>
        </div>
        <div class="space"></div>

        <h2>Why Change Coolant Regularly</h2>
        <div class="desc-copy">It's important to change your coolant regularly as even Genuine Long-Life Coolant loses its effectiveness over time. The easiest way to do this is to visit your Honda Authorised Dealer and let a trained technician change your coolant.</div>
        <div class="space"></div>

        <h2>Effects of Using Non-Genuine Coolant</h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Long_Life_Coolant/WaterPump01.png')}}" alt="">
                </div>
                <div class="desc-copy bold font14px">Water pump – With use of Honda Long-Life Coolant</div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Long_Life_Coolant/WaterPump02.png')}}" alt="">
                </div>
                <div class="desc-copy bold redfont font14px">Water pump – Without use of Honda Long-Life Coolant</div>
            </div>
        </div>
   
        <div class="space"></div>
        
        <div class="desc-copy">Using a non-genuine coolant may cause corrosion in the cooling systems and gradually block it, thus damaging the engine. Always insist on Honda Genuine Long-Life Coolant.</div>
        <br>
        <div class="desc-copy">A clean fuel injector delivers the correct spray pattern that is essential for clean, <span style="white-space:nowrap;">efficient combustion.</span></div>
        

    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


