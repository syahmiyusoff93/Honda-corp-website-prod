@php
    $DEFAULT_REGION = 'peninsular-malaysia';
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'pricing_regions.json', false, $honda_api_context);
    $data = json_decode($data);
    $regions = $data->payload;


    $data = file_get_contents($APIPATH.'pricing_price-items.json', false, $honda_api_context);
    $data = json_decode($data);
    $price_items = $data->payload;
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

<script language="javascript">
    var modelslug = "{{$model_slug}}"; 
    console.log(":" + modelslug);

    $(document).ready(function(){
        var __APIPATH = '/api/';
        var __variants = {{json_encode($variantids)}};
        var __region = '{{$DEFAULT_REGION}}';

        var __priceitems = '{{implode(',', $priceitemforjs)}}';
        __priceitems = __priceitems.split(',');

        function populatePricing(pos, vid, reg){
            // if (modelslug == "crv") {
            //     if(pos == 2) pos = 3 ;
            //     else if (pos == 3)  pos = 2;
            // }
            // else if (modelslug == "city") {
            //     if(pos == 3) pos = 4 ;
            //     else if (pos == 4)  pos = 3;
            // }


            if (modelslug == "city-hatchback") {
                 // if(pos == 3) pos = 4 ;
                 // else if (pos == 4)  pos = 3;
            }


            var col = '#col'+pos+'-';
            //console.log('pricing/variant/'+vid+'/'+reg);
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
                var i1;
                if (modelslug == "crv") {
                    i1 = i;
                    console.log("...");
                    $('.colnum'+(i1)).css('opacity', 1);
                    $('.variant-select>li:nth-child('+(i1+2)+')').show();
                    populatePricing(i1, __variants[i1], __region);

                }
                else {
                
                    $('.colnum'+(i)).css('opacity', 1);
                    $('.variant-select>li:nth-child('+(i+2)+')').show();
                    populatePricing(i, __variants[i], __region);
                }

            }
            //
            $('#region-select li').show();
            $(this).hide();
        })

        $('.sai-dd-item li').click(function(){
            __variants[$(this).data('col')] = $(this).data('vid');
            populatePricing($(this).data('col'), $(this).data('vid'), __region);
        })

        $('#region-select li:nth-of-type(1)').trigger('click');
        if (modelslug == "en1") {
            $('.sai-dd-item li').trigger('click');
        }
    })
</script>

<section class="model-inner-container stage-contained price-inner drop-table">
    <div class="intro first">
        <h2>PRICING</h2>
    </div>

    <div class="location outline-drop">
        @if ($model_slug == "en1")
        <div class="dropdown-select" style="cursor: default;">
            <div class="dropdown-box">
                <span class="btn region-label">Peninsular Malaysia</span>
            </div>
        </div>
        @else
        <div class="dropdown-select" data-toggle="toggle5">
            <div class="dropdown-box">
                <span class="btn region-label">Peninsular Malaysia</span>
                <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span>
            </div>
            <ul id="region-select" class="dropdown-menu hide" data-toggle="toggle5" style="display: none;">

                @foreach ($regions as $item)
                    <li data-region="{{$item->slug}}" data-regionname="{{$item->name}}">{{$item->name}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- <div class="dropdown-select" data-toggle="toggle5">
            <div class="dropdown-box">
                <span class="btn region-label">Penisular Malaysia</span>
                <span class="caret"><img src="{{url('img/interface/arrow-red-down.png')}}" alt=""></span>
            </div>
            <ul id="region-select" class="dropdown-menu hide" data-toggle="toggle5" style="display: none;">
                @foreach ($regions as $item)
                    <li data-region="{{$item->slug}}" data-regionname="{{$item->name}}">{{$item->name}}</li>
                @endforeach
            </ul>
        </div> --}}
    </div>

    <div class="details-container"> 
        @include('components.model-dropdown-pricing')
    </div>

</section>

