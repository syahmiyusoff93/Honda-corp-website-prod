
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
    
    <div class="img-sec centerdiv w10perc">
        <img src="{{url('img/hondaParts/03_Maintenance/Oil_Filter/OilFilter_Top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Genuine Oil Filter</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Honda Genuine Oil Filter</h2>
        <div class="desc-copy">A clean running engine comes from clean engine oil. This is made possible with Honda Genuine Oil Filter exclusively for Honda engines. It is individually structured with superior filtration efficiency, providing the ability to filter the engine oil to the micron level and reducing the deterioration of the engine oil ensuring durability of your Honda engine.</div>
        <div class="space"></div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Oil_Filter/01.png')}}" alt="">
                </div>
                <div class="desc-copy bold font14px">Honda Genuine “Irregular Fold” oil filter</div>
                <div class="desc-copy font14px">Compared to the right diagram’s standard chrysanthemum fold, Honda Genuine Oil Filter has 1.5 times more filtering surface</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Oil_Filter/02_CommercialType.png')}}" alt="">
                </div>
                <div class="desc-copy bold font14px">Other commercial type</div>
                <div class="desc-copy font14px">Standard ”chrysanthemum fold” oil filter</div>
            </div>
        </div>
        <div class="space"></div>

        <h2>Advantages of Honda Genuine Oil Filter</h2>
        <div class="desc-copy">Filtering efficiency and durability can differ with the type of filter [fold] structure. To increase filtering efficiency, a bigger filter area using individual snapping for advance filtration, resulting the trapped dirt inside to raise.</div>
        <div class="space"></div>

        <h2>Functions of Honda Genuine Oil Filter</h2>
        <div class="desc-copy">The friction inside the engine creates unwanted substances like metal powders, sludge and carbon fouling which will be blended together with the engine oil.</div>
        <div class="desc-copy"><br>The Honda Genuine Oil Filter will allow circulation of clean engine oil by filtering off all the above unwanted substances.</div>
        <div class="space"></div>

        
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w30perc">
                <div class="img-sec img-sec-fullwidth centerdiv margincenter">
                    <img src="{{url('img/hondaParts/03_Maintenance/Oil_Filter/oil_filter_Diagram.png')}}" alt="">
                </div>
            </div>
            <div class="hondaparts-box w70perc">
                <div class="content-copy-no" style="color: #5e6063; font-size:20px;">1.</div>
                <div class="desc-copy bold textalignleft marginleft30px font14px">Body</div>
                <div class="desc-copy textalignleft marginleft30px font14px">With excellent anti-corrosive coating.</div>
                <br>
                <div class="content-copy-no" style="color: #5e6063; font-size:20px;">2.</div>
                <div class="desc-copy bold textalignleft marginleft30px font14px">Relieve Valve</div>
                <div class="desc-copy textalignleft marginleft30px font14px">Ensures good oil circulation and by adjusting correct oil amount when engine starting is at extremely low temperature, or even when element is clogged.</div>
                <br>
                <div class="content-copy-no" style="color: #5e6063; font-size:20px;">3.</div>
                <div class="desc-copy bold textalignleft marginleft30px font14px">Element</div>
                <div class="desc-copy textalignleft marginleft30px font14px">Uses high performance element. Effectively catches minute particles like dust and carbon particles.</div>
                <br>
                <div class="content-copy-no" style="color: #5e6063; font-size:20px;">4.</div>
                <div class="desc-copy bold textalignleft marginleft30px font14px">Drain-Bag Valve</div>
                <div class="desc-copy textalignleft marginleft30px font14px">Uses high heat resistance silicon rubber. Prevents oil flow reversal after engine is off, and allows early oil circulation when engine is just switched on.</div>
                <br>
                <div class="content-copy-no" style="color: #5e6063; font-size:20px;">5.</div>
                <div class="desc-copy bold textalignleft marginleft30px font14px">Seal Plate</div>
                <div class="desc-copy textalignleft marginleft30px font14px">With stringent measurement control, tightening interference of packing ensures no concern of loosening. </div>
                <br>
                <div class="content-copy-no" style="color: #5e6063; font-size:20px;">6.</div>
                <div class="desc-copy bold textalignleft marginleft30px font14px">Packing</div>
                <div class="desc-copy textalignleft marginleft30px font14px">Uses gasket of excellent heat and oil resistance, and is durable against low temperature.</div>
            </div>
        </div>


    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


