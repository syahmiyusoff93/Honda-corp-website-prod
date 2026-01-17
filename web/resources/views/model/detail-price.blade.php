@php
    $DEFAULT_REGION = 'peninsular-malaysia';
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'pricing_regions.json', false, $honda_api_context);
    $data = json_decode($data);
    $regions = $data->payload;

    


    $data = file_get_contents($APIPATH.'pricing_price-items.json', false, $honda_api_context);
    $data = json_decode($data);
    
    // Check if this model has customized parameters
    if (isset($data->payload_customized->{$model_slug}) && $data->payload_customized->{$model_slug}->customized) {
        $price_items = $data->payload_customized->{$model_slug}->parameters;
    } else {
        $price_items = $data->payload;
    }
    
    foreach($price_items as $v){
        $priceitemforjs[] = $v->slug;
    }

    $data = file_get_contents($APIPATH.'variants.json', false, $honda_api_context);
    $data = json_decode($data);
    $allvariants = $data->payload;

    // get variant list and its pricing

    $data = file_get_contents($APIPATH.'model_'.$model_slug.'_variants.json', false, $honda_api_context);
    $data = json_decode($data);
    $variants = $data->payload;
    if ($variants) { 
        usort($variants, function($a, $b) { return strcmp($a->sequence, $b->sequence); }); 
    }

    $num_variants = count($variants);
    $num_variants_table = $num_variants + 1;
    // Calculate column widths
    $data_width_table = (100 / $num_variants_table) - 0.3 . '%';
    $data_width_column = (100 / $num_variants_table) . '%';
    if ($num_variants == 1) {
        $data_width_table = '40%';
        $data_width_column = '16.3%';
    }
    elseif ($num_variants == 3) {
        $data_width_column = '24.7%';
    }

    // Determine which regions have pricing data for this model/variants
    $availableRegions = [];
    if (!empty($regions) && !empty($variants) && !empty($price_items)) {
        foreach ($regions as $r) {
            $rslug = $r->slug;
            $hasData = false;
            foreach ($variants as $vcheck) {
                $filePath = $APIPATH.'pricing_variant_'.$vcheck->id.'_'.$rslug.'.json';
                $raw = @file_get_contents($filePath, false, $honda_api_context);
                if (!$raw) continue;
                $j = @json_decode($raw, true);
                if (!$j || !isset($j['payload'][$rslug])) continue;
                $payloadRegion = $j['payload'][$rslug];
                // Check if at least one price item has a non-empty value
                foreach ($price_items as $pi) {
                    $slug = is_object($pi) ? $pi->slug : (is_array($pi) ? ($pi['slug'] ?? null) : null);
                    if (!$slug) continue;
                    // Normalize values: trim strings and convert nulls to empty strings
                    foreach ($payloadRegion as $key => $value) {
                        $payloadRegion[$key] = is_null($value) ? '' : trim((string)$value);
                    }

                    // Determine if this region contains any meaningful (non-zero) price for this price item
                    if (isset($payloadRegion[$slug])) {
                        $val = $payloadRegion[$slug];
                        // Treat empty strings or numeric zero as 'no data'
                        $isZeroNumber = is_numeric($val) && floatval($val) == 0;
                        if ($val !== '' && !$isZeroNumber) {
                            $hasData = true;
                            break;
                        }
                    }
                }
                if ($hasData) break;
            }
            if ($hasData) {
                $availableRegions[] = $r;
            }
        }
    }

    // Simplified array for JS
    $availableRegionsSimple = [];
    foreach ($availableRegions as $ar) {
        $availableRegionsSimple[] = ['slug' => $ar->slug, 'name' => $ar->name];
    }

    // getting the price
    foreach($variants as $v){

        $dd = file_get_contents($APIPATH.'pricing_variant_'.$v->id.'_'.$DEFAULT_REGION.'.json', false, $honda_api_context);
        $dd = json_decode($dd, true);
        $v->pricing = $dd;

        $variantids[] = $v->id;
    }

    $model_info = $data->model;
    $pageid = "pricing";

    //disclaimer info
    $data = file_get_contents($APIPATH.'model_'.$model_slug.'_price-note.json', false, $honda_api_context);
    $data = json_decode($data);
    $price_note = $data->payload;

    $disclaimercopy = !empty($price_note->price_note) ? $price_note->price_note : '';

    // variable to flag model option population, to only display model's own variants and not other models' variant too
    $ownvariantonly = true;

    $__menu = config('global.menus');
    // Show only the requested tools in the mobile floating bar, in this order
    $__desired = config('global.desired');
    $desired = $__desired;
    $found = [];
    foreach ($__menu['shopping-tool'] as $itm) {
        if (in_array(strtolower($itm[0]), array_map('strtolower', $desired))) {
            $found[] = $itm;
        }
    }

    // Preserve desired order
    $mobileTools = [];
    foreach ($desired as $d) {
        foreach ($found as $f) {
            if (strtolower($f[0]) === strtolower($d)) {
                $mobileTools[] = $f;
                break;
            }
        }
    }

