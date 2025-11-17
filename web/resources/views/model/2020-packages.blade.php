@php
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'model_'.$model_slug.'_variants.json', false, $honda_api_context);
    $data = json_decode($data);
    $model_info = $data->model;
    $variant_info = $data->payload;

    $data = file_get_contents($APIPATH.'model_'.$model_slug.'_gallery_ext360.json', false, $honda_api_context);
    $data = json_decode($data);

    $accessories = file_get_contents($APIPATH.'model_'.$model_slug.'_accessories.json', false, $honda_api_context);
    $accessories = json_decode($accessories);
    $accessories = $accessories->payload;

    //dd($accessories);


    foreach($accessories as $item){
        $accindexed[$item->id] = $item;
    }

    $asset_url = $data->meta->asset_url;
    $asset_url = '';
    
    if (($model_slug != 'city-hatchback') && ($model_slug != 'civic-modulo') && ($model_slug != 'wr-v')  ) {
    $out = $data->payload[0];
        if(count(@$out->sprite)>0){
            $sprites = [];
            foreach($out->sprite as $item){
                $sprites[] = $asset_url.$item;
            }
            $sprites = implode(',', $sprites);
        }
    }

    $load_accessory_360assets = true;
@endphp

@extends('layouts.modelinner')
@section('page-title')
    Colors & Accessories - Honda {{$model_info->name}}
