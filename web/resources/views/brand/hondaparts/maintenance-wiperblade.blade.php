
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
        <img src="{{url('img/hondaParts/03_Maintenance/Wiper_Blades/home_parts2_wiper.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">WIPER BLADES</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Honda Genuine Wiper Blades</h2>
        <div class="desc-copy">The Honda Genuine Wiper Blades, with its individual rubber form has a superior design for optimum glass cleaning. The wiper rubber will adapt its shape to the windshield, ensuring clear and comfortable road view even on rainy weather condition.</div>
        <div class="desc-copy"><br>"Wiper rubber assy" is the complete replacement part, which includes wiper blade rubber <span style="white-space:nowrap;">and metal rail.</span></div>
        <div class="desc-copy" style="font-style:italic;"><br>Note: Wiper blade rubber is a single part.</div>
        <div class="space"></div>

        <h2>Advantages of Honda Genuine Wiper Blades</h2>
        <div class="desc-copy">Honda Genuine Wiper Blades are built specifically for your vehicle’s windshield. Read on to know how and why Honda Genuine Wiper Blades can better ensure your safety during storms.</div>
        

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Wiper_Blades/wiper1.png')}}" alt="">
                </div>
                <div class="content-copy-no">01</div>
                <div class="desc-copy bold textalignleft marginleft55px">Improved blade shape for higher wiping ability</div><br>
                <div class="desc-copy textalignleft marginleft55px">The contact point of the Honda Genuine Wiper is cut to a sharp angle, providing superior cleaning efficiency compared to other commercial wiper, where contact point uses a rounded angle.</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Wiper_Blades/wiper2.png')}}" alt="">
                </div>
                <div class="content-copy-no">02</div>
                <div class="desc-copy bold textalignleft marginleft55px">Customised shape allows easier installation</div><br>
                <div class="desc-copy textalignleft marginleft55px">Honda customises the wiper for all Honda cars, designing it to fit each model. This feature not only prevents wiper detachment during high-speed traveling, it is also easier to install and replace without special tools.</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Wiper_Blades/wiper3.png')}}" alt="">
                </div>
                <div class="content-copy-no">03</div>
                <div class="desc-copy bold textalignleft marginleft55px">Better endurance with special natural rubber</div><br>
                <div class="desc-copy textalignleft marginleft55px">Honda genuine wiper uses 100% specially formulated natural rubber, which is more flexible compared to the harder synthetic rubber. The tougher and sharper edges not only produce a cleaner wipe but also extends blade life.</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Wiper_Blades/wiper4.png')}}" alt="">
                </div>
                <div class="content-copy-no">04</div>
                <div class="desc-copy bold textalignleft marginleft55px">Blade curvature matches each Honda windshield model hence giving a high wiping ability</div><br>
                <div class="desc-copy textalignleft marginleft55px">Honda genuine wiper's arm railing follows the curvature of each Honda model. It is able to conform accordingly to windshields, ensuring a smoother wiping while maintaining superior cleaning efficiency throughout all Honda cars.</div>
            </div>
        </div>

    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