@endphp

@extends('layouts.modelinner')

@section('page-title')
{{$model_info->name}} Pricing
@endsection


@section('inner-content')

<style>
    @media screen and (min-width: 1024px) {
        .table-content-container .spec-details li table td {
            width: {{$data_width_table}} !important;
        }
        /* Apply wider column only to the first column (label column) */
        .table-content-container .spec-details li table td:first-child{
            width: {{$data_width_column}} !important;
        }
        .drop-table.model-inner-container ul.selection .xoutline-drop, .selection-tag {
            width: {{$data_width_column}} !important;
        }
    }
    @media only screen and (max-width: 1024px) {
        .drop-table.model-inner-container ul.selection li {
            width: 100% !important;
        }
    }
    
</style>

<script language="javascript">
    var modelslug = "{{$model_slug}}"; 

    $(document).ready(function(){
        var __APIPATH = '/deltaecho/api/';
        var __variants = {{json_encode($variantids)}};
        var __availableRegions = @json($availableRegionsSimple ?? []);
        var __region = __availableRegions.length > 0 ? __availableRegions[0].slug : '{{$DEFAULT_REGION}}';

        var __priceitems = '{{implode(',', $priceitemforjs)}}';
        __priceitems = __priceitems.split(',');

        function populatePricing(pos, vid, reg){
            var col = '#col'+pos+'-';
            $.getJSON(__APIPATH+'pricing_variant_'+vid+'_'+reg+'.json', function(dd) {
                var price
                for(i=0;i<__priceitems.length;i++){
                    price = dd.payload[reg][__priceitems[i]];
                    if(parseFloat(price) ==''|| parseFloat(price)==0 || price==undefined || price=='undefined'){
                        $(col+__priceitems[i]).html('');
                    } else {
                        $(col+__priceitems[i]).html('RM '+ price);
                    }
                }
                normalise_td_height();
            });
        }

        $('#region-select li').click(function(){
            __region = $(this).data('region');
            $('.region-label').html($(this).data('regionname'));

            $('.datacol').css('opacity', .2);
            $('.variant-select>li').hide();
            $('.variant-select>li:nth-child(1)').show();

            for(i=0;i<__variants.length;i++){
                $('.colnum'+(i)).css('opacity', 1);
                $('.variant-select>li:nth-child('+(i+2)+')').show();
                populatePricing(i, __variants[i], __region);
            }
            //
            $('#region-select li').show();
            $(this).hide();
        })

        $('.sai-dd-item li').click(function(){
            __variants[$(this).data('col')] = $(this).data('vid');
            populatePricing($(this).data('col'), $(this).data('vid'), __region);
            var selectedText = $(this).text();
            $(this).closest('.dropdown-select').find('.sai-dd-label').text(selectedText);
        })

        // Initialize pricing depending on available regions
        if (__availableRegions.length > 0) {
            // Use the first available region as initial
            $('.region-label').html(__availableRegions[0].name);
            if (__availableRegions.length > 1) {
                // If dropdown exists, trigger its first item
                $('#region-select li:nth-of-type(1)').trigger('click');
            } else {
                // Only one region available — populate directly
                for(i=0;i<__variants.length;i++){
                    populatePricing(i, __variants[i], __region);
                }
            }
        } else {
            // Fallback: trigger default behaviour
            $('#region-select li:nth-of-type(1)').trigger('click');
        }
    })