@stop
@section('inner-content')

    <script>
        var color_viewtype='packages';
    </script>


    <section class="model-inner-container stage-contained mainstage">
        <div class="intro first">
            <!-- <h2 class="packages-title-page">PACKAGES</h2> -->
        </div>

        @include('model.component.exterior-360')

        <div class="clearfix"></div>
        <h2 class="packages-title-page">PACKAGES</h2>
        <div class="package-selection">
            <div class="scroll-container">
                <ul class="package-container">

                    @php
                        $_cc = 0;
                        foreach($accessories as $acc){
                            if($acc->type=='package'){

                                $childacc ='';
                                $acc_ids = [];
                                if(!empty($acc->accessories)){
                                    foreach($acc->accessories as $child){
                                        if(@$accindexed[$child]){
                                            $citem = $accindexed[$child];
                                            //dd($citem);
                                            if($model_slug != 'wr-v' && $model_slug != 'civic' && $model_slug != 'hrv'){
                                                $citem->title = str_replace("*","",$citem->title);
                                            }
                                            $childacc .='
                                                <li>
                                                    <img class="photo" src="'.$asset_url.$citem->img.'" alt="">
                                                    <div class="body-copy black des">'.$citem->title.'</div>
                                                </li>
                                            ';
                                            $acc_ids[] = $citem->id;
                                        }
                                    }
                                }
                                $_cc++;

                                //dd($acc);

                                $tick = @$acc->disable_selection_button==1 ? '' : '<div class="tick active"><img src="'.url('img/interface/icn-tick.png').'" alt=""></div>';

                                if($acc->price=='0.00'){
                                    $output_price = "-";
                                    $output_color = "grey";
                                }
                                else{
                                    $output_price = "RM ".$acc->price;
                                    $output_color = "red";
                                }
                                echo '

                                    <li class="package">
                                        <div class="intro-title" data-acclistid="'.implode(',', @$acc_ids).'">
                                            <span>
                                                <div class="thetitle">'.$acc->title.'</div>
                                                <div class="'.$output_color.'">'.$output_price.'</div>
                                            </span>

                                            '.$tick.'
                                        </div>
                                        <div class="clearfix"></div>

                                        <div class="content body-copy">

                                            <div class="more">More Details</div>
                                            <div class="expand-content">

                                                <div class="mini-seperator"></div>
                                                <div class="body-copy">'.$acc->desc.'</div>
                                                <div class="note red color-tnc">'.$acc->notes.'</div>
                                                <ul>
                                                    '.$childacc.'
                                                </ul>
                                            </div>
                                        </div>

                                    </li>
                                ';
                            }
                        }
                    @endphp
                </ul>

            </div>
            <div class="arrow-red-left"></div>
            <div class="arrow-red-right"></div>
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
                {{-- <ul class="note"> --}}
                    {{-- <li>1. All accessories prices are inclusive installation and/or painting charges.</li>
                    <li>2. 0% Service Tax is chargeable for Accessories installation and painting services (except for service and repair purposes).</li>
                    <li>3. 6% Service Tax is chargeable for the purposes of Accessories service and repair.</li>
                    <li>4. Actual accessories may vary in detail from images shown.</li>
                    <li>5. Features also vary according to the different variants available.</li>
                    <li>6. Prices and specifications are subjected to change without prior notice.</li>
                    <li>7. Accessories warranty are subjected to Honda Authorised supplier’s terms and conditions. Please refer to any nearby Honda Malaysia Authorised Dealer for warranty information.</li>
                    </ul> --}}

                    <ul class="note">
                        <li>1. All accessories prices are inclusive installation and/or painting charges.</li>
                        <li>2. 0% Service Tax is chargeable for Accessories installation and painting services (except for service and repair purposes).</li>
                        <li>3. Actual accessories may vary in detail from images shown.</li>
                        <li>4. Features also vary according to the different variants available.</li>
                        <li>5. Prices and specifications are subjected to change without prior notice.</li>
                        <li>6. Accessories warranty are subjected to Honda Authorised supplier’s terms and conditions. Please refer to any nearby Honda Malaysia Authorised Dealer for warranty information.</li>
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

    <script>

        $(document).ready(function(){

            // adding * to hrv package 
            var HRVtitle = "Colors & Accessories - Honda HR-V | Honda Malaysia";
            var Citytitle = "Colors & Accessories - Honda City | Honda Malaysia";
            if ($(document).attr('title') == Citytitle) {
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(5) > div.content.body-copy > div.expand-content > ul > li:nth-child(3) > div").text("Trunk Tray*")
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(6) > div.content.body-copy > div.expand-content > ul > li:nth-child(3) > div").text("Trunk Tray*")
            }

            var link = window.location.href;
            var isHRV = /hrv/i.test(link);
            var isWRV = /wr-v/i.test(link);
            var isCity = /city/i.test(link);
            var isCityHB = /city-hatchback/i.test(link);
            var isCRV = /crv/i.test(link);

            if(isHRV){
                // rearrange hrv utility packages
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(4) > div.content.body-copy > div.expand-content > ul > li:nth-child(4)").insertAfter("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(4) > div.content.body-copy > div.expand-content > ul > li:nth-child(1)");
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(4) > div.content.body-copy > div.expand-content > ul > li:nth-child(5)").insertBefore("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(4) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)");
            }

            if(isWRV){
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(4) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)").insertAfter("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(4) > div.content.body-copy > div.expand-content > ul > li:nth-child(5)");
            }

            if(isCity){
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(5) > div.content.body-copy > div.expand-content > ul > li:nth-child(2)").insertAfter("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(5) > div.content.body-copy > div.expand-content > ul > li:nth-child(4)");
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(6) > div.content.body-copy > div.expand-content > ul > li:nth-child(2)").insertAfter("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(6) > div.content.body-copy > div.expand-content > ul > li:nth-child(4)");
            }

            if(isCityHB){
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(5) > div.content.body-copy > div.expand-content > ul > li:nth-child(1)").insertAfter("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(5) > div.content.body-copy > div.expand-content > ul > li:nth-child(4)");
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(5) > div.content.body-copy > div.expand-content > ul > li:nth-child(2)").insertAfter("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(5) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)");

                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(6) > div.content.body-copy > div.expand-content > ul > li:nth-child(1)").insertAfter("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(6) > div.content.body-copy > div.expand-content > ul > li:nth-child(4)");

                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(7) > div.content.body-copy > div.expand-content > ul > li:nth-child(1)").insertAfter("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(7) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)");
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(7) > div.content.body-copy > div.expand-content > ul > li:nth-child(1)").insertAfter("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(7) > div.content.body-copy > div.expand-content > ul > li:nth-child(2)");
            }

            if(isCRV){
                // $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(1) > div.content.body-copy > div.expand-content > ul > li:nth-child(4)").insertBefore("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(1) > div.content.body-copy > div.expand-content > ul > li:nth-child(1)");
                // $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(2) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)").insertBefore("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(2) > div.content.body-copy > div.expand-content > ul > li:nth-child(1)");
                // $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(2) > div.content.body-copy > div.expand-content > ul > li:nth-child(4)").insertBefore("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(2) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)");

                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(2) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)").insertBefore("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(2) > div.content.body-copy > div.expand-content > ul > li:nth-child(1)");
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(2) > div.content.body-copy > div.expand-content > ul > li:nth-child(4)").insertBefore("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(2) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)");

                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(3) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)").insertBefore("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(3) > div.content.body-copy > div.expand-content > ul > li:nth-child(1)");
                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(3) > div.content.body-copy > div.expand-content > ul > li:nth-child(4)").insertBefore("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(3) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)");

                $("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(4) > div.content.body-copy > div.expand-content > ul > li:nth-child(3)").insertBefore("#mainstage > section.model-inner-container.stage-contained.mainstage > div.package-selection > div.scroll-container > ul > li:nth-child(4) > div.content.body-copy > div.expand-content > ul > li:nth-child(1)");
            }


            $cslidecount = 1;
            var isSliding = false;

            function slideLeft(){
                if (!isSliding) {
                    // trace('slide left')
                    var containerww = $('.scroll-container').width(); //1198
                    var contentww = $('.package-container').width(); //2396
                    if(containerww<768){
                        containerww = 322;
                        $cslidecount++;
                        if($cslidecount > $('li.package').length){
                            $cslidecount--;
                            return true;
                        }
                    }
                    if(contentww<containerww || $(this).hasClass('disabled')){
                        return false;
                    }

                    var curpos = $('.package-container').css('margin-left');
                    curpos = parseFloat(curpos);
                    curpos -= containerww;
                    if (!$('.arrow-red-right').hasClass('disabled')) {
                        isSliding = true;
                        $('.package-container').animate({'marginLeft':curpos}, 300, function(){
                            // on complete
                            checkLeftRight()
                            isSliding = false;
                        })
                    }
                }
            }

            function slideRight(){
                if (!isSliding) {
                    //trace('slide right')
                    var containerww = $('.scroll-container').width();
                    var contentww = $('.package-container').width();
                    if(containerww<768){
                        $cslidecount--;
                        containerww = 322;
                    }

                    if(contentww<containerww || $(this).hasClass('disabled')){
                        return false;
                    }

                    var curpos = $('.package-container').css('margin-left');
                    curpos = parseFloat(curpos);
                    curpos += containerww;

                    if(curpos>0){
                        curpos = 30;
                        $cslidecount=1;
                    }

                    if (!$('.arrow-red-left').hasClass('disabled')) {
                        isSliding = true;
                        $('.package-container').animate({'marginLeft':Math.floor(curpos)}, 300, function(){
                            // on complete
                            checkLeftRight()
                            isSliding = false;
                        })
                    }
                }
            }

            function checkLeftRight(){
                var containerww = $('.scroll-container').width();
                var contentww = $('.package-container').width();
                var curpos = parseFloat($('.package-container').css('margin-left'));

                $('ul.package-container').removeClass('makemecenter')

                //console.log(containerww, contentww)
                if(containerww<768 || contentww-10 < containerww){
                    $('.arrow-red-right, .arrow-red-left').hide();
                    $('ul.package-container').addClass('makemecenter');
                    return true;
                }

                $('.arrow-red-right, .arrow-red-left').show().removeClass('disabled');

                if(curpos>=0){
                    $('.arrow-red-left').addClass('disabled');
                }
                trace("curpos: " + curpos)
                trace("contentww: " + contentww)
                trace("containerww: " + containerww)
                if(curpos <= (-contentww+containerww + 50) ){
                    $('.arrow-red-right').addClass('disabled');
                }
            }

            $('.arrow-red-right').click(slideLeft);
            $('.arrow-red-left').click(slideRight);
            checkLeftRight();

            $(".scroll-container")  .on('swipeleft',  slideLeft)
                                    .on('swiperight', slideRight)

            //

            $('.intro-title').click(function(){
                hideAllAccessories();
                if($(this).parent().hasClass('active')){
                    return true;
                }

                showAccPackage($(this).data('acclistid'));
            })

        })


    </script>

    <style>
        .scroll-container {overflow-x: hidden; position: relative; width:calc(100% - 80px);margin-left:40px;}
        .package-selection .arrow-red-left {position: absolute; top:145px; left:10px; cursor: pointer;}
        .package-selection .arrow-red-right {position: absolute; top:145px; right:10px;cursor: pointer;}
        ul.package-container {width:max-content; margin:20px 0 0 0; font-size: 0; }
        ul.package-container li.package {width:310px; width:296px; padding:20px;}
        ul.package-container li.package:not(:last-child) { margin-right: 4px; }
        ul.package-container li.package .content .more {color:#aaa; font-weight: 400;}
        ul.package-container li.package .intro-title span {width: 218px;}
        ul.package-container.makemecenter {margin-left: auto; margin-right:auto;}



        .disabled {border-color:gray; opacity: .5; cursor:auto; display: none;}
        .mini-seperator {height: 1px; width: 100%; background-color: rgba(151,151,151, 0.3); margin: 10px 0 25px 0;}
        .pdesc {font-size:1rem;}
        .thetitle {/*height:55px;*/height:69px;}

        /* re-layout for accessories 360 */

        .model-inner-container .inner-color-container {margin-top: 120px; text-align: unset;}
        /* .exterior-holder, .modelexterior {float:right;right:20%;margin-top: -2%;} */
        .modelexterior {left: unset; width: unset; height: unset;}

        .color-option-holder {margin-top: 20px;}
        .colorpickerdisclaimer {text-align: center; max-width:304px;}
        .packages-title-page {margin-top: 80px;margin-bottom: -10px;}

        /* 20200521 SAIFULYUSOFF OVERWRITE UNTUK CREATE FROM SCRATCH*/
        @media only screen and (min-width:840px){
            .modelexterior {float:right; width:max-content; right:calc(50% - 200px); transform:translateX(50%);}
            .colortool {float:left; left:calc(50% - 200px); transform: translateX(-50%); text-align: center; width: max-content;}
            .prime-title {display: none;}
        }
        @media only screen and (max-width:839px){
            .prime-title {display: block;}
            .secondary-title {display: none;}
        }

        /* SAI OVERWRITE ENDS */

        @media only screen and (max-width:768px){
            .package-selection {margin-top:20px;}
            ul.package-container {margin-left:30px;}
            .scroll-container {width:100%; margin-left:0}
            /* ul.package-container li.package {width:279px; padding:20px; margin-right:15px;}
            ul.package-container li.package .intro-title span {width: 200px;} */

            /* re-layout for accessories 360 */
            .model-inner-container .inner-color-container {margin-top: unset;}
            .model-inner-container .inner-color-container .color-name {right: unset;}
            .modelexterior {float:unset; margin-top:unset;left:unset;}
            .color-option-holder {left: unset; margin-top: unset;}
            .colorpickerdisclaimer {left:unset;}
            .packages-title-page {margin-top: unset;margin-bottom:unset;}
        }

        @media only screen and (max-width:480px){
            ul.package-container li.package:not(:last-child) {margin-right:25px;}
            ul.package-container {margin:55px 0 0 0; }
            .thetitle {height:110px;}
        }
    </style>


@stop
