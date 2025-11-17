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

    foreach($accessories as $item){
        $accindexed[$item->id] = $item;
    }

    $asset_url = $data->meta->asset_url;
    $asset_url = '';
    $out = $data->payload[0];


    if(count(@$out->sprite)>0){
        $sprites = [];
        foreach($out->sprite as $item){
            $sprites[] = $asset_url.$item;
        }
        $sprites = implode(',', $sprites);
    }

    $load_accessory_360assets = true;
@endphp

@extends('layouts.modelinner')
@section('page-title')
    Colors & Accessories - Honda {{$model_info->name}}
@stop
@section('inner-content')



    <section class="model-inner-container stage-contained mainstage">
        <div class="intro first">
            <!-- <h2 class="packages-title-page">PACKAGES</h2> -->
        </div>

        @include('components.model-color360')

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
                                            $citem->title = str_replace("*","",$citem->title);
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
                                echo '

                                    <li class="package">
                                        <div class="intro-title" data-acclistid="'.implode(',', @$acc_ids).'">
                                            <span>
                                                <div class="thetitle">'.$acc->title.'</div>
                                                <div class="red">RM '.$acc->price.'</div>
                                            </span>

                                            <div class="tick active"><img src="'.url('img/interface/icn-tick.png').'" alt=""> </div>
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
            <div class="note-title more">Terms & Conditions</div>
            <div class=" expand-content" style="display: none;">
                <ul class="note">
                <li>1. All accessories prices are inclusive installation and/or painting charges.</li>
                <li>2. 0% Service Tax is chargeable for Accessories installation and painting services (except for service and repair purposes).</li>
                <li>3. 6% Service Tax is chargeable for the purposes of Accessories service and repair.</li>
                <li>4. Features also vary according to the different variants available.</li>
                <li>5. Actual accessories may vary in detail from image shown.</li>
                <li>6. Prices and specifications are subjected to change without prior notice.</li>
                <li>7. Accessories warranty are subjected to Honda Authorised supplier’s terms and conditions. Please refer to any nearby Honda Malaysia Authorised Dealer for warranty information.</li>
                </ul>
            </div>
        </div>


    </section>

    <script>

        $(document).ready(function(){

            $cslidecount = 1;

            function slideLeft(){
                //trace('slide left')
                var containerww = $('.scroll-container').width();
                var contentww = $('.package-container').width();
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

                $('.package-container').animate({'marginLeft':curpos}, 300, function(){
                    // on complete
                    checkLeftRight()
                })
            }

            function slideRight(){
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

                $('.package-container').animate({'marginLeft':Math.floor(curpos)}, 300, function(){
                    // on complete
                    checkLeftRight()
                })
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

                if(curpos <= -contentww+containerww ){
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
                //$('.exterior-model').css('opacity',0);
                $('.exterior-model').hide();

                if($(this).parent().hasClass('active')){
                    //console.log('isactive')
                    return true;
                }

                var accids = [];
                var idstring = $(this).data('acclistid');

                //console.log('idlist', idstring);
                if(typeof(idstring)=='number'){
                    accids = [idstring];
                } else {
                    accids = idstring.split(',');
                }

                //

                $.each(accids, function(key,val){
                    //$('#sa_'+val+'_'+currentcolor_id).css('opacity',1);
                    $('#sa_'+val+'_'+currentcolor_id).show();
                })
            })

        })


    </script>

    <style>
        .scroll-container {overflow-x: hidden; position: relative; width:calc(100% - 80px);margin-left:40px;}
        .package-selection .arrow-red-left {position: absolute; top:145px; left:10px; cursor: pointer;}
        .package-selection .arrow-red-right {position: absolute; top:145px; right:10px;cursor: pointer;}
        ul.package-container {width:max-content; margin:20px 0 0 0; }
        ul.package-container li.package {width:310px; width:296px; padding:20px; margin-right:0px;}
        ul.package-container li.package .content .more {color:#aaa; font-weight: 400;}
        ul.package-container li.package .intro-title span {width: 218px;}
        ul.package-container.makemecenter {margin-left: auto; margin-right:auto;}



        .disabled {border-color:gray; opacity: .5; cursor:auto; display: none;}
        .mini-seperator {height: 1px; width: 100%; background-color: rgba(151,151,151, 0.3); margin: 10px 0 25px 0;}
        .pdesc {font-size:1rem;}
        .thetitle {height:55px;}

        /* re-layout for accessories 360 */
        .model-inner-container .inner-color-container {margin-top: 120px;}
        .model-inner-container .inner-color-container .color-name {right: 15%;}
        /* .exterior-holder, .modelexterior {float:right;right:20%;margin-top: -2%;} */
        .modelexterior {float:right; /*z-index:10;*/margin-top:-70px;left:13%;}
        .color-option-holder {left: 22.7%; margin-top: 20px;}
        .colorpickerdisclaimer {left:21%;}
        .packages-title-page {margin-top: 80px;margin-bottom: -10px;} 
        

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
            ul.package-container li.package {margin-right:25px;}
            ul.package-container {margin:55px 0 0 0; }
        }
    </style>


@stop