</script>

<section class="model-inner-container stage-contained price-inner drop-table">
    <div class="intro first">
        <h2>PRICING</h2>
    </div>

    @if(!empty($availableRegions) && count($availableRegions) > 0)
    <div class="location outline-drop">
        <div class="dropdown-select" data-toggle="toggle5">
            <div class="dropdown-box">
                <span class="btn region-label">{{ $availableRegions[0]->name }}</span>
                @if(count($availableRegions) > 1)
                    <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span>
                @endif
            </div>
            @if(count($availableRegions) > 1)
            <ul id="region-select" class="dropdown-menu hide" data-toggle="toggle5" style="display: none;">
                @foreach ($availableRegions as $item)
                    <li data-region="{{$item->slug}}" data-regionname="{{$item->name}}">{{$item->name}}</li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    @endif

    <div class="details-container"> 
        @include('components.model-dropdown-pricing')
    </div>

</section>

<section class="table-content-container model-inner-container price-inner">
    <div class="stage-contained table-content">
        <div class="spec-details black">
            <ul>
                <li>
                <table>
                    @php
                    foreach ($price_items as $item) {
                        $spclass = ['',''];
                        if($item->slug=='selling-price') $spclass = ['bold','darkgrey'];
                        if($item->slug=='retail-price') $spclass = ['','darkgrey'];
                        
                        $est = "";
                        echo '<tr class="'.$spclass[0].'">
                              <td class="">'.$item->name.' '.$est.'</td>';

                        for ($i=0; $i < $num_variants; $i++) {
                            $v = @$variants[$i];
                            $label = (@$v->pricing['payload']['peninsular-malaysia'][$item->slug]!='') ? @$v->pricing['payload']['peninsular-malaysia'][$item->slug] : '';
                            $td_class = $spclass[1] . ' colnum'.$i.' datacol';
                            if ($num_variants == 1) {
                                $td_class .= ' single-column';
                            }
                            echo '<td class="'.$td_class.'" id="col'.$i.'-'.$item->slug.'">'.$label.'</td>';
                        }
                        echo '</tr>';
                    }
                    @endphp
                    </table>
                </li>
            </ul>
        </div>
    </div>

    <div class="stage-contained">
        <div class="note-container">
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                {!! $disclaimercopy !!}
            </div>
        </div>
    </div>

</section>

<section class="shopping-tools body-copy grey container section-gap" id="shopping-tools" style="padding-top: 40px; margin-top: -40px;">
    <h2 style="padding-top:40px;">SHOPPING TOOLS</h2>

    @foreach ($__menu['shopping-tool'] as $item)
        <a href="{{$item[1]}}" class="shoptool-item {{$item[3]}}">
            <img  class="lazyload" data-src="{{versioned_asset('img/icon/'.$item[2])}}" alt="{{$item[0]}}">
            <div class="st-text"> {{$item[0]}}</div>
        </a>
    @endforeach
    
    <div class="clearfix"></div>

    {{-- Mobile floating bottom bar (only show on small screens) --}}
    <div class="mobile-shopping-tools" aria-hidden="false">
        @foreach ($mobileTools as $m)
            <a href="{{$m[1]}}" class="mst-item" title="{{$m[0]}}" aria-label="{{$m[0]}}">
                <img src="{{ versioned_asset('img/icon/'.$m[2]) }}" alt="{{$m[0]}}" />
                <?php 
                $toolLabel = $m[0];
                    // Format multi-word labels for mobile display
                    $toolLabel = str_replace('New Car Pre-Booking', 'New Car<br>Pre-Booking', $toolLabel);
                    $toolLabel = str_replace('Loan Calculator', 'Loan<br>Calculator', $toolLabel);
                    $toolLabel = str_replace('Download Brochure', 'Download<br>Brochure', $toolLabel);
                    $toolLabel = str_replace('Book A Test Drive', 'Book A<br>Test Drive', $toolLabel);
                ?>
                <span>{!! $toolLabel !!}</span>
            </a>
        @endforeach
    </div>
</section>

@stop





