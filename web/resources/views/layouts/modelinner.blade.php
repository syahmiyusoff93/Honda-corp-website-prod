@php
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'model_'.$model_slug.'_variants.json', false, $honda_api_context);
    $data = json_decode($data);
    $model_info = $data->model;
    $variant_info = $data->payload;

    // REQUIRE $inner_section from route/controller/parent

    $route_name = \Route::current()->getName();

    $logolink =  url('/model/'.$model_slug);

    // modelmenu - Label, slug, site relative link, page hash link, special class
            $modelmenu = array();
            $modelmenu[] = ['Exterior','exterior','/exterior','#exterior'];
            $modelmenu[] = ['Interior','interior','/interior','#interior'];
            $modelmenu[] = ['Performance','performance','/performance','#performance'];
            $modelmenu[] = ['Safety','safety','/safety','#safety'];

    if($model_info->got_hybrid)
            $modelmenu[] = ['Hybrid','hybrid','/hybrid','#hybrid'];

    switch($route_name){

        case 'modellanding':

            $modelmenu[] = ['Gallery','gallery','/gallery','#gallery'];
            $modelmenu[] = ['Accessories','accessories','/accessories','#colour-accessories'];
            // $modelmenu[] = ['Colours & Accessories','accessories','/accessories','#colour-accessories'];
            $modelmenu[] = ['Specs & Price','spec','/spec','#spec-price'];

            $logolink = '#top';
            break;

        case 'colour':
        case 'packages':
        case 'accessories':

            $modelmenu = [];
            $modelmenu[] = ['Packages','packages','/packages','#packages'];
            $modelmenu[] = ['Accessories','accessories','/accessories','#accessories', ''];
            break;

        case 'spec':
        case 'price':

            $modelmenu = [];
            $modelmenu[] = ['Specifications','spec','/spec','#spec-price'];
            $modelmenu[] = ['Pricing','pricing','/pricing','#pricing', ''];
            break;
    }

    if($model_slug=='type-r'){
        //overide for Type-R
        $modelmenu = [];
        if($route_name == 'modellanding'){
            $modelmenu[] = ['Performance','performance','/performance','#performance'];
            $modelmenu[] = ['Interior','interior','/interior','#interior'];
            $modelmenu[] = ['Exterior', 'exterior', '/exterior', '#exterior'];
            $modelmenu[] = ['Gallery','gallery','/gallery','#gallery'];
            $modelmenu[] = ['Accessories','accessories','/accessories','#colour-accessories'];
            $modelmenu[] = ['Specifications','spec','/spec','#spec-price'];
        }
        switch($route_name){
        case 'accessories':
            $modelmenu = [];
            $modelmenu[] = ['Accessories','accessories','/accessories','#accessories', ''];
            break;

        case 'spec':
            $modelmenu = [];
            $modelmenu[] = ['Specifications','spec','/spec','#spec-price'];
            break;
        }


    }


    // add shopping tool as last item
    $modelmenu[] = ['Shopping Tools','shopping-tools','#shopping-tools','#shopping-tools', 'mobile-st'];


@endphp


@extends('layouts.base')

