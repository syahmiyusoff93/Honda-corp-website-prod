@php
    $APIPATH = config('global.APIPATH');
    $honda_api_context = config('global.APICONTEXT');

    $data = file_get_contents($APIPATH.'model_'.$model_slug.'_variants.json', false, $honda_api_context);
    $data = json_decode($data);
    $model_info = $data->model;
    $variant_info = $data->payload;

    $data = file_get_contents($APIPATH.'model_'.$model_slug.'_gallery_ext360.json', false, $honda_api_context);
    $data = json_decode($data);

    /*$accessories = file_get_contents($APIPATH.'model_'.$model_slug.'_accessories.json', false, $honda_api_context);
    $accessories = json_decode($accessories);
    $accessories = $accessories->payload;

    foreach($accessories as $item){
        $accindexed[$item->id] = $item;
    }  */

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

@endphp

<style>
    .model-ref-- { opacity:.3;}
    .exterior-model, .model-default, .model-default-bg {position: absolute !important; top:0; left:50%; border: 0px solid red; transform:translateX(-50%); max-width:900px; }
    .car-parts-holder {position: relative;max-width:900px; left: 50%; transform: translateX(-50%);}

    .exterior-holder, .modelexterior {width:unset;}
    .spritespin {
        width: 100%;
    }
    /* .model-inner-container .intro {margin-bottom:0;} */
    .colorpickerdisclaimer {font-size: 0.77rem;line-height: 1.5em;font-weight: 400;letter-spacing: 0.6px;margin: 20px 35px 20px 35px;max-width: 304px;}
    .inner-color-container .color-name {text-align: center;}


</style>

