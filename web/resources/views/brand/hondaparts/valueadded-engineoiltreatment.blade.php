
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
        <img src="{{url('img/hondaParts/04_ValueAdded/Engine_Oil_Treatment/ENGINE_OIL_TREATMENT.png')}}" alt="">
    </div>
    <h2 style="margin-bottom:0;">ENGINE OIL TREATMENT</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Advantages of Honda Engine Oil Treatment </h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w33perc">
                <div class="pink-copy-no">01</div>
                <div class="desc-copy font14px">Reduces engine power loss and engine noise</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="pink-copy-no">02</div>
                <div class="desc-copy font14px">Minimises noise generated from contact between moving metal parts</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="pink-copy-no">03</div>
                <div class="desc-copy font14px">Promotes better fuel-efficiency</div>
            </div>
        </div>

        <div class="space"></div>

        <h2>High Performance Engine Oil Treatment</h2>
        <div class="desc-copy">When an engine is running, friction wears out moving parts over time. This leads to engine power loss, increased noise and possibly damage.</div>
        <div class="space"></div>
        <div class="img-sec img-sec-80prec centerdiv">
            <img src="{{url('img/hondaParts/04_ValueAdded/Engine_Oil_Treatment/ENGINEOILTREATMENT_Graph.png')}}" alt="">
        </div>

        <div class="space"></div>
        
        <div class="desc-copy bold">Directions:</div>
        <div class="desc-copy">Use every 10,000KM or engine oil interval</div>
    </div>
    
   
    
    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