@section('content')

    @if($route_name == 'modellanding')

        <script>
            var menus = JSON.parse('{!!json_encode($modelmenu)!!}');

            $(function(){
                function __subnavhighlighting(){
                    var scrolltop = $(document).scrollTop();
                    var offset = 200;
                    //console.log('scrolltop', $(document).scrollTop());
                    var last;
                    $('.sai-navitem a').removeClass('active');
                    menus.forEach(function(item, i){

                        if(scrolltop > $(item[3]).position().top - offset){
                            //console.log('pos', item[1]);
                            last = item;
                        }

                    })
                    if(last!=undefined){
                        $('.sai-navitem-'+last[1]+' a').addClass('active');
                    }
                }

                $(document).scroll(__subnavhighlighting);
                __subnavhighlighting();

            })
        </script>

    @else

        <script>
            $(function(){
                $('.sai-navitem-{{@$inner_section}} a').addClass('active');
            })
        </script>

    @endif


    <section id="modelmenu" class="model-menu">
        <div class="model-nav">
            <a href="{{$logolink}}" class="modellanding-back-link">
                <div class="modal-landing-logo {{ ($route_name == 'modellanding') ? 'model-name' : 'model-name-inner' }} " onclick="window.location='{{$logolink}}'" >

                        @if($route_name != 'modellanding')
                            <img src="{{url('img/interface/back-icon.svg')}}" alt="Back link" class="back-icon">
                            <span class="backtocopy" style="color:#fff; padding: 0 5px; width:unset;bottom:3px;">BACK TO</span>
                        @endif
                        <img src="{{$model_info->name_img_trimmed}}" alt="Model stylised logo" style="height:20px;">

                </div>
            </a>
            <div class="mobile-bar">
                <div class="toggle-arrow">
                    <div class="arrow-white-down"></div>
                </div>
                <div class="current-section"></div>
            </div>

            <div class="smooth-slide for-desktop {{ ($route_name == 'modellanding') ? 'modal-landing-dropdown' : '' }}">
                <ul>
                     <script> console.log("+ {{ $route_name}}"); </script>
                    @php
                        foreach($modelmenu as $i=>$item){
                            $__link = ($route_name == 'modellanding') ? $item[3] : url('/model/'.$model_slug.$item[2]);
                            $__class = ($route_name == $item[1] && false) ? ' active ' : '';
                            $__linkname = $item[0];
                            if ($i < count($modelmenu)-1) {
                                // run for all item in menu except the last one - shopping tool

                                if ( $model_slug == 'odyssey' ) {
                                  if ($route_name != 'spec') {   
                                        if (( $model_slug == "odyssey") && ( $__linkname == "Specs & Price" ))  $__linkname = "Specifications";
                                        $__out = '<li class="sai-navitem sai-navitem-'.$item[1].' '.@$item[4].' '.$__class.'"><a href="'.$__link.'"><span></span>'.$__linkname.'</a></li>';
                                       
                                  }
                                  else {
                                     if ( $i == 0) $__out = '<li class="sai-navitem sai-navitem-'.$item[1].' '.@$item[4].' '.$__class.'"><a href="'.$__link.'"><span></span>'.$__linkname.'</a></li>';
                                     else  $__out = '';
                                  }

                                }
                                else {
                                    $__out = '<li class="sai-navitem sai-navitem-'.$item[1].' '.@$item[4].' '.$__class.'"><a href="'.$__link.'"><span></span>'.$__linkname.'</a></li>';
                                    
                                }

                                


                                echo $__out;
                            }
                        }
                    @endphp

                </ul>
            </div>
            <div class="clearfix"></div>

            <div class="for-desktop smooth-slide btn-shopping-tools {{ ($route_name == 'modellanding') ? 'modal-landing-st' : '' }}">
                {{--  SHOPPING TOOL LINK FOR DESKTOP  --}}
                <a id="shoppingtools" href="{{$__link}}" class=""><span>{{$__linkname}}<img src="{{url('img/interface/arrow-short-right-red.svg')}}" alt=""></span></a>
            </div>


            {{--  ---------------------- MOBILE ---------------------------  --}}

            <div class="for-mobile">
                <div class="menu-toggle smooth-slide {{ ($route_name == 'modellanding') ? 'modal-landing-dropdown' : '' }}">
                    <ul>
                        @php
                            foreach($modelmenu as $item){
                                $__link = ($route_name == 'modellanding') ? $item[3] : url('/model/'.$model_slug.$item[2]);
                                $__class = ($route_name == $item[1]) ? ' active ' : '';


                                if ( $model_slug == 'odyssey' ) {
                                    if ($route_name != 'spec') {   
                                        if (( $model_slug == "odyssey") && ( $item[0] == "Specs & Price" ))  
                                            echo '<li class="sai-navitem sai-navitem-'.$item[1].' '.@$item[4].' '.$__class.'"><a href="'.$__link.'" style="padding-right: 170px;"><span></span>Specifications</a></li>';
                                        else
                                            echo '<li class="sai-navitem sai-navitem-'.$item[1].' '.@$item[4].' '.$__class.'"><a href="'.$__link.'" style="padding-right: 170px;"><span></span>'.$item[0].'</a></li>';
                                    }
                                    else {
                                       if ( $item[0] != 'Pricing' )  echo '<li class="sai-navitem sai-navitem-'.$item[1].' '.@$item[4].' '.$__class.'"><a href="'.$__link.'" style="padding-right: 170px;"><span></span>'.$item[0].'</a></li>';
                                    }
                                }
                                else {
                                    echo '<li class="sai-navitem sai-navitem-'.$item[1].' '.@$item[4].' '.$__class.'"><a href="'.$__link.'" style="padding-right: 170px;"><span></span>'.$item[0].'</a></li>';
                                }


                            }
                        @endphp
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    </section>

    <script>
        $(function(){
            var url = window.location.href
			var hash = url.split('#')[1];
			if(hash=='shopping-tools'){
                $('#shoppingtools span').trigger('click');
            }

            // 20200904-SAI:  MIGRATED FROM GLOBAL FOOTER TO ONLY APPLIES TO MODEL PAGES.
            window.onbeforeunload = function () {
                window.scrollTo(0, 0);
            }
        })
    </script>

    <style>
        .back-icon {bottom:3px;}
        .modellanding-back-link {padding-right:0px;}


        @media only screen and (max-width:640px){
            .back-icon {bottom:0px;}
            .modellanding-back-link {padding-right:135px;}
        }
    </style>

    @yield('inner-content', '')
@stop

