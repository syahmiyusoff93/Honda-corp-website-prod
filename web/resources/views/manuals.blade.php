@php
$APIPATH = config('global.APIPATH');
$honda_api_context = config('global.APICONTEXT');

$data = file_get_contents($APIPATH.'maintenance.json', false, $honda_api_context);
$data = json_decode($data);

$allmaintenance = $data->payload;

function cmp__($a, $b) {
    return strcmp($a->variant, $b->variant);
}

usort($allmaintenance, "cmp__");

$curvariantlist = [];
$cleanedvariant = [];
foreach ($allmaintenance as $key => $value) {
    if(!in_array($value->variant, $curvariantlist)){
        $cleanedvariant[] = $value;
        $curvariantlist[] = $value->variant;
    }
}

$_allmodel['accord'] = 'ACCORD';
$_allmodel['brv'] = 'BR-V';
$_allmodel['city'] = 'CITY';
$_allmodel['city-hb'] = 'CITY HATCHBACK';
$_allmodel['civic'] = 'CIVIC';
$_allmodel['crv'] = 'CR-V';
$_allmodel['en1'] = 'e:N1';
$_allmodel['hrv'] = 'HR-V';
$_allmodel['jazz'] = 'JAZZ';
$_allmodel['odyssey'] = 'ODYSSEY';
$_allmodel['type-r'] = 'TYPE R';
$_allmodel['wrv'] = 'WR-V';


// MANUALS ITEM REGROUPING - 20210610
$ym_item = [];


@endphp

@extends('layouts.base')

@section('page-title')
    Owners Manual
@stop

@section('content')

<style>

.dont-know-vin {
    font-size: 14px;
    color: #cc0000;
    margin-right: 10px;
    margin-bottom: 0px;
    margin-top: -5px;
    cursor: pointer;
    text-align: right;
    float: right;
}



 .not-required, .howto {
    position: absolute;
    width: 80%;
    height: auto;
    margin: auto;
    left: 0;
    right: 0;
    top: 20%;
    bottom: 0;
    text-align: left;
    display: none;
    max-width: 768px;
}

