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

$_allmodel['accord'] = 'Accord';
$_allmodel['brv'] = 'BR-V';
$_allmodel['city'] = 'City';
$_allmodel['civic'] = 'Civic';
$_allmodel['crv'] = 'CR-V';
$_allmodel['crz'] = 'CR-Z';
$_allmodel['freed'] = 'Freed';
$_allmodel['hrv'] = 'HR-V';
$_allmodel['insight'] = 'Insight';
$_allmodel['jazz'] = 'Jazz';
$_allmodel['odyssey'] = 'Odyssey';
$_allmodel['stream'] = 'Stream';
$_allmodel['type-r'] = 'Type R';

@endphp
@extends('layouts.base')
@section('page-title')
    Maintenance
@stop

@section('content')

<div class="body-wrapper">
<section class="service-tab-menu">
    <div class="menu-toggle smooth-slide">
        <input type="checkbox" id="service-tab-menu-check">
            <div class="service-tab-menu-btn">
            <label for="service-tab-menu-check">
                <span></span>
                <!-- <span></span>
                <span></span> -->
            </label>
            </div>
            <ul>
                <li style="border-bottom: 3px solid #e32119;"><a href="{{url('aftersales/maintenance')}}">Maintenance Schedule</a></li>
                <li><a href="{{url('aftersales/maintenance-faq')}}">FAQ</a></li>
            </ul>
    </div>
    <div class="clearfix"></div>
</section>
<section class="maintenance-inner innerpage" style="margin-top: -130px;">
    <div class="inner-container">
        <div class="intro extrapadding">
            <h2>MAINTENANCE SCHEDULE</h2>
            <!-- <div class="intro-title grey">Lorem ipsum dolor sit amet, porro ullamcorper vel ad. Sit facete insolens ut.</div> -->
        </div>

        <div class="stage-contained maintenance-container">
            <div class="mt-section">

                <div class="mt-item js-model-dd">
                    <div class="select-title">MODEL</div>
                    <div class="outline-drop">
                        <div class="dropdown-select" data-toggle="model">
                            <div class="dropdown-box"><span class="btn select-copy">Select a model</span>   <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span></div>
                            <ul class="dropdown-menu" data-toggle="model" style="display: none;">

                                @foreach ($_allmodel as $slug=>$item)
                                    <li data-mslug="{{ $slug }}">{{ strtoupper($item) }}</li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="mt-item js-variant-dd" style="display:none">
                    <div class="select-title">Variant</div>
                    <div class="outline-drop">
                        <div class="dropdown-select" data-toggle="variant">
                            <div class="dropdown-box"><span class="btn select-copy">Select a variant</span>   <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span></div>
                            <ul class="dropdown-menu" data-toggle="variant" style="display: none;">

                                @foreach ($cleanedvariant as $item)
                                @php
                                    $vdisp = strtoupper($item->variant);
                                    $vdisp = str_replace('IVTEC', 'i-VTEC', $vdisp);
                                @endphp
                                    <li class="js-model-{{ $item->model_slug }}" data-ym="{{ $item->year_model }}" data-variant="{{ $item->variant }}">{{ $vdisp }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-section js-pdflist" style="display:none">
                <div class="select-title">YEAR MODEL</div>
                <ul class="download-section">

                    @foreach ($allmaintenance as $item)
                        <li data-ym="{{ $item->year_model }}" data-variant="{{ $item->variant }}" data-model-slug="{{ $item->model_slug }}">
                            <a href="{{ url('/doc/maintenance/'.$item->id) }}" target="_blank">
                                @php
                                    $vname = strtoupper($item->variant);
                                    $vname = str_replace('IVTEC', 'iVTEC', $vname);
                                @endphp
                                <div class="variant" style="margin-bottom:10px; font-weight:bold;">{{ $vname }}</div>
                                <div class="year">{{ $item->year_model }}</div>
                                <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                            </a>
                        </li>
                    @endforeach

                    {{--  <li>
                        <a href="">
                            <div class="year">2013 - Current</div>
                            <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                        </a>
                    </li>  --}}

                </ul>
            </div>
        </div>
    </div>

</section>

</div>

@stop
