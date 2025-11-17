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
// Hide city hatchback on live
$_allmodel['city-hatchback'] = 'City Hatchback';
$_allmodel['civic'] = 'Civic';
$_allmodel['crv'] = 'CR-V';
$_allmodel['crz'] = 'CR-Z';
$_allmodel['en1'] = 'e:N1';
$_allmodel['freed'] = 'Freed';
$_allmodel['hrv'] = 'HR-V';
$_allmodel['insight'] = 'Insight';
$_allmodel['jazz'] = 'Jazz';
$_allmodel['odyssey'] = 'Odyssey';
$_allmodel['stream'] = 'Stream';
$_allmodel['type-r'] = 'Type R';
$_allmodel['wr-v'] = 'WR-V';

// MAINTENANCE ITEM REGROUPING - 20200715
$ym_arr = [];
foreach ($allmaintenance as $item){
    // process year model data to be standardise format. we cant be too sure what people input inside DeltaEcho
    $ym = str_replace(' ', '', $item->year_model);

    //$ym = explode('-', $ym);$ym = implode(' - ', $ym);

    $item->year_model = $ym;

    $vname = strtoupper($item->variant);
    $vname = str_replace('I-VTEC', 'i-VTEC', $vname);
    $item->variant = $vname;

    // put list of ym in an array for sorting purposes
    if(!in_array($ym, $ym_arr)) $ym_arr[] = $ym;


    // put ym item in an array of its own for data display
    $ym_item[$item->model_slug][$ym][] = $item;
    if($item->model_slug=='jazz') $myjazz[] = $item;

}
rsort($ym_arr);

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
                                    @if ($slug == 'en1')
                                    <li data-mslug="{{ $slug }}">e:N1</li>
                                    @else
                                    <li data-mslug="{{ $slug }}">{{ strtoupper($item) }}</li>
                                    @endif
                                    {{-- <li data-mslug="{{ $slug }}">{{ strtoupper($item) }}</li> --}}
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

                {{-- <div class="mt-item js-variant-dd" style="display:none">
                    <div class="select-title">Variant</div>
                    <div class="outline-drop">
                        <div class="dropdown-select" data-toggle="variant">
                            <div class="dropdown-box"><span class="btn select-copy">Select a variant</span>   <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span></div>
                            <ul class="dropdown-menu" data-toggle="variant" style="display: none;">

                                @foreach ($cleanedvariant as $item)
                                @php
                                    $vdisp = strtoupper($item->variant);
                                    $vdisp = str_replace('I-VTEC', 'i-VTEC', $vdisp);
                                @endphp
                                    <li class="js-model-{{ $item->model_slug }}" data-ym="{{ $item->year_model }}" data-variant="{{ $item->variant }}">{{ $vdisp }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div> --}}

            </div>

            @foreach ($ym_item as $mkey=>$mitem)
                <div class="mt-section js-pdflist js-list-{{$mkey}}">
                    {{-- <h3>{{$mkey}}</h3> --}}
                    @php
                        // sort year model list DESC
                        krsort($mitem);
                    @endphp

                    @foreach ($mitem as $ym=>$yitem)
                        <div class="select-title">{{$ym}}</div>
                        <ul class="download-section ">
                            @foreach ($yitem as $item)
                                <li>
                                    <a href="{{ url('/doc/maintenance/'.$item->id) }}" target="_blank">
                                        @if (Str::contains(strtolower($item->variant), 'e:hev'))
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">{{ preg_replace('/e:HEV/i', '', $item->variant) }} e:HEV</div>
                                        @else
                                            <div class="variant" style="margin-bottom:10px; font-weight:bold;">{{ $item->variant }}</div>
                                        @endif
                                        {{-- <div class="variant" style="margin-bottom:10px; font-weight:bold;">{{ $item->variant }}</div> --}}
                                        <div class="year">{{ $item->year_model }}</div>
                                        <div class="btn-cta"><span>View</span> <img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            @endforeach

    </div>

</section>

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

            $('.js-variant-dd li').click(function(){
                mntn_variant = $(this).data('variant');
                mntn_showFiles($(this).data('ym'));
            })

            mntn_resetAll();

    })
</script>

@stop




