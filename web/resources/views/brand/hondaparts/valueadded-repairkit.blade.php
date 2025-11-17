
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
        <img src="{{url('img/hondaParts/04_ValueAdded/Instant_Tyre_Repair_Kit/InstantTyreRepairKit.png')}}" alt="">
    </div>
    <h2 class="uppercase" style="margin-bottom:0;">Instant Tyre Repair Kit</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <div class="desc-copy">Honda Access Instant Tyre Repair Kit is a type of emergency puncture repair sealant for domestic cars. It can be used as emergency minor puncture repair when the tyre threads were pinned by a nail or screw, without jacking up or changing to a spare tyre. The repair sealant and the pumping gas will be pumped into the tyre at the same time to fill the puncture hole and expand the flattened tyre. </div>
        <div class="space"></div>
        
        <h2>Advantages of Honda Instant Tyre Repair Kit </h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w33perc">
                <div class="pink-copy-no">01</div>
                <div class="desc-copy h60 bold">No tools required</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="pink-copy-no">02</div>
                <div class="desc-copy h60 bold">Drive away instantly</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="pink-copy-no">03</div>
                <div class="desc-copy h60 bold">Compact storage</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="pink-copy-no">04</div>
                <div class="desc-copy h60 bold">1-minute solution</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="pink-copy-no">05</div>
                <div class="desc-copy h60 bold">Able to repair when loaded</div>
            </div>
            <div class="hondaparts-box w33perc">
                <div class="pink-copy-no">06</div>
                <div class="desc-copy h60 bold">Minimise risks of accidents during roadside</div>
            </div>
        </div>
   
    
    <div class="space"></div>
    <div class="space"></div>

</section>


@include('brand.hondaparts.hondaparts-style')

@stop


