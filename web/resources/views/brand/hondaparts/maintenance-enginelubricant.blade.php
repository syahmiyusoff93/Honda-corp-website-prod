
@extends('layouts.base')


@section('content')

<style>

.one-img-size {
    width: calc(36% - 25px) !important;
}    

@media only screen and (max-width: 768px){
    .one-img-size {
        width: 65% !important;
    }
}
    

</style>


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
        <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Engine_Lubricant/gel_hero.jpg')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Genuine Engine Lubricant</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <div class="desc-copy">Honda Genuine Engine Oils are the only oils that are approved of its performance and quality by Honda Research & Development (R&D) Japan. Honda engine oils are specially formulated by Honda R&D to provide maximum protection and prolongs Honda engines’ lifespan. The oils contain safe cleaning additives. Adhering to regular maintenance schedule can keep the engine clean. Only Honda Genuine Oils can give you a peace of mind. </div>
        <div class="space"></div>

        <h2>Advantages of Honda Low Viscosity Engine Oil</h2>

        <div class="">
                <br>
                <div class="content-copy-no">01</div>
                <div class="desc-copy bold textalignleft marginleft55px">Maximises fuel economy</div><br>
                <div class="desc-copy textalignleft marginleft55px">Low Viscosity engine oil resists high temperature volatilisation (evaporation) better than other engine oils. Low Viscosity engine oil maintains peak fuel efficiency and reduces oil consumption and emissions.</div><br>
                <div class="content-copy-no">02</div>
                <div class="desc-copy bold textalignleft marginleft55px">Protects against wear</div><br>
                <div class="desc-copy textalignleft marginleft55px">Low Viscosity engine oil has better anti-wear performance than all other oils tested. With Low Viscosity engine oil, engine life can be extended and major repairs are often reduced.</div><br>
                <div class="content-copy-no">03</div>
                <div class="desc-copy bold textalignleft marginleft55px">Improved cold temperature start-up</div><br>
                <div class="desc-copy textalignleft marginleft55px">Low Viscosity engine oil helps engines turn over easier and flows quickly to engine parts for critical start-up protection. Engines starts faster and wear is greatly reduced for extended engine life.</div><br>
                <div class="content-copy-no">04</div>
                <div class="desc-copy bold textalignleft marginleft55px">Helps engines start easier</div><br>
                <div class="desc-copy textalignleft marginleft55px">The low crank viscosity of Low Viscosity engine oil reduces drag on moving engine parts and allows engines to achieve critical cranking speed in extremely frigid temperatures. Engines turn over quickly and dependably in the coldest winter temperatures.</div><br>
                <div class="content-copy-no">05</div>
                <div class="desc-copy bold textalignleft marginleft55px">Controls acid formation</div><br>
                <div class="desc-copy textalignleft marginleft55px">The high TBN of Low Viscosity engine oil allows it to effectively combat wear-causing contaminants and acids, providing superior protection and performance.</div>
        </div>
        <div class="space"></div>

        <h2>Real Life Test</h2>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc" style="padding: 10px;">
                <div class="desc-copy textalignleft bold">Main Bearing</div>
                <div class="hondaparts-boxrow">
                    <div class="hondaparts-box w50perc" style="padding: 17px 10px 17px 0px;">
                        <div class="img-sec img-sec-fullwidth">
                            <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Engine_Lubricant/MainBearing-1.png')}}" alt="">
                        </div>
                    </div>
                    <div class="hondaparts-box w50perc" style="padding: 17px 10px 17px 0px;">
                        <div class="desc-copy textalignleft bold font14px">Honda Genuine Oil</div>
                        <div class="desc-copy textalignleft font14px">Minimal abrasion and scratch marks.</div>
                    </div>
                </div>
                <div class="hondaparts-boxrow">
                    <div class="hondaparts-box w50perc" style="padding: 7px 10px 17px 0px;">
                        <div class="img-sec img-sec-fullwidth">
                            <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Engine_Lubricant/MainBearing-2.png')}}" alt="">
                        </div>
                    </div>
                    <div class="hondaparts-box w50perc" style="padding: 7px 10px 17px 0px;">
                        <div class="desc-copy textalignleft bold font14px redfont">Low quality market oil</div>
                        <div class="desc-copy textalignleft font14px">Excessive abrasion and scratch marks.</div>
                    </div>
                </div>
            </div>

            <div class="hondaparts-box w50perc" style="padding: 10px;">
                <div class="desc-copy textalignleft bold">Piston Case</div>
                <div class="hondaparts-boxrow">
                    <div class="hondaparts-box w50perc" style="padding: 17px 10px 17px 0px;">
                        <div class="img-sec img-sec-fullwidth">
                            <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Engine_Lubricant/PistonCase-1.png')}}" alt="">
                        </div>
                    </div>
                    <div class="hondaparts-box w50perc" style="padding: 17px 10px 17px 0px;">
                        <div class="desc-copy textalignleft bold font14px">Honda Genuine Oil</div>
                        <div class="desc-copy textalignleft font14px">Temperature of piston less carbon deposits.</div>
                    </div>
                </div>
                <div class="hondaparts-boxrow">
                    <div class="hondaparts-box w50perc" style="padding: 7px 10px 17px 0px;">
                        <div class="img-sec img-sec-fullwidth">
                            <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Engine_Lubricant/PistonCase-2.png')}}" alt="">
                        </div>
                    </div>
                    <div class="hondaparts-box w50perc" style="padding: 7px 10px 17px 0px;">
                        <div class="desc-copy textalignleft bold font14px redfont">Low quality market oil</div>
                        <div class="desc-copy textalignleft font14px">Temperature of piston more carbon deposits causes sludge and engine problems.</div>
                    </div>
                </div>
            </div>

            <div class="hondaparts-box w50perc" style="padding: 10px;">
                <div class="desc-copy textalignleft bold">Oil Seal</div>
                <div class="hondaparts-boxrow">
                    <div class="hondaparts-box w50perc" style="padding: 17px 10px 17px 0px;">
                        <div class="img-sec img-sec-fullwidth">
                            <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Engine_Lubricant/OilSeal-1.png')}}" alt="">
                        </div>
                    </div>
                    <div class="hondaparts-box w50perc" style="padding: 17px 10px 17px 0px;">
                        <div class="desc-copy textalignleft bold font14px">Honda Genuine Oil</div>
                        <div class="desc-copy textalignleft font14px">No damage as oil seal material and oil are matched.</div>
                    </div>
                </div>
                <div class="hondaparts-boxrow">
                    <div class="hondaparts-box w50perc" style="padding: 7px 10px 17px 0px;">
                        <div class="img-sec img-sec-fullwidth">
                            <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Engine_Lubricant/OilSeal-2.png')}}" alt="">
                        </div>
                    </div>
                    <div class="hondaparts-box w50perc" style="padding: 7px 10px 17px 0px;">
                        <div class="desc-copy textalignleft bold font14px redfont">Low quality market oil</div>
                        <div class="desc-copy textalignleft font14px">May cause damage due to unmatched material which leads to leaking.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="space"></div>

        <div class="img-sec img-sec-fullwidth centerdiv">
            <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Engine_Lubricant/GenuineEngineLubricant_Diagram.png')}}" alt="">
        </div>

        
    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


