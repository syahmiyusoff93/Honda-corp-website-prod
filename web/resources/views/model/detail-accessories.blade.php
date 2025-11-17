@php
$APIPATH = config('global.APIPATH');
$honda_api_context = config('global.APICONTEXT');

$data = file_get_contents($APIPATH.'model_'.$model_slug.'_variants.json', false, $honda_api_context);
$data = json_decode($data);
$model_info = $data->model;
$variant_info = $data->payload;

$data = file_get_contents($APIPATH.'model_'.$model_slug.'_accessories.json', false, $honda_api_context);
$data = json_decode($data);
$acclist = $data->payload;

function __cleanupURL($url){
    $url = str_replace('[[SITE]]/', url('/').'/', $url);
    $url = str_replace('[[SITE]]', url('/').'/', $url);
    return $url;
}
function acc_card_generate_li_item($item){

    //dd($item);

    $price = empty(@$item->price) || intval($item->price)==0 ? '' : '<div class="red price">RM '.@$item->price.'</div>';

    $additional_price = '';
    $additional_price .= empty(@$item->secondary_price_label1) ? '' : '<div class="price-detail">'.@$item->secondary_price_label1.': <span class="red">RM '.@$item->secondary_price_value1.'</span></div>';
    $additional_price .= empty(@$item->secondary_price_label2) ? '' : '<div class="price-detail">'.@$item->secondary_price_label2.': <span class="red">RM '.@$item->secondary_price_value2.'</span></div>';
    $additional_price = $additional_price=='' ? '' : '<div  class="extra-ac">'.$additional_price.'</div>';

    $additional_link = '';
    $additional_link .= empty(@$item->external_link_label1) ? '' : '<a class="extra-link" href="'.__cleanupURL(@$item->external_link_url1).'">'.@$item->external_link_label1.'</a>';
    $additional_link .= empty(@$item->external_link_label2) ? '' : '<a class="extra-link" href="'.__cleanupURL(@$item->external_link_url2).'">'.@$item->external_link_label2.'</a>';
    $additional_link = $additional_link=='' ? '' : '<div  class="extra-ac">'.$additional_link.'</div>';

    $additional_note = empty(@$item->notes) ? '' : '<div  class="red">'.$item->notes.'</div>';

    $description = empty(@$item->desc) ? '' : '<p class="maindesc">'.$item->desc.'</p>';

    return '
        <li>
            <div class="photo"><img src="'.@$item->img.'" alt=""></div>
            <div class="des">
                <div class="sub-title">'.$item->title.'</div>
                <div class="body-copy">
                    '.$description.'
                    '.$additional_note.'
                    '.$price.'
                    '.$additional_price.'
                    '.$additional_link.'
                </div>
            </div>
        </li>
    ';
}

@endphp


@extends('layouts.modelinner')
@section('page-title')
    Accessories - Honda {{$model_info->name}}
@stop

@section('inner-content')

