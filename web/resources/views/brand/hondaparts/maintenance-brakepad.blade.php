
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
        <img src="{{url('img/hondaParts/03_Maintenance/Brake_Pad/brakepadsshoes.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">BRAKE PAD & SHOE</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Honda Genuine Brake Pad & Shoe</h2>
        <div class="desc-copy">Braking is resulted from the friction of a rotating disk being clamped by the brake pad. This friction will cause wear to the brake pad material.</div>
        <br><div class="desc-copy">However, as for the drum brake, brake shoe works as the friction component.</div>
        <br><div class="desc-copy">Honda has pursued thoroughly to achieve maximum braking performance from R&D stage, maintaining the best balance between braking force and durability.</div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Brake_Pad/brake_visual1.png')}}" alt="">
                </div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Brake_Pad/brake_visual2.png')}}" alt="">
                </div>
            </div>
        </div>
   
        <div class="space"></div>

        <h2>Advantages of Honda Genuine Brake Pad & Shoe</h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">01</div>
                <div class="desc-copy textalignleft marginleft55px">100% non-asbestos material is used for a safer environment.</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">02</div>
                <div class="desc-copy textalignleft marginleft55px">Well balanced between brake force and comfortable braking feel is achieved and tested with various temperature conditions.</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">03</div>
                <div class="desc-copy textalignleft marginleft55px">Superior fading resistance and controlled characteristics are integrated to Honda Genuine brake pad and brake shoe.</div>
            </div>
        </div>

    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


