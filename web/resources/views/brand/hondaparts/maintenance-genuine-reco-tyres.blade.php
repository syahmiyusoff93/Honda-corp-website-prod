
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
        <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/new/Tyre_HeroImage.jpg')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">GENUINE / RECOMMENDED TYRES</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Honda Genuine / Recommended Tyres</h2>
        <div class="desc-copy">Honda puts your safety first. That’s why we always ensure your tyres have sufficient tread depth for the best braking performance.</div>
        <div class="img-sec img-sec-fullwidth centerdiv">
            <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/new/Tyre_Graph.jpg')}}" alt="">
        </div>
        <div class="space"></div>

        <h2>Advantages of Honda Genuine / Recommended Tyres</h2>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/new/Icon/CompetitivePrice.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Competitive Pricing</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/new/Icon/Speedy.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Speedy Tyre Change</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/new/Icon/Trusted.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Trusted Brands</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/new/Icon/Certified.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Certified Technicians</div>
            </div>
        </div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box desktop">
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/new/Icon/Workmanship.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Honda-assured Workmanship</div>
            </div>
            <div class="hondaparts-box">
                <div class="img-sec img-sec-fullwidth centerdiv icon-box">
                    <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/new/Icon/Facilities.png')}}" alt="">
                </div>
                <div class="desc-copy font14px"><br>Comfortable Facilities While You Wait</div>
            </div>
        </div>
        <div class="space"></div>

        <h2>How to check the wear of your tyres</h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc" style="padding: 0px 0px;">
                <div class="img-sec img-sec-80prec centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Recommended_Tyres/new/Tyre_TreadWear.jpg')}}" alt="">
                </div>
            </div>
            <div class="hondaparts-box w50perc" style="padding: 20px 0px;">
                <div class="desc-copy textalignleft"><span style="color: #e01327;">•</span> Molded bars in the grooves of the tyre to show the tread depth.</div><br>
                <div class="desc-copy textalignleft"><span style="color: #e01327;">•</span> Bars will continue to surface as tyre wear increases.</div><br>
                <div class="desc-copy textalignleft"><span style="color: #e01327;">•</span> Change tyres at 3 mm - 1.6 mm (minimum legal tread depth).</div>
            </div>
        </div>

        
    <div class="space"></div>
</section>



@include('brand.hondaparts.hondaparts-style')

@stop


