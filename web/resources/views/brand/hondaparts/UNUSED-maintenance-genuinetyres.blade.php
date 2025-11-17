
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
        <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/Tyre_Top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">GENUINE / RECOMMENDED TYRES</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Honda Genuine / Recommended Tyres</h2>
        <div class="desc-copy">Our recommended tyres are the only tyres that are approved of its performance and quality by Honda Research & Development Japan, and is the Best Balance for Honda cars. 3S Dealer guarantees our recommended tyres are the same as an original OEM tyre specifications.</div>
        <div class="space"></div>
        <div class="img-sec centerdiv">
            <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/Tyre_Chart.png')}}" alt="">
        </div>
        <div class="space"></div>
        <div class="line-breaker"></div>
        <div class="space"></div>

        <div class="desc-copy textalignleft"><span class="checkmark"><div class="checkmark_stem"></div><div class="checkmark_kick"></div></span>Please follow the tyre pressure as indicated near the door on the driver’s side.</div>
        <div class="desc-copy textalignleft"><span class="checkmark"><div class="checkmark_stem"></div><div class="checkmark_kick"></div></span>Please check the tyre pressure once in a month.</div>
        <br>
        <div class="desc-copy textalignleft font14px">*Ask our Service Advisors for more info!</div>

        <div class="space"></div>
</section>



@include('brand.hondaparts.hondaparts-style')

@stop


