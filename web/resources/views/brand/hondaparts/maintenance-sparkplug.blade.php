
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
    
    <div class="img-sec w20perc centerdiv">
        <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Spark_Plugs/spark-plug_Top.png')}}" alt="">
    </div>
    <h2 class="uppercase bold" style="margin-bottom:0;">Genuine Spark Plugs</h2>
    
    <div class="space"></div>
    <div class="line-breaker"></div>
    <div class="space"></div>
    
    
    <div class="maxwidth785">
        <h2>Honda Genuine Spark Plugs</h2>
        <div class="desc-copy">Honda genuine spark plugs are designed for the maximum performance of your engine and manufactured to stringent ISO / TS 16949 Quality System standards.</div>
        <div class="space"></div>

        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Spark_Plugs/IMG01.jpg')}}" alt="">
                </div>
                <div class="desc-copy textalignleft bold">Standard</div>
                <div class="desc-copy textalignleft">The workhorse, at the heart of smooth-running engines around the world</div><br>
                <div class="desc-copy textalignleft font14px">
                    <ul class="list">
                        <li>OEM quality</li><br>
                        <li>Consistent performance</li><br>
                        <li>Plug of choice in millions of vehicles</li>
                    </ul>
                </div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Spark_Plugs/IMG02.jpg')}}" alt="">
                </div>
                <div class="desc-copy textalignleft bold">Iridium</div>
                <div class="desc-copy textalignleft">The spark plug enthusiasts rely on</div><br>
                <div class="desc-copy textalignleft font14px">
                    <ul class="list">
                        <li>Fine iridium tip ensures high durability and consistently stable spark</li><br>
                        <li>Iridium alloy has extremely high melting point, suitable for high performance engines</li><br>
                        <li>Improved starting, ignitability and idling stability</li><br>
                        <li>Ultimate design, technology and performance</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="space"></div>

        <h2>Why Change Spark Plugs Regularly</h2>
        <div class="desc-copy">Replacing spark plugs regularly benefits the environment and helps you save fuel!</div>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="desc-copy textalignleft bold">Power Loss</div>
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Spark_Plugs/PowerLoss.png')}}" alt="">
                </div>
                <div class="desc-copy textalignleft font14px">Cause of poor fuel consumption</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="desc-copy textalignleft bold">Decrease in Torque</div>
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Spark_Plugs/DecreaseinTorque.png')}}" alt="">
                </div>
            </div>
        </div>
        <div class="hondaparts-boxrow">
            <div class="hondaparts-box w50perc">
                <div class="desc-copy textalignleft bold">Spark plug ignition <span style="white-space:nowrap;">(standard spark plug)</span></div>
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Spark_Plugs/Sparkplugignition_Used.png')}}" alt="">
                </div>
                <div class="desc-copy textalignleft font14px">Worn electrodes and carbon deposits on firing ends are major causes of side sparking</div>
            </div>
            <div class="hondaparts-box w50perc">
                <div class="desc-copy h50"></div>
                <div class="img-sec img-sec-fullwidth centerdiv">
                    <img src="{{url('img/hondaParts/03_Maintenance/Genuine_Spark_Plugs/Sparkplugignition_New.png')}}" alt="">
                </div>
                <div class="desc-copy textalignleft font14px">With new plugs, the spark jumps straight!</div>
            </div>
        </div>
        

        
    <div class="space"></div>
</section>


@include('brand.hondaparts.hondaparts-style')

@stop