<section class="model-inner-container accessories stage-contained">
    <div class="intro first">
        <h2>ACCESSORIES</h2>
    </div>

    <div class="section-navi">
        <div class="navi-container tab-slider-nav">
            <ul class="tab-slider-tabs">
                <li class="tab-slider-trigger link-interior" rel="tab-interior"><a href="#interior">Interior</a></li>
                <li class="tab-slider-trigger link-exterior" rel="tab-exterior"><a href="#exterior">Exterior</a></li>
                <li class="tab-slider-trigger link-protection" rel="tab-protection"><a href="#protection">Protection</a></li>
            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
    <div class="details-container tab-slider-body" id="tab-interior" data-tabsection="interior">
        <ul class="flex">
            @foreach ($acclist as $item)
                @if($item->type=='interior')
                    @php
                        echo acc_card_generate_li_item($item);
                    @endphp
                @endif
            @endforeach
        </ul>
    </div>

    <div class="details-container tab-slider-body" id="tab-exterior"  data-tabsection="exterior" style="display: none;">
        <ul class="flex">
            @foreach ($acclist as $item)
                @if($item->type=='exterior')
                    @php
                        if ($item->id == 2843) {
                            $item->title = 'Black Emblem (E, V & e:HEV RS)';
                        } elseif ($item->id == 2840) {
                            $item->title = 'Black Emblem (S)';
                        }

                        echo acc_card_generate_li_item($item);
                    @endphp
                @endif
            @endforeach
        </ul>
    </div>

    <div class="details-container tab-slider-body" id="tab-protection"  data-tabsection="protection" style="display: none;">
        <ul class="flex">
            @foreach ($acclist as $item)
                @if($item->type=='tint')
                    @php
                        echo acc_card_generate_li_item($item);
                    @endphp
                @endif
            @endforeach
        </ul>
    </div>

    <div class="note-container stage-contained">
        <div class="note-title more">TERMS & CONDITIONS</div>
        <div class=" expand-content" style="display: none;">
            {{-- <ul class="note">
            <li>1. All accessories prices are inclusive installation and/or painting charges.</li>
            <li>2. 0% Service Tax is chargeable for Accessories installation and painting services (except for service and repair purposes).</li>
            <li>3. 6% Service Tax is chargeable for the purposes of Accessories service and repair.</li>
            <li>4. Actual accessories may vary in detail from image shown.</li>
            <li>5. Features also vary according to the different variants available.</li>
            <li>6. Prices and specifications are subjected to change without prior notice.</li>
            <li>7. Accessories warranty are subjected to Honda Authorised supplier’s terms and conditions. Please refer to any nearby Honda Malaysia Authorised Dealer for warranty information.</li>
            </ul> --}}

            @if ($model_slug == 'civic')
                <ul class="note">
                    <li>1. All accessories prices are inclusive installation and/or painting charges.</li>
                    <li>2. 0% Service Tax is chargeable for Accessories installation and painting services (except for service and repair purposes).</li>
                    <li>3. Actual accessories may vary in detail from images shown.</li>
                    <li>4. Features also vary according to the different variants available.</li>
                    <li>5. Prices and specifications are subjected to change without prior notice.</li>
                    <li>6. Accessories warranty are subjected to Honda Authorised supplier’s terms and conditions. Please refer to any nearby Honda Malaysia Authorised Dealer for warranty information.</li>
                    </ul>
            @elseif ($model_slug == 'en1')
                <ul class="note">
                    <li>1. All accessories prices are inclusive installation and/or painting charges.</li>
                    <li>2. 0% Service Tax is chargeable for Accessories installation and painting services (except for service and repair purposes).</li>
                    <li>3. Actual accessories may vary in detail from images shown.</li>
                    <li>4. Prices and specifications are subjected to change without prior notice.</li>
                    <li>5. Accessories warranty are subjected to Honda Authorised supplier’s terms and conditions. Please refer to any nearby Honda Malaysia Authorised Dealer for warranty information.</li>
                    <li>6. Additional information pertaining to accessory package and individual item available from Honda e:N1 brochure.</li>
                    <li>7. Wall Box Charger cost includes Parts and Installation Package up to 10m cabling, excluding any civil works such as hacking and concealing.</li>
                </ul>
            @elseif ($model_slug != 'city')
                <ul class="note">
                    <li>1. All accessories price are inclusive of installation and/or painting charges.</li>
                    <li>2. 0% Service Tax is chargeable for Accessories installation and painting services (except for service and repair purposes).</li>
                    <li>3. Actual accessories may vary in detail from images shown.</li>
                    <li>4. Accessories vary according to the different variants available.</li>
                    <li>5. Prices and specifications are subjected to change without prior notice.</li>
                    <li>6. Accessories warranty are subjected to Honda Authorised supplier’s terms and conditions. Please refer to nearby Honda Malaysia Authorised Dealer for warranty information.</li>
                    </ul>
                @else
                <ul class="note">
                    <li>1. All accessories prices are inclusive installation and/or painting charges.</li>
                    <li>2. 0% Service Tax is chargeable for Accessories installation and painting services (except for service and repair purposes).</li>
                    <li>3. Actual accessories may vary in detail from images shown.</li>
                    <li>4. Features also vary according to the different variants available.</li>
                    <li>5. Prices and specifications are subjected to change without prior notice.</li>
                    <li>6. Accessories warranty are subjected to Honda Authorised supplier’s terms and conditions. Please refer to any nearby Honda Malaysia Authorised Dealer for warranty information.</li>
                    </ul>
                @endif
        </div>
        @if ($model_slug == 'wr-v')
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note">
                <li>1. *Without LED light.</li>
                <li>2. **RS Variant STD Fitted with Front Step Garnish (Without LED light).</li>
                </ul>
            </div>        
        @endif
        @if ($model_slug == 'crv')
            <div class="note-title more">DISCLAIMERS</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note">
                <li>1. *For e:HEV RS & V, Foot Light is standard</li>
                </ul>
            </div>        
        @endif
    </div>
</section>

@if ($model_slug == 'en1')

    <script>
        $(document).ready(function(){
            let menuList = document.querySelector('#modelmenu ul');

            let packagesListItem = document.querySelector('.sai-navitem-packages');
            if (packagesListItem) {
                menuList.removeChild(packagesListItem);
            }

            let mobileMenuList = document.querySelector('.for-mobile .menu-toggle ul');

            let mobilePackagesListItem = mobileMenuList.querySelector('.sai-navitem-packages');
            if (mobilePackagesListItem) {
                mobileMenuList.removeChild(mobilePackagesListItem);
            }

        })
    </script>
      
@endif

<script>
    $(document).ready(function(){
        $('.tab-slider-trigger').hide();

        function responseToDeeplink(){
            //console.log('hash', window.location.hash);
            var hash = window.location.hash;
            hash = hash.replace("#", "");
            if($.inArray(hash, ['interior', 'exterior', 'protection'])>-1){
                $('.link-'+hash).trigger('click');
            }
        }
        setTimeout(function(){
            // need to wait a little to allow global script run at footer to initiate first
            $('.details-container').each(function(){
                var div = $(this);
                if(div.find('li').length>0){
                    $('.link-'+div.data('tabsection')).show();
                    if(div.data('tabsection') == 'interior' || $('#tab-interior li').length==0){
                        // if the first tab content is empty, trigger this content
                        $('.link-'+div.data('tabsection')).trigger('click');
                        console.log(div.data('tabsection'))
                    }
                }
            })
            responseToDeeplink();
        }, 100);

        $(window).on('hashchange', function( e ) {
            responseToDeeplink();
        });

    })
</script>

@stop