<script>
        var currentcolor_id = 0;
        var imageratio = 1;

        console.log = function(){}

        $(document).ready(function(){
            jQuery.support.cors = true;
            var spritedata, spritedata_acc;
            function __spritespin_destroy(){
                var div = $(".car-parts-holder, .exterior-model, .model-default, canvas");
                // destroy the instance
                div.spritespin("destroy");
                div.attr("style", "");
                div.html("");

            }

            function __resizeAssets(){
                var div = $('.model-default, .model-default-bg, .exterior-model, .exterior-holder, .modelexterior');
                var hh = $('.model-default').width() * imageratio;

                if ( $(window).width() > 800) {
                div.css('width', '75%');
                }
                else {
                div.css('width', '100%');
                }

                //div.css('height', hh+'px');
                div.css('height', '222px');
                //console.log('ll', imageratio)
            }

            function __constuctHTML(){

                var ww,hh, cc, dmc;

                $.each( spritedata_acc, function( key, val ) {
                    //spritedata.meta.asset_url
                    //console.log('spriteata', val)
                    if(val.spritedata!=null){
                        ww = val.spritedata.sprite_info.width;
                        hh = val.spritedata.sprite_info.height;
                        cc = val.spritedata.sprite_info.count;

                        if(spritedata.meta.asset_url=='<?php echo env('AWS_CLOUDFRONT_URL'); ?>'){
                            spritedata.meta.asset_url = '';
                        }

                        var slices = [];
                        $.each( val.spritedata.sprite, function( kk, vv ) {
                            var fpath = val.spritedata.sprite[kk];
                            if(fpath.substring(0,3)!='http'){
                                fpath = spritedata.meta.asset_url + fpath;
                            }
                            slices.push(fpath);
                        });

                        $('.car-parts-holder').append('<div id="sa_'+val.accid+'_'+val.colorid+'" class="exterior-model colorgroup'+val.colorid+' accgroup'+val.accid+' "></div>');
                        $('#sa_'+val.accid+'_'+val.colorid).spritespin({
                            source		: slices,
                            width		: ww,
                            height		: hh,
                            sense		: -1,
                            frames		: cc,
                            animate		: false,
                            loop		: false,
                            responsive  : true,
                            //onDraw      : __resizeAssets
                        })
                    }

                });


            }

            function __switch_color(id){

                var ww = spritedata.payload[id].sprite_info.width;
                var hh = spritedata.payload[id].sprite_info.height;

                imageratio = hh/ww;
                console.log('ratio', imageratio)
                __resizeAssets();

                var frames=[];

                if(spritedata.meta.asset_url=='<?php echo env('AWS_CLOUDFRONT_URL'); ?>'){
                    spritedata.meta.asset_url = '';
                }
                $.each(spritedata.payload[id].sprite, function(key,val){
                    frames.push(spritedata.meta.asset_url+val);
                })

                $(".model-default-bg").spritespin({
                    width : 540,
                    height: 222,
                    frames: frames.length,
                    sense : -1,
                    source: frames,
                    animate : false,
                    loop: false,
                    responsive: true,

                });

                $(".model-default").spritespin({
                    width : ww,
                    height: hh,
                    frames: frames.length,
                    behavior: "drag", // "hold"
                    sense : -1,
                    source: frames,
                    animate : false,
                    loop: false,
                    responsive: true,
                    onDraw : __resizeAssets,

                    onFrame: function() {
                        api = $('.model-default').spritespin('api');
                        var data = api.data;
                        $(".exterior-model, .model-default-bg").each(function(){
                            $(this).spritespin('api').updateFrame(data.frame);
                        })
                    }

                });

            }

            $.getJSON( "/api/model/{{$model_slug}}/colors", function( data ) {
                spritedata = data;

                console.log('midata', data)

                if(spritedata.payload==null || spritedata.payload=='null' || spritedata.payload.length==0){
                    $('.inner-color-container').hide();
                    return false;
                }

                $('.inner-color-container').show();

                var items = [];
                $.each( spritedata.payload, function( key, val ) {
                  items.push( '<li class="btn-color-exterior" style="background-color:'+val.color_code+'" data-cname="'+val.name+'" data-cid="'+key+'" data-sysid="'+val.color_id+'"></li>' );
                });
                $('.color-option-holder').html(items);

                /* ---------------------------------------------------------------- COLOR CLICK */
                $('.color-option-holder>li').click(function(){
                    currentcolor_id = $(this).data('sysid');

                    $('.color-option-holder>li').removeClass('active');
                    $(this).addClass('active');
                    $('.ajax-cta-cname').html($(this).data('cname'));

                    //__spritespin_destroy();

                    __switch_color($(this).data('cid'));

                    // layer switching
                    $('.exterior-model').hide();
                    //$('.colorgroup'+currentcolor_id).show().css({'opacity':0});
                    $('.package, .tick').removeClass('active');
                    //console.log('colorid', currentcolor_id)

                    // height control
                    $('.exterior-holder, .exteriorholder, .modelexterior').css( 'height', $('.model-default-bg').height() )

                });


                // ---------
                // load accessories sprites
                $.getJSON( "/api/model/{{$model_slug}}/accessories", function( data ) {
                    spritedata_acc = data.payload_exterior360;
                    //console.log(data.payload_exterior360);

                    // init
                    if(data.payload_exterior360!=null && data.payload_exterior360!='null'){
                        @if(@$load_accessory_360assets)
                            __constuctHTML();
                        @endif

                        $(window).resize(__resizeAssets);
                        $(window).trigger('resize');
                    }
                    $('.color-option-holder>li:nth-of-type(1)').trigger('click');
                });

            });
        });
    </script>


<div class="inner-color-container" style="display:none;">
        <div class="color-name sub-title ajax-cta-cname">Loading...</div>
        <div class="modelexterior">
            <div class="exterior-holder">
            <div class="model-indicator" style="position:absolute; bottom:0; padding:0 10px; text-align:center;width:100%;"><img src="{{url('img/mock/360indicator.png')}}" alt="" style="width:50%;"></div>
                <div class="model-default-bg"></div>
                <div class="car-parts-holder"></div>
                <div class="model-default model-ref" style="opacity:0 !important"></div>
            </div>
        </div>

        <ul class="color-option-holder">
            {{--  GENERATED BY JS   --}}
        </ul>
        @php
            /*
                SAI 20200507:
                Accessories additional notes now set in DeltaEcho: model > Accessories > General Settings
                No need to hard code aymore.
                DO NOT hard code any content-related stuff unless in utter DESPERATION. Even then, update DeltaEcho to accomodate the content updates and remove the hardcode
            */

            if(@$model_info->accessories->additional_copy_title && @$model_info->accessories->additional_copy_content){
                echo '<div class="colorpickerdisclaimer">';
                echo '  <span style="font-weight:500;">'.$model_info->accessories->additional_copy_title.'</span>';
                echo '  <br>'.$model_info->accessories->additional_copy_content;
                echo '</div>';
            }
        @endphp
        <div class="clearfix"></div>

    </div>

    <script src="{{url('js/spritespin.js')}}"></script>
