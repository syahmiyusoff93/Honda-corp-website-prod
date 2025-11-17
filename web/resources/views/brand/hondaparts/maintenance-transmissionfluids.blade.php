
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
        <img src="{{url('img/hondaParts/03_Maintenance/Transmission_Fluids/Transmission_Fluids_Top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Genuine TRANSMISSION FLUIDS</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Honda Transmission Fluids</h2>
        <div class="desc-copy">Specially designed for Honda’s automatic and constant variable transmissions, the Honda Genuine Transmission Fluids offer protection against extreme temperatures, lubricate gears and rubbers, and provide correct frictional response to optimise <span style="white-space:nowrap;">Honda’s transmission performance.</span></div>
        <div class="space"></div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="desc-copy bold box-white font14px" style="padding-top:10px;">Honda Genuine ATF DW-1 <br><span style="font-size:12px;">(Automatic Transmission Fluid)</span></div>
                <div class="desc-copy box-grey font14px" style="padding-top:20px;">Specially developed by Honda R&D for Honda Automatic Transmission</div>
                <div class="desc-copy box-white font14px" style="vertical-align: middle;line-height: 79px;">Superior Extended Maintenance Interval</div>
                <div class="desc-copy box-grey font14px" style="vertical-align: middle;line-height: 79px;">Reduced gear change shift shock</div>
                <div class="desc-copy box-white font14px" style="vertical-align: middle;line-height: 79px;">Anti-shudder stability</div>
                <div class="desc-copy box-grey font14px" style="vertical-align: middle;line-height: 79px;">Special anti foam properties</div>
                <div class="desc-copy box-white font14px" style="vertical-align: middle;line-height: 79px;">Offer seal compatibility</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="desc-copy bold box-white font14px" style="padding-top:10px;">Honda Genuine CVTF<br><span style="font-size:12px;">(Continuously Variable Transmission Fluid)</span></div>
                <div class="desc-copy box-grey font14px" style="padding-top:20px;">Specially developed by Honda R&D for Honda Automatic Transmission</div>
                <div class="desc-copy box-white font14px" style="vertical-align: middle;line-height: 79px;">Seizure resistance</div>
                <div class="desc-copy box-grey font14px" style="vertical-align: middle;line-height: 79px;">Effective wear prevention</div>
                <div class="desc-copy box-white font14px" style="vertical-align: middle;line-height: 79px;">Increased torque capacity</div>
                <div class="desc-copy box-grey font14px" style="vertical-align: middle;line-height: 79px;">Judder prevention (initial, life)</div>
                <div class="desc-copy box-white font14px" style="vertical-align: middle;line-height: 79px;">Improved gear durability</div>
            </div>
        </div>
        <div class="space"></div>

        <h2>Why Change Transmission Fluids Regularly</h2>
        <div class="desc-copy">It’s important to change your transmission fluids regularly as even genuine transmission fluids lose their effectiveness over time. The easiest way to do this is to visit your nearest Honda Authorised Dealer and let a trained technician change your transmission fluids. </div>
        

        
    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


