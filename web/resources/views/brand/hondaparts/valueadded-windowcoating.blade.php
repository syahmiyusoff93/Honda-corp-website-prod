
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
        <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Window_Coating/UltraWindowCoating_Top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Ultra Window Coating</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <div class="desc-copy">Poor visibility when driving in the rain is both a frustrating and dangerous experience. Keeping your windscreen free of rain doesn’t just fall in the hands of your car’s wipers, a water repellent coating helps keep water off your windscreen as well.</div>
        <div class="space"></div>

        <h2>Advantages of Honda Ultra Window Coating </h2>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box">
                <div class="pink-copy-no">01</div>
                <div class="desc-copy bold">Improves wet weather visibility</div>
            </div>
            <div class="hondaparts-box">
                <div class="pink-copy-no">02</div>
                <div class="desc-copy bold">Long lasting performance</div>
            </div>
            <div class="hondaparts-box">
                <div class="pink-copy-no">03</div>
                <div class="desc-copy bold">Excellent water repellency</div>
            </div>
            <div class="hondaparts-box">
                <div class="pink-copy-no">04</div>
                <div class="desc-copy bold">Specially formulated for optimum result</div>
            </div>
        </div>
        <div class="space"></div>

        <h2>Coating Comparison</h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc" style="padding: 20px 0px;">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Window_Coating/Coated.png')}}" alt="">
                </div>
            </div>
            <div class="hondaparts-box w50perc" style="padding: 20px 0px;">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/04_ValueAdded/Ultra_Window_Coating/Non-Coated.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="space"></div>

        <h2>Packages</h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="desc-copy bold" style="background-color: #e6e6e8;width: 302px;height: 56px;vertical-align: middle;line-height: 56px;">Full Package</div>
                <div class="desc-copy textalignleft" style="background-color: #f5f5f5;width: 302px;padding: 25px;">
                <span class="font14px"><span style="color: #e01327;">•</span> Front & Rear Windscreen<br>
                    <span style="color: #e01327;">•</span> All Windows</span>
                </div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="desc-copy bold" style="background-color: #e6e6e8;width: 302px;height: 56px;vertical-align: middle;line-height: 56px;">Windscreen Package</div>
                <div class="desc-copy textalignleft" style="background-color: #f5f5f5;width: 302px;padding: 25px;height: 100px;"><span class="font14px"><span style="color: #e01327;">•</span> Front & Rear Windscreen Only</span></div>
            </div>
        </div>


    <div class="space"></div>
</section>


        <section>
            <div class="" style="padding-bottom: 30px;">
                <div class="stage-contained">
                    <div class="note-container" style="margin: 0px 20px 0px 20px;">
                        <div class="note-title more long">DISCLAIMERS</div>
                        <div class=" expand-content" style="display: none; max-width: 768px;">
                            <ul class="note">
                                <li>1. Images are for illustration purposes only & results may vary depending on windscreen & window conditions.<li>
                                <li>2. Recommended to use only Honda Genuine wiper rubber for optimum result.<li>
                                <li>3. One year water repellent durability effect. However, the water repellent performance may reduce due to abrasion frequency & deterioration overtime. Please obtain more information from our Honda Authorised Dealer.<li>
                                <li>4. Three months warranty on water repellency with terms and conditons.<li>
                                <li>5. Other terms and conditions apply.<li>
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


