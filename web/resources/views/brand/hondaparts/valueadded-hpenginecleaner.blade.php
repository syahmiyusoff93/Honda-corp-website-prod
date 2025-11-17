
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
    
    <div class="img-sec w10perc centerdiv">
        <img src="{{url('img/hondaParts/04_ValueAdded/High_Performance_Engine_Cleaner/HighPerformanceEngineCleaner_Top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;"><span style="text-transform: none">Honda</span> High Performance Engine Cleaner</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Advantages of Honda High Performance Engine Cleaner </h2>
        <div class="desc-copy">Cleans the entire fuel system and restores lost power and performance caused by carbon deposits that have built up in the engine.</div>
        <br>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">01</div>
                <div class="desc-copy textalignleft marginleft55px fontw500">Lowers fuel consumption</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">02</div>
                <div class="desc-copy textalignleft marginleft55px fontw500">Increases engine power</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">03</div>
                <div class="desc-copy textalignleft marginleft55px fontw500">Improves starting ability</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">04</div>
                <div class="desc-copy textalignleft marginleft55px fontw500">Reduces engine knocking</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="content-copy-no">05</div>
                <div class="desc-copy textalignleft marginleft55px fontw500">Cleans and protects fuel injector including exhaust valves</div>
            </div>
        </div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="hondaparts-boxrow">
                    <div class="hondaparts-box w50perc">
                        <div class="img-sec img-sec-fullwidth centerdiv">
                            <img src="{{url('img/hondaParts/04_ValueAdded/High_Performance_Engine_Cleaner/01_Before.png')}}" alt="">
                        </div>
                        <div class="desc-copy textalignleft bold">Before</div>
                        <div class="desc-copy textalignleft">Heavy carbon deposits on the intake valve</div>
                    </div>
                    <div class="hondaparts-box w50perc">
                        <div class="img-sec img-sec-fullwidth centerdiv">
                            <img src="{{url('img/hondaParts/04_ValueAdded/High_Performance_Engine_Cleaner/01_After.png')}}" alt="">
                        </div>
                        <div class="desc-copy textalignleft bold redfont">After</div>
                        <div class="desc-copy textalignleft">Carbon deposit is minimised on the intake valve</div>
                    </div>
                </div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="hondaparts-boxrow">
                    <div class="hondaparts-box w50perc">
                        <div class="img-sec img-sec-fullwidth centerdiv">
                            <img src="{{url('img/hondaParts/04_ValueAdded/High_Performance_Engine_Cleaner/02_Before.png')}}" alt="">
                        </div>
                        <div class="desc-copy textalignleft bold">Before</div>
                        <div class="desc-copy textalignleft">Deposits on the combustion chamber increase engine knocking</div>
                    </div>
                    <div class="hondaparts-box w50perc">
                        <div class="img-sec img-sec-fullwidth centerdiv">
                            <img src="{{url('img/hondaParts/04_ValueAdded/High_Performance_Engine_Cleaner/02_After.png')}}" alt="">
                        </div>
                        <div class="desc-copy textalignleft bold redfont">After</div>
                        <div class="desc-copy textalignleft">A clean combustion chamber decreases engine knocking</div>
                    </div>
                </div>
            </div>

            <div class="hondaparts-box w50perc">
                <div class="hondaparts-boxrow">
                    <div class="hondaparts-box w50perc">
                        <div class="img-sec img-sec-fullwidth centerdiv">
                            <img src="{{url('img/hondaParts/04_ValueAdded/High_Performance_Engine_Cleaner/03_Before.png')}}" alt="">
                        </div>
                        <div class="desc-copy textalignleft bold">Before</div>
                        <div class="desc-copy textalignleft">A clogged fuel injector results in decreased performance and poor fuel economy</div>
                    </div>
                    <div class="hondaparts-box w50perc">
                        <div class="img-sec img-sec-fullwidth centerdiv">
                            <img src="{{url('img/hondaParts/04_ValueAdded/High_Performance_Engine_Cleaner/03_After.png')}}" alt="">
                        </div>
                        <div class="desc-copy textalignleft bold redfont">After</div>
                        <div class="desc-copy textalignleft">A clean fuel injector delivers the correct spray pattern that is essential for clean, efficient combustion</div>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="desc-copy bold">Directions:</div>
        <div class="desc-copy">Top up every 5,000km into fuel tank</div>

    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