@if ($model_slug != "odyssey")
<section class="table-content-container model-inner-container price-inner">
    <div class="stage-contained table-content">
        <div class="spec-details black">
            <ul>
                <li>
                <table>
                    @php
                    //dd(var_dump($dd));
                    foreach ($price_items as $item) {
                        $spclass = ['',''];
                        if($item->slug=='selling-price') $spclass = ['bold','darkgrey'];
                        if($item->slug=='retail-price') $spclass = ['','darkgrey'];
                        
                        //    $est = "";
                        //    echo '<tr class="'.$spclass[0].'">
                        //          <td class="">'.$item->name.' '.$est.'</td>';

                        if($model_slug == "civic" || $model_slug == "crv"){
                            if ($item->name === "Surcharge for Platinum White Pearl*") {
                                if($model_slug == "civic"){
                                    $item->name = "Surcharge for Platinum White Pearl or Ignite Red Metallic or Canyon River Blue Metallic*";
                                }else{
                                    $item->name = "Surcharge for Platinum White Pearl or Ignite Red Metallic*"; 
                                }
                            }
                            
                            $est = "";
                            echo '<tr class="'.$spclass[0].'">
                                <td class="">'.$item->name.' '.$est.'</td>';
                        }elseif($model_slug == "city" || $model_slug == "city-hatchback"){
                            if ($item->name === "Surcharge for Platinum White Pearl*") {
                                $item->name = "Surcharge for Platinum White Pearl or Phoenix Orange Pearl or Ignite Red Metallic*";
                            }
                            
                            $est = "";
                            echo '<tr class="'.$spclass[0].'">
                                <td class="">'.$item->name.' '.$est.'</td>';
                        }elseif($model_slug == "hrv"){
                            if ($item->name === "Surcharge for Platinum White Pearl*") {
                                $item->name = "Surcharge for Platinum White Pearl or Phoenix Orange Pearl*";
                            }
                            
                            $est = "";
                            echo '<tr class="'.$spclass[0].'">
                                <td class="">'.$item->name.' '.$est.'</td>';
                        }elseif($model_slug == "wr-v"){
                            if ($item->name === "Surcharge for Platinum White Pearl*") {
                                $item->name = "Surcharge for Platinum White Pearl, Phoenix Orange Pearl or Ignite Red Metallic*";
                            }
                            
                            $est = "";
                            echo '<tr class="'.$spclass[0].'">
                                <td class="">'.$item->name.' '.$est.'</td>';
                        }elseif($model_slug == "en1"){
                            if (
                                $item->slug == "surcharge-for-white-orchird-pearl" ||
                                $item->slug == "surcharge-for-platinum-white-pearl"
                            ) {
                                continue; // Skip this iteration of the loop
                            }
                            $est = "";
                            echo '<tr class="'.$spclass[0].'">
                                <td class="">'.$item->name.' '.$est.'</td>';
                        }else{
                            $est = "";
                            echo '<tr class="'.$spclass[0].'">
                                 <td class="">'.$item->name.' '.$est.'</td>';
                        }

                            $cc = 0;
                            $numcols = 5;

                            if ($model_slug == "city-hatchback") $numcols = 5;
                            if ($model_slug == "en1") $numcols = 1;

                            if($model_slug == "city"){
                                for ($i=0; $i<5; $i++) {
                                    if ($model_slug == "city") {
                                        $j = $i;
                                        // if ($i == 3) $j = 4;
                                        //if ($i == 3) $j = 2;
                                        $v = @$variants[$j];
                                        $label = (@$v->pricing['payload']['peninsular-malaysia'][$item->slug]!='') ? @$v->pricing['payload']['peninsular-malaysia'][$item->slug] : '';
                                        echo '<td class="'.$spclass[1].' colnum'.$j.' datacol new-width-row" id="col'.$cc.'-'.$item->slug.'">'.$label.'</td>';
                                        $cc++;
                                    }
                                }
                            }elseif($model_slug == "en1"){
                                $j = 0;
                                $v = @$variants[$j];
                                $label = (@$v->pricing['payload']['peninsular-malaysia'][$item->slug]!='') ? @$v->pricing['payload']['peninsular-malaysia'][$item->slug] : '';
                                echo '<td style="width: 40%; font-weight: 500;" class="'.$spclass[1].' colnum'.$j.' datacol new-width-row center-content-mobile" id="col'.$cc.'-'.$item->slug.'">'.$label.'</td>';
                                $cc++;
                            }else{
                                for ($i=0; $i<5; $i++) {
                                    if ($model_slug == "crv") {
                                        $j = $i;
                                        // if ($i == 2) $j = 3;
                                        // if ($i == 3) $j = 2;

                                        $v = @$variants[$j];
                                        $label = (@$v->pricing['payload']['peninsular-malaysia'][$item->slug]!='') ? @$v->pricing['payload']['peninsular-malaysia'][$item->slug] : '';
                                        echo '<td class="'.$spclass[1].' colnum'.$j.' datacol" id="col'.$cc.'-'.$item->slug.'">'.$label.'</td>';
                                        $cc++;
                                    }
                                    // else if ($model_slug == "city") {
                                    //     $j = $i;
                                    //     // if ($i == 3) $j = 4;
                                    //     //if ($i == 3) $j = 2;
                                    //     $v = @$variants[$j];
                                    //     $label = (@$v->pricing['payload']['peninsular-malaysia'][$item->slug]!='') ? @$v->pricing['payload']['peninsular-malaysia'][$item->slug] : '';
                                    //     echo '<td class="'.$spclass[1].' colnum'.$j.' datacol" id="col'.$cc.'-'.$item->slug.'">'.$label.'</td>';
                                    //     $cc++;
                                    // }
                                    else {
                                        $v = @$variants[$i];
                                        $label = (@$v->pricing['payload']['peninsular-malaysia'][$item->slug]!='') ? @$v->pricing['payload']['peninsular-malaysia'][$item->slug] : '';
                                        
                                        if ($numcols == 3 ) { 
                                        if ($i == 3)
                                            echo '<td style="opacity:.5 !important" class="'.$spclass[1].' ">-</td>';
                                        else
                                            echo '<td class="'.$spclass[1].' colnum'.$i.' datacol" id="col'.$cc.'-'.$item->slug.'">'.$label.'</td>';
                                        }
                                        else {
                                            echo '<td class="'.$spclass[1].' colnum'.$i.' datacol" id="col'.$cc.'-'.$item->slug.'">'.$label.'</td>';
                                        }
                        
                                        $cc++;
                                    }
                                }
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
@endif

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
                <span>{{$m[0]}}</span>
            </a>
        @endforeach
    </div>
</section>

<style>
    .table-content-container .spec-details li table td
    .drop-table.model-inner-container ul.selection li {width: {{floor(100/(count($variants)+1))-0.3}}%; box-sizing:border-box; }

    @media only screen and (max-width: 1400px) and (min-width: 1240px) {
        .dropdown-select .sai-dd-label{
            /* min-width: 102px; */
        }
    }
</style>

<script>
     $("document").ready(function(){
        var mslug = "{{$model_slug}}";
        // console.log(mslug);
        if ( mslug  == "crv") {

            $( ".sai-ddselect-0 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)").insertBefore(".sai-ddselect-0 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(3)" );
            $( ".sai-ddselect-1 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)").insertBefore(".sai-ddselect-1 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(3)" );
            $( ".sai-ddselect-2 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)").insertBefore(".sai-ddselect-2 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(3)" );
            $( ".sai-ddselect-3 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)").insertBefore(".sai-ddselect-3 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(3)" );

            /* $(".variant-select > .sai-ddselect-3").css("display", "none");
            $(".colnum3").css("opacity", "0.2"); */

            /* $(".region-label").on('DOMSubtreeModified', function() {
                $(".variant-select > .sai-ddselect-3").css("display", "none");
                $(".colnum3").css("opacity", "0.2");
            }); */

            /* let targetNode = document.querySelector(".region-label");

            const config = { childList: true, characterData: true, subtree: true, attributes: true, };

            const callback = function (mutationsList, observer) { 
                $(".variant-select > .sai-ddselect-3").css("display", "none");
                $(".colnum3").css("opacity", "0.2");
            };

            const observer = new MutationObserver(callback);
            observer.observe(targetNode, config); */

            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(9)").remove()
        }
        else if ( mslug  == "city") {

            $( ".sai-ddselect-0 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)").insertBefore(".sai-ddselect-0 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)" );
            $( ".sai-ddselect-1 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)").insertBefore(".sai-ddselect-1 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)" );
            $( ".sai-ddselect-2 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)").insertBefore(".sai-ddselect-2 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)" );
            $( ".sai-ddselect-4 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)").insertBefore(".sai-ddselect-4 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(4)" );

            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(9)").remove()
            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(3)").remove()

            $(".stage-contained").addClass("new-width");
            $(".xoutline-drop").addClass("new-width-row");
        }
        else if (mslug == "civic") {
            // to remove orchid pearl idk what color was it but can't remember but its for civic
            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(9)").remove()
        }
        else if ( mslug  == "city-hatchback") {

            /* $( ".sai-ddselect-3 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(6)").insertBefore(".sai-ddselect-4 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)" ); */
            /* setTimeout(() => {$("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-6").insertBefore("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-5")}, 5000); */
            // $("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-3").insertBefore("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-4")
            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(9)").remove()
        }
        else if ( mslug  == "wr-v") {

            /* $( ".sai-ddselect-3 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(6)").insertBefore(".sai-ddselect-4 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)" ); */
            /* setTimeout(() => {$("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-6").insertBefore("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-5")}, 5000); */
            // $("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-3").insertBefore("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-4")
            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(9)").remove()
            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(3)").remove()
        }
        else if ( mslug  == "type-r") {

            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(3) > td:first-child").text("Handling Fee")
            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(9)").remove()
            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(9)").remove()
        }
        else if ( mslug  == "hrv") {

            /* $( ".sai-ddselect-3 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(6)").insertBefore(".sai-ddselect-4 > .dropdown-select > .dropdown-menu.sai-dd-item > li:nth-child(5)" ); */
            /* setTimeout(() => {$("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-6").insertBefore("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-5")}, 5000); */
            // $("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-3").insertBefore("#mainstage > section.model-inner-container.stage-contained.price-inner.drop-table > div.details-container > ul > li.xoutline-drop.sai-ddselect-4")
            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(9)").remove()
        }
        else if ( mslug  == "en1") {
            $("#mainstage > section.table-content-container.model-inner-container.price-inner > div.stage-contained.table-content > div > ul > li > table > tbody > tr:nth-child(3) td:first-child").text('Handling Fee');
        }

        /* const tbodyElement = document.querySelector('tbody');
        const thirdTrElement = tbodyElement.querySelector('tr:nth-child(3)');
        const tdElements = thirdTrElement.querySelectorAll('td:not(:first-child)');
        tdElements.forEach(td => {
            td.textContent = '_';
        }); */

      });
    
    </script>



@stop