.not-title, .howto-title {
    background: #cc0000;
    color: white;
    padding: 10px 20px;
    -webkit-border-top-left-radius: 8px;
    -webkit-border-top-right-radius: 8px;
    -moz-border-radius-topleft: 8px;
    -moz-border-radius-topright: 8px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.not-title h3, .howto-title h3 {
    margin: 0;
    font-size: 12px;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}

.howto-content {
    overflow-y: hidden
    height: auto;
    
}

.howto-content {
    background: white;
    padding: 20px;
    -webkit-border-bottom-right-radius: 8px;
    -webkit-border-bottom-left-radius: 8px;
    -moz-border-radius-bottomright: 8px;
    -moz-border-radius-bottomleft: 8px;
    border-bottom-right-radius: 8px;
    border-bottom-left-radius: 8px;
}


.howto-content p {
    margin: 0;
    text-align: left;
    font-size: 14px;
   
}


.howto-title a {
    right: 0;
    text-align: right;
    position: absolute;
    top: 0;
    margin: 7px 20px;
    color: white;
}



.vin-instruct {
    margin-top: 20px;
    margin-right: 20px;
    width: 100%;
    height: 100%;
    background: url(../img/aftersales/vin-popup.png) no-repeat center top;
    background-size: cover;
    min-height: 580px;
}


.not-required-bg {
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    background: rgba(0, 0, 0, 0.6);
    z-index: 0;
    display: none;
    top: 0;
    left: 0;
}

.dont-know-vin-container {

    float: left;
    position: relative;
    height: 100px;
    vertical-align: middle;
}

.dont-know-vin {
     font-size: 14px;
    color: #cc0000;
    margin-right: 10px;
    margin-bottom: 0px;
    cursor: pointer;
    text-align: right;
    float: left;
    line-height: 0px;
    margin-top: 0px;
    top: 50%;
    filter: drop-shadow(3px 3px 4px rgba(0,0,0,.2));
}

.connectsidebar {
     height: 100%;
    position: absolute;
    /*width: 110px;*/
    background: red;
    top: 0px;
    right: 0px;
    width: 0px;
    transition: all 200ms ease-out;
    overflow: hidden;
}
.connectsidebar.green-bg {
    background: green !important;
}
.connectsidebar.orange-bg {
    background: #BE5014 !important;
}

.download-section li {
    transition: all 200ms ease-out !important;
}


.download-section .withconnect:hover {
    width: calc(25% - 12px + 150px) !important;
    padding-right: 150px !important;
}

.download-section .withconnect:hover img {
    opacity: 1;
}

.download-section .withconnect:hover > .connectsidebar {
    width: 150px !important;

}

.connectsidebar > div:nth-child(1) {
    background: #013dad;
}

.connectsidebar.e-booklet-two-btn > div:nth-child(1) {
    background: #e01327 !important;
    display: flex !important;
    justify-content: center;
    align-items: center;
}

.connectsidebar > div:nth-child(2) {
    background: #e01327;
}

.connectsidebar.e-booklet-two-btn > div:nth-child(2) {
    background: #BE5014 !important;
    display: flex !important;
    justify-content: center;
    align-items: center;
    height: 52%;
}

.connectsidebar > div:nth-child(3) {
    background-color: green;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 34%;
    padding: 0px 10px;
    text-align: center;
}
.connectsidebar.e-booklet > div:nth-child(3) {
    background-color: #BE5014;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 34%;
    padding: 0px 10px;
    text-align: center;
}
.connectsidebar > div:nth-child(3).four-btn-height {
    height: 26%;
}
.connectsidebar > div:nth-child(4) {
    background-color: #BE5014;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 26%;
    padding: 0px 10px;
    text-align: center;
}

.three-btn-display{
    display: flex;
    justify-content: center;
    align-items: center;
}
.four-btn-display{
    display: flex !important;
    justify-content: center;
    align-items: center;
}

.connectsidebar > div:nth-child(1) img {
     transition-delay: 200ms;

     /* width: 92px;
     height: 45px; */
}

.connectsidebar.e-booklet-two-btn > div:nth-child(1) img {
    width: 91%;
}


.connectsidebar > div:nth-child(2) img {
     transition-delay: 400ms;

     /* width: 92px;
     height: 45px; */
}
.connectsidebar.e-booklet-two-btn > div:nth-child(2) a {
    color: #FFFF !important;
    font-size: 15px !important;
    padding: 4% 0;

    display: flex;
    justify-content: center;
    align-items: center;
}

.connectsidebar > div:nth-child(3) a {
    font-size: 12px !important;
    padding-bottom: 3px;
    color: #ffffff !important;
    font-weight: 500;

    transition-delay: 600ms;
}
.connectsidebar.e-booklet > div:nth-child(3) a {
    font-size: 12px !important;
    padding-bottom: 3px;
    color: #ffffff !important;
    font-weight: 500;

    transition-delay: 600ms;
}
.connectsidebar > div:nth-child(4) a {
    font-size: 12px !important;
    padding-bottom: 3px;
    color: #FFFF !important;
    font-weight: 500;

    transition-delay: 800ms;
}

.withconnect > .connectsidebar > div > img {
    opacity: 0;
    display: block;
    transition: opacity 200ms linear;
    width: 150px;height: 72px;
}

.connectbadge {
    position: absolute;
    top: 0px;
    left: 0px;
}

.maintenance-container .mt-section ul.download-section li.custom-style{
    border-bottom: unset !important;
}
.maintenance-container .mt-section ul.download-section li.custom-style-four-btn{
    height: 164px;
}

.car-info{
    height: 116%;
    border-bottom: 2px solid #e01327;
}
.car-info-four-btn{
    height: 113%;
    border-bottom: 2px solid #e01327;
}

.red-line{
    border-bottom: 2px solid #e01327;
    width: 100%;
    position: absolute;
    left: 0;
    bottom: 0;
    display: none;
}

@media only screen and (min-width: 576px) {
    .three-btn-img-size{
        width: 92px;
        height: 45px;
    }

    .four-btn-img-size {
        width: 85px;
        height: 37px;
    }

    .car-info-two-btn{
        height: 115% !important;
    }

    .connectsidebar > div:nth-child(3) a.four-btn-text {
        font-size: 12px !important;
    }
}

@media only screen and (max-width: 575px) {
    .red-line{
        display: block;
    }

    .connectsidebar > div:nth-child(3) {
        height: 35%;
    }

    .car-info{
        height: unset;
        border-bottom: unset;
        width: 100%;
        /* padding-top: 36px; */
        padding-top: 12px;
    }

    .maintenance-container .mt-section ul.download-section li.custom-style{
        border-bottom: unset;
        /* border-bottom: 2px solid #e01327 !important; */
    }

    .maintenance-container .mt-section ul.download-section li.custom-style .connectsidebar{
        z-index: 1;
    }
    .three-btn-overall-container-mobile{
        height: 169px;
    }
    .download-section .withconnect {
        min-height: 105px;
        padding-top: 40px !important;
    }

    .download-section .withconnect:hover {
        width: 100% !important;
        padding-right: 120px !important;
    }
    .download-section .withconnect:hover > .connectsidebar {
        width: 105px !important;
    }
    .download-section .withconnect:hover img {
        width: 100%;
    }

    .four-btn-img-size {
        width: 75% !important;
    }

    .car-info-four-btn{
        border-bottom: unset;
        width: 100%;
    }

    .connectsidebar > div:nth-child(3) a {
        font-size: 8px !important;
    }
    .connectsidebar > div:nth-child(4) a {
        font-size: 8px !important;
    }
    .car-info-two-btn{
        padding-top: 0;
        margin-top: -15px;
    }
    .maintenance-container .mt-section ul.download-section li.custom-style-two-btn{
        height: unset;
    }

    .connectsidebar.e-booklet-two-btn > div:nth-child(2) a {
        font-size: 10px !important;
    }

    .connectsidebar.e-booklet-two-btn > div:nth-child(1) img {
        width: 95%;
    }

}

@media (max-width: 420px) and (orientation: portrait) {
    .vin-instruct {
        min-height: 33vh;
    }

    .howto-content {
        overflow-y: hidden height: auto;
        max-height: 100vh;
    }


}


</style>

<div class="body-wrapper">
<section class="service-tab-menu" style="height: 0px !important;">
    <div class="clearfix"></div>
</section>
<section class="maintenance-inner innerpage" style="margin-top: -130px;">
    <div class="inner-container">
        <div class="intro extrapadding" style="padding-top: 130px !important;">
            <h2 style="text-transform:capitalize;">GET TO KNOW YOUR Honda</h2>
            <div class="intro-title grey">Access your Honda owner’s manual at anytime within easy reach.</div>
        </div>

        <div class="stage-contained maintenance-container">
            <div class="mt-section">

                <div class="mt-item js-model-dd" style="float:left">
                    <div class="select-title">MODEL</div>
                    <div class="outline-drop">
                        <div class="dropdown-select" data-toggle="model">
                            <div class="dropdown-box"><span class="btn select-copy">Select a model</span>   <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span></div>
                            <ul class="dropdown-menu" data-toggle="model" style="display: none;">

                                @foreach ($_allmodel as $slug=>$item)
                                    {{-- <li data-mslug="{{ $slug }}">{{ strtoupper($item) }}</li> --}}
                                    @if ($slug == 'en1')
                                    <li data-mslug="{{ $slug }}">e:N1</li>
                                    @else
                                    <li data-mslug="{{ $slug }}">{{ strtoupper($item) }}</li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dont-know-vin-container"><a href="javascript:;" class="dont-know-vin"><img src="img/aftersales/vin-button.png" style="max-width: 100%;"></a></div><div style="clear:both"></div>



            </div>

             <!-- Accord -->
             <div class="mt-section js-pdflist js-list-accord">
                        {{-- <div class="select-title">2020-Current</div> --}}
                        <div class="select-title">2020-2023</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/ACCORD 2020-Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">ACCORD</div>
                                        <div class="year">Model Code : CV1</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">ACCORD</div>
                                            <div class="year">Model Code : CV1</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/ACCORD 2020-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Grey (Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                        </ul>
                        <div class="select-title">2016-2020</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/ACCORD 2016-2020.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">ACCORD</div>
                                        <div class="year">Model Code : CR1/CR2</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">ACCORD</div>
                                            <div class="year">Model Code : CR1/CR2</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/ACCORD 2020-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Grey (Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                               
                        </ul>
                        
                        
             </div>
            
              <!-- BR-V -->
             <div class="mt-section js-pdflist js-list-brv">
                        {{-- <div class="select-title">2020-Current</div> --}}
                        <div class="select-title">2020-2023</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/BR-V 2020-Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">BR-V</div>
                                        <div class="year">Model Code : DG1</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">BR-V</div>
                                            <div class="year">Model Code : DG1</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/BR-V 2020-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                        </ul>
             </div>
              
               <!-- City -->
              <div class="mt-section js-pdflist js-list-city">
                        <div class="select-title">2024-Current</div>
                        <ul class="download-section ">
                            {{-- <li class="withconnect three-btn-overall-container-mobile custom-style">
                                <div class="car-info">
                                    <a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                        <div class="year">Model Code : GN2</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                </div>
                                <div class="connectsidebar">
                                    <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div> --}}
                                    {{-- <div><a href="/pdf/connect/Honda Connect Dealer Operation Manual Version 1.0.1 - GN2.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div> --}}
                                    {{-- <div class="three-btn-display"><a href="/manuals/42T00R300_web-City 1.5 Owner's Manual.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                    <div><a href="/manuals/dummies.pdf"  target="_blank">Google Automotive Services</a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                <div class="red-line"></div>
                            </li> --}}
                            <li class="withconnect three-btn-overall-container-mobile custom-style">
                                <div class="car-info">
                                    <a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                        <div class="year">Model Code : GN2</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                </div>
                                <div class="connectsidebar e-booklet orange-bg">
                                    <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                    <div class="three-btn-display"><a href="/manuals/42T00R300_web-City 1.5 Owner's Manual.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                    <div><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                <div class="red-line"></div>
                            </li>
                            {{-- Original --}}
                            {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                    <div class="year">Model Code : GN2</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                                <div class="connectsidebar">
                                    <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                    <div><a href="/manuals/42T00R300_web-City 1.5 Owner's Manual.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            </li> --}}
                            {{-- Original --}}

                            {{-- <li><a href="/manuals/42T00R300_web-City 1.5 Owner's Manual.pdf" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                    <div class="year">Model Code : GN2</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                                
                            </li> --}}
                            
                            {{-- <li class="withconnect three-btn-overall-container-mobile custom-style">
                                <div class="car-info">
                                    <a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY Hybrid</div>
                                        <div class="year">Model Code : GN3</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                </div>
                                <div class="connectsidebar">
                                    <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div> --}}
                                    {{-- <div><a href="/pdf/connect/Honda_CONNECT_User_Manual_Version1.0.1.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div> --}}
                                    {{-- <div class="three-btn-display"><a href="/manuals/42T03T300_web-City 1.5 eHEV Owner's Manual.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                    <div><a href="/manuals/dummies.pdf"  target="_blank">Google Automotive Services</a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                <div class="red-line"></div>
                            </li> --}}

                            <li class="withconnect three-btn-overall-container-mobile custom-style">
                                <div class="car-info">
                                    <a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY Hybrid</div>
                                        <div class="year">Model Code : GN3</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                </div>
                                <div class="connectsidebar e-booklet orange-bg">
                                    <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                    <div class="three-btn-display"><a href="/manuals/42T03T300_web-City 1.5 eHEV Owner's Manual.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                    <div><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                <div class="red-line"></div>
                            </li>
                            {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY Hybrid</div>
                                    <div class="year">Model Code : GN3</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                                <div class="connectsidebar">
                                    <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                    <div><a href="/manuals/42T03T300_web-City 1.5 eHEV Owner's Manual.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            </li> --}}
                        </ul>
                        {{-- <ul class="download-section ">
                                <li><a href="/manuals/42T00R300_web-City 1.5 Owner's Manual.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                        <div class="year">Model Code : GN2</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    
                                </li>
                                <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY Hybrid</div>
                                        <div class="year">Model Code : GN3</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    <div class="connectsidebar">
                                        <div><a href="/pdf/connect/Honda_CONNECT_User_Manual_Version1.0.1.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                        <div><a href="/manuals/42T03T300_web-City 1.5 eHEV Owner's Manual.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                </li>
                        </ul> --}}
                        <div class="select-title">2022-2023</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/CITY 2022-Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                        <div class="year">Model Code : GN2</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    
                                </li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                            <div class="year">Model Code : GN2</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/CITY 2022-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>

                                {{-- <li class="withconnect three-btn-overall-container-mobile custom-style">
                                    <div class="car-info">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY Hybrid</div>
                                            <div class="year">Model Code : GN3</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar">
                                        <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div> --}}
                                        {{-- <div><a href="/pdf/connect/Honda_CONNECT_User_Manual_Version1.0.1.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div> --}}
                                        {{-- <div class="three-btn-display"><a href="/manuals/CITY Hybrid 2022-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                        <div><a href="/manuals/dummies.pdf"  target="_blank">Google Automotive Services</a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                    <div class="red-line"></div>
                                </li> --}}

                                <li class="withconnect three-btn-overall-container-mobile custom-style">
                                    <div class="car-info">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY Hybrid</div>
                                            <div class="year">Model Code : GN3</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet orange-bg">
                                        <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                        <div class="three-btn-display"><a href="/manuals/CITY Hybrid 2022-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                    <div class="red-line"></div>
                                </li>
                                {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY Hybrid</div>
                                        <div class="year">Model Code : GN3</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    <div class="connectsidebar">
                                        <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                        <div><a href="/manuals/CITY Hybrid 2022-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                </li> --}}
                        </ul>
                        <div class="select-title">2021-2022</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/CITY 2021-2022.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                        <div class="year">Model Code : GN2</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    
                                </li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                            <div class="year">Model Code : GN2</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/CITY 2021-2022.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>

                                {{-- <li class="withconnect three-btn-overall-container-mobile custom-style">
                                    <div class="car-info">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY Hybrid</div>
                                            <div class="year">Model Code : GN3</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar">
                                        <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div> --}}
                                        {{-- <div><a href="/pdf/connect/Honda_CONNECT_User_Manual_Version1.0.1.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div> --}}
                                        {{-- <div class="three-btn-display"><a href="/manuals/CITY Hybrid 2021-2022.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                        <div><a href="/manuals/dummies.pdf"  target="_blank">Google Automotive Services</a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                    <div class="red-line"></div>
                                </li> --}}

                                <li class="withconnect three-btn-overall-container-mobile custom-style">
                                    <div class="car-info">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                            <div class="year">Model Code : GN3</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet orange-bg">
                                        <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                        <div class="three-btn-display"><a href="/manuals/CITY Hybrid 2021-2022.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                    <div class="red-line"></div>
                                </li>
                                {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY Hybrid</div>
                                        <div class="year">Model Code : GN3</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    <div class="connectsidebar">
                                        <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                        <div><a href="/manuals/manuals/CITY Hybrid 2021-2022.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                </li> --}}
                        </ul>
                        <div class="select-title">2018-2021</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/CITY Hybrid 2018-2021.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY Hybrid</div>
                                        <div class="year">Model Code : GM7</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    
                                </li> --}}

                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                            <div class="year">Model Code : GM7</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/CITY Hybrid 2018-2021.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                        </ul>
                        <div class="select-title">2017-2021</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/CITY 2017-2021.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                        <div class="year">Model Code : GM6</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                   
                                </li> --}}

                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY</div>
                                            <div class="year">Model Code : GM6</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/CITY 2017-2021.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                            
                        </ul>
              </div>

              <!-- City Hatchback -->
              <div class="mt-section js-pdflist js-list-city-hb">
                        <div class="select-title">2024-Current</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/423P2T200_web.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY HATCHBACK</div>
                                        <div class="year">Model Code : GN5</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    
                                </li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY HATCHBACK</div>
                                            <div class="year">Model Code : GN5</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/423P2T200_web.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>

                                {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY HATCHBACK Hybrid</div>
                                        <div class="year">Model Code : GN6</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    <div class="connectsidebar">
                                        <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                        <div><a href="/manuals/423P3T200_web.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                </li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style">
                                    <div class="car-info">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY HATCHBACK Hybrid</div>
                                            <div class="year">Model Code : GN6</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet orange-bg">
                                        <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                        <div class="three-btn-display"><a href="/manuals/423P3T200_web.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                        <div><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                    <div class="red-line"></div>
                                </li>
                        </ul>
                        {{-- <div class="select-title">2022-Current</div> --}}
                        <div class="select-title">2022-2023</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/423P2R100_CITY HATCHBACK_GN5_final_web.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY HATCHBACK</div>
                                        <div class="year">Model Code : GN5</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    
                                </li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY HATCHBACK</div>
                                            <div class="year">Model Code : GN5</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/423P2R100_CITY HATCHBACK_GN5_final_web.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>

                                {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY HATCHBACK Hybrid</div>
                                        <div class="year">Model Code : GN6</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    <div class="connectsidebar">
                                        <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                        <div><a href="/manuals/CITY 2022 Hybrid 2022.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                </li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style">
                                    <div class="car-info">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CITY HATCHBACK Hybrid</div>
                                            <div class="year">Model Code : GN6</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet orange-bg">
                                        <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                        <div class="three-btn-display"><a href="/manuals/CITY 2022 Hybrid 2022.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                    <div class="red-line"></div>
                                </li>
                        </ul>
              </div>
            
              <!-- Civic -->
              <div class="mt-section js-pdflist js-list-civic">
                <div class="select-title">2025-Current</div>
                    <ul class="download-section ">
                        <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-four-btn">
                            <div class="car-info-four-btn">
                                <a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC</div>
                                    <div class="year">Model Code : FE1</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                            </div>
                            <div class="connectsidebar green-bg">
                                <div class="four-btn-display"><a href="/pdf/connect/Doc_1_23M_Apps_User_Manual.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="four-btn-img-size" ></a></div>
                                <div class="four-btn-display"><a href="/manuals/civic-petrol-2025.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="four-btn-img-size" ></a></div>
                                <div class="four-btn-height four-btn-display"><a href="/pdf/Google Automotive Services (GAS)_Manual.pdf"  target="_blank" class="four-btn-text">Google Automotive Services</a></div>
                                <div class="four-btn-display"><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                            </div>
                            <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            <div class="red-line"></div>
                        </li>
                        <li class="withconnect three-btn-overall-container-mobile custom-style">
                            <div class="car-info-four-btn">
                                <a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC e:HEV RS</div>
                                    <div class="year">Model Code : FE4</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                            </div>
                            <div class="connectsidebar green-bg">
                                <div class="four-btn-display"><a href="/pdf/connect/Doc_1_23M_Apps_User_Manual.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="four-btn-img-size" ></a></div>
                                <div class="four-btn-display"><a href="/manuals/civic-hev-2025.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="four-btn-img-size" ></a></div>
                                <div class="four-btn-height four-btn-display"><a href="/pdf/Google Automotive Services (GAS)_Manual.pdf"  target="_blank" class="four-btn-text">Google Automotive Services</a></div>
                                <div class="four-btn-display"><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                            </div>
                            <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            <div class="red-line"></div>
                        </li>
                    </ul>
                    {{-- <div class="select-title">2023-Current</div> --}}
                    <div class="select-title">2023-2024</div>
                    <ul class="download-section ">
                        <li class="withconnect three-btn-overall-container-mobile custom-style">
                            <div class="car-info">
                                <a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC e:HEV RS</div>
                                    <div class="year">Model Code : FE4</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                            </div>
                            <div class="connectsidebar e-booklet orange-bg">
                                <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                <div class="three-btn-display"><a href="/manuals/civic-fe4-210923.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                <div><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                            </div>
                            <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            <div class="red-line"></div>
                        </li>
                        {{-- <li class="withconnect three-btn-overall-container-mobile custom-style">
                            <div class="car-info">
                                <a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC e:HEV RS</div>
                                    <div class="year">Model Code : FE4</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                            </div>
                            <div class="connectsidebar green-bg">
                                <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                <div class="three-btn-display"><a href="/manuals/civic-fe4-210923.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                <div><a href="/pdf/Google Automotive Services (GAS)_Manual.pdf"  target="_blank">Google Automotive Services</a></div>
                            </div>
                            <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            <div class="red-line"></div>
                        </li> --}}
                    </ul>
                    {{-- <div class="select-title">2022-Current</div> --}}
                    <div class="select-title">2022-2023</div>
                    <ul class="download-section ">
                        {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC</div>
                                <div class="year">Model Code : FE1</div>
                                <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                            </a>
                            <div class="connectsidebar">
                                <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                <div><a href="/manuals/42T20T031_CIVIC FE1_web.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                            </div>
                            <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                        </li> --}}

                        <li class="withconnect three-btn-overall-container-mobile custom-style">
                            <div class="car-info">
                                <a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC</div>
                                    <div class="year">Model Code : FE1</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                            </div>
                            <div class="connectsidebar e-booklet orange-bg">
                                <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                <div class="three-btn-display"><a href="/manuals/42T20T031_CIVIC FE1_web.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                <div><a href="/pdf/20250217_DSD_Half Grey (Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                            </div>
                            <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            <div class="red-line"></div>
                        </li>

                        {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC e:HEV RS</div>
                                <div class="year">Model Code : FE4</div>
                                <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                            </a>
                            <div class="connectsidebar">
                                <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                <div><a href="/manuals/Civic HEV 2022-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                            </div>
                            <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                        </li> --}}

                        <li class="withconnect three-btn-overall-container-mobile custom-style">
                            <div class="car-info">
                                <a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC e:HEV RS</div>
                                    <div class="year">Model Code : FE4</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                            </div>
                            <div class="connectsidebar e-booklet orange-bg">
                                <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                <div class="three-btn-display"><a href="/manuals/Civic HEV 2022-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                            </div>
                            <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            <div class="red-line"></div>
                        </li>
                    </ul>
                    <div class="select-title">2016-2021</div>
                    <ul class="download-section ">
                        {{-- <li><a href="/manuals/CIVIC 2016-Current.pdf" target="_blank">
                                <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC</div>
                                <div class="year">Model Code : FC1/FC6</div>
                                <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                        </a></li> --}}
                        <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                            <div class="car-info car-info-two-btn">
                                <a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC</div>
                                    <div class="year">Model Code : FC1/FC6</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                            </div>
                            <div class="connectsidebar e-booklet-two-btn orange-bg">
                                <div><a href="/manuals/CIVIC 2016-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                            </div>
                            <div class="red-line"></div>
                        </li>
                    </ul>
             </div>
            
              <!-- CR-V -->
              <div class="mt-section js-pdflist js-list-crv">
                        {{-- <div class="select-title">2024-Current</div> --}}
                        <div class="select-title">2023-2024</div>
                        <ul class="download-section ">
                            {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CR-V</div>
                                    <div class="year">Model Code : RS3/RS4</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                                <div class="connectsidebar">
                                    <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                    <div><a href="/manuals/423A0T040_CR-V_Pet.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            </li> --}}
                            <li class="withconnect three-btn-overall-container-mobile custom-style">
                                <div class="car-info">
                                    <a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CR-V</div>
                                        <div class="year">Model Code : RS3/RS4</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                </div>
                                <div class="connectsidebar e-booklet orange-bg">
                                    <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                    <div class="three-btn-display"><a href="/manuals/423A0T040_CR-V_Pet.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                    <div><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                <div class="red-line"></div>
                            </li>

                            {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CR-V e:HEV RS</div>
                                    <div class="year">Model Code : RS5</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                                <div class="connectsidebar">
                                    <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                    <div><a href="/manuals/423D4T030_CR-V_HEV.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            </li> --}}
                            <li class="withconnect three-btn-overall-container-mobile custom-style">
                                <div class="car-info">
                                    <a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CR-V e:HEV RS</div>
                                        <div class="year">Model Code : RS5</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                </div>
                                <div class="connectsidebar e-booklet orange-bg">
                                    <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                    <div class="three-btn-display"><a href="/manuals/423D4T030_CR-V_HEV.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                    <div><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                <div class="red-line"></div>
                            </li>
                        </ul>
                        {{-- <div class="select-title">2017-Current</div> --}}
                        <div class="select-title">2017-2023</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/CR-V 2017-Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CR-V</div>
                                        <div class="year">Model Code : RW</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CR-V</div>
                                            <div class="year">Model Code : RW</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/CR-V 2017-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Grey (Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                        </ul>
               </div>
            
               <!-- HR-V -->
              <div class="mt-section js-pdflist js-list-hrv">
                        <div class="select-title">2025-Current</div>
                        <ul class="download-section ">
                                {{-- <li class="withconnect"><a href="/manuals/HRV 2022- Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V</div>
                                        <div class="year">Model Code : RV3</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V</div>
                                            <div class="year">Model Code : RV3</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet orange-bg">
                                        <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                        <div class="three-btn-display"><a href="/manuals/423M06320_web.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png"  class="three-btn-img-size"></a></div>
                                        <div><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                    <div class="red-line"></div>
                                </li>

                                {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V Hybrid</div>
                                        <div class="year">Model Code : RV5</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    <div class="connectsidebar">
                                        <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                        <div><a href="/manuals/HRV Hybrid 2022-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                </li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style">
                                    <div class="car-info">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V Hybrid</div>
                                            <div class="year">Model Code : RV5</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet orange-bg">
                                        <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                        <div class="three-btn-display"><a href="/manuals/423N06220_web.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                        <div><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                    <div class="red-line"></div>
                                </li>
                                 
                        </ul>
                        <div class="select-title">2022-2025</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/HRV 2022- Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V</div>
                                        <div class="year">Model Code : RV3</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V</div>
                                            <div class="year">Model Code : RV3</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/HRV 2022- Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Grey (Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>

                                {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V Hybrid</div>
                                        <div class="year">Model Code : RV5</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                    <div class="connectsidebar">
                                        <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                        <div><a href="/manuals/HRV Hybrid 2022-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                </li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style">
                                    <div class="car-info">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V Hybrid</div>
                                            <div class="year">Model Code : RV5</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet orange-bg">
                                        <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                        <div class="three-btn-display"><a href="/manuals/HRV Hybrid 2022-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                        <div><a href="/pdf/Rev1 Unification WSB Digitalization Format Combine BROWN Final.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                    <div class="red-line"></div>
                                </li>
                                 
                        </ul>
                        {{-- <div class="select-title">2020-Current</div> --}}
                        <div class="select-title">2020-2021</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/HR-V Hybrid 2020-Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V Hybrid</div>
                                        <div class="year">Model Code : RU3</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}
                            
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V Hybrid</div>
                                            <div class="year">Model Code : RU3</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/HR-V Hybrid 2020-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                        </ul>
                        {{-- <div class="select-title">2018-Current</div> --}}
                        <div class="select-title">2018-2019</div>
                         <ul class="download-section ">
                                 {{-- <li><a href="/manuals/HR-V 2018-Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V</div>
                                        <div class="year">Model Code : RU5</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">HR-V</div>
                                            <div class="year">Model Code : RU5</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/HR-V 2018-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                        </ul>
               </div>

                <!-- WR-V -->
                <div class="mt-section js-pdflist js-list-wrv">
                    <div class="select-title">2023-Current</div>
                    <ul class="download-section ">
                        {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                <div class="variant" style="margin-bottom:10px; font-weight:bold;">WR-V</div>
                                <div class="year">Model Code : DG4</div>
                                <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                            </a>
                            <div class="connectsidebar">
                                <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                <div><a href="/manuals/WRV 2023- Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                            </div>
                            <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                        </li> --}}
                             
                        <li class="withconnect three-btn-overall-container-mobile custom-style">
                            <div class="car-info">
                                <a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">WR-V</div>
                                    <div class="year">Model Code : DG4</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                            </div>
                            <div class="connectsidebar e-booklet orange-bg">
                                <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                <div class="three-btn-display"><a href="/manuals/WRV 2023- Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                            </div>
                            <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            <div class="red-line"></div>
                        </li>
                    </ul>
                </div>
               
               <!-- Jazz -->
               <div class="mt-section js-pdflist js-list-jazz">
                        {{-- <div class="select-title">2017-Current</div> --}}
                        <div class="select-title">2017-2021</div>
                        <ul class="download-section ">
                                 {{-- <li><a href="/manuals/JAZZ 2017-Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">JAZZ</div>
                                        <div class="year">Model Code : GK5</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">JAZZ</div>
                                            <div class="year">Model Code : GK5</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/JAZZ 2017-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>

                                {{-- <li><a href="/manuals/JAZZ Hybrid 2017-Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">JAZZ Hybrid</div>
                                        <div class="year">Model Code : GP5</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}
                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">JAZZ Hybrid</div>
                                            <div class="year">Model Code : GP5</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/JAZZ Hybrid 2017-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                                
                        </ul>
               </div>
            
               <!-- Odyssey -->
               <div class="mt-section js-pdflist js-list-odyssey">
                        {{-- <div class="select-title">2014-Current</div> --}}
                        <div class="select-title">2019-2021</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/ODYSSEY 2014-Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">ODYSSEY</div>
                                        <div class="year">Model Code : RC1</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}

                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">ODYSSEY</div>
                                            <div class="year">Model Code : RC1</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/ODYSSEY 2014-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Half Blue (Non-Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                        </ul>
               </div>
            
               <!-- Type-R -->
               <div class="mt-section js-pdflist js-list-type-r">
                        <div class="select-title">2023-Current</div>
                        <ul class="download-section ">
                            {{-- <li class="withconnect"><a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC TYPE R</div>
                                    <div class="year">Model Code : FL5</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                                <div class="connectsidebar">
                                    <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div>
                                    <div><a href="/manuals/type-r-2023.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                            </li> --}}
                            {{-- <div><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.2-210923.pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" ></a></div> --}}

                            <li class="withconnect three-btn-overall-container-mobile custom-style">
                                <div class="car-info">
                                    <a href="#" onclick="return false;" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC TYPE R</div>
                                        <div class="year">Model Code : FL5</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                </div>
                                <div class="connectsidebar e-booklet orange-bg">
                                    <div class="three-btn-display"><a href="/pdf/connect/Honda CONNECT User Manual_Version 1.0.3 .pdf"  target="_blank"><img src="../img/aftersales/icon/connect-manual.png" class="three-btn-img-size" ></a></div>
                                    <div class="three-btn-display"><a href="/manuals/type-r-2023.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" class="three-btn-img-size" ></a></div>
                                    <div><a href="/pdf/20250217_DSD_Full Black (Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                </div>
                                <div class="connectbadge"><img src="../img/aftersales/icon/connect-badge.png"></div>
                                <div class="red-line"></div>
                            </li>
                        </ul>
                        {{-- <div class="select-title">2017-Current</div> --}}
                        <div class="select-title">2017-2022</div>
                        <ul class="download-section ">
                                {{-- <li><a href="/manuals/CIVIC TYPE R 2017-Current.pdf" target="_blank">
                                        <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC TYPE R</div>
                                        <div class="year">Model Code : FK8</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a></li> --}}

                                <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                                    <div class="car-info car-info-two-btn orange-bg">
                                        <a href="#" onclick="return false;" target="_blank">
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">CIVIC TYPE R</div>
                                            <div class="year">Model Code : FK8</div>
                                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                        </a>
                                    </div>
                                    <div class="connectsidebar e-booklet-two-btn orange-bg">
                                        <div><a href="/manuals/CIVIC TYPE R 2017-Current.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                        <div><a href="/pdf/20250217_DSD_Full Black (Turbo).pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                                    </div>
                                    <div class="red-line"></div>
                                </li>
                        </ul>
               </div>

                <!-- e:N1 -->
                <div class="mt-section js-pdflist js-list-en1">
                    <div class="select-title">2025-Current</div>
                    <ul class="download-section ">
                        <li class="withconnect three-btn-overall-container-mobile custom-style custom-style-two-btn">
                            <div class="car-info car-info-two-btn">
                                <a href="#" onclick="return false;" target="_blank">
                                    <div class="variant" style="margin-bottom:10px; font-weight:bold;">e:N1</div>
                                    <div class="year">Model Code : eV</div>
                                    <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                </a>
                            </div>
                            <div class="connectsidebar e-booklet-two-btn orange-bg">
                                <div><a href="/manuals/eN1-owner-manual.pdf"  target="_blank"><img src="../img/aftersales/icon/owners-manual.png" ></a></div>
                                <div><a href="/pdf/eN1-warranty-service-e-booklet.pdf"  target="_blank">Service Warranty <br> e-Booklet</a></div>
                            </div>
                            <div class="red-line"></div>
                        </li>
                    </ul>
                </div>
           

    </div>

</section>


<div class="not-required-bg" style=""></div>
<div class="howto" id="trypage" style="">
    <div class="howto-title">
       <h3>Locate VIN / CHASSIS Number</h3>
       <a href="javascript:;" id="close-howto">CLOSE X</a>
    </div>
    <div class="howto-content">
        <p>VIN or chassis number is available on the JPJ Registration Card, Service Booklet or Body of Vehicle.</p>
        <div class="vin-instruct"></div>
    </div>
</div>







</div>

<style>
    .select-title {margin-top:20px;}
    .js-pdflist {display: none;}
    .maintenance-container {margin-bottom:0;padding-bottom:20px;}
</style>

<script>
    $(document).ready(function(){
        //maintenaance page ----------------------------------------------


            var mntn_model, mntn_variant;
            function mntn_resetAll(){
            mntn_model = null;
            mntn_variant = null;
            }

            function mntn_resetModel(model){
                var lineheight = $('.dropdown-box').outerHeight();
                //console.log('model', model)
                mntn_model = model;
                $('.js-pdflist').hide();
                $('.js-list-'+mntn_model).show();
            }

            function mntn_showFiles(ym){
                $('.js-pdflist, .js-pdflist li').hide();

                $('.js-pdflist li').each(function(){
                    if($(this).data('variant')==mntn_variant && $(this).data('model-slug')==mntn_model){
                        $(this).show();
                    }
                })
                $('.js-pdflist').show();
            }

            //
            $('.js-model-dd li').click(function(){
                mntn_resetModel($(this).data('mslug'));
            })

            
            mntn_resetAll();


            $(".dont-know-vin, #close-howto").click(function(){
                $(".howto, .not-required-bg").toggle();
               
            });






    })
</script>

@stop




