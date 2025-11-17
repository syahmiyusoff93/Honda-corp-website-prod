@php

    $model_slug = 'accord';


@endphp

@extends('layouts.base')

@section('content')

    <style>
        .thestage {position:relative; background: none; transform: scale(1,1)}
        .canvascontainer {position: absolute; width: inherit; height: inherit;}
        .canvascontainer .canvasimg {position: absolute; display:none;}
        .acc-asset-holder {display: none;}

        .thecover {
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -o-user-select: none;
            user-select: none;
            background: rgba(0,0,0,0);
        }

        .model-color-option li {padding: 5px; background: lightsteelblue; cursor: pointer; border-left:10px solid white; }
    </style>

    <div class="thestage">
        <div class="thecar canvascontainer"></div>
        <div class="theacc canvascontainer"></div>
        <div class="thecover canvascontainer"></div>
    </div>
    <div class="thecontroller"></div>
    <div class="theacclist"></div>

    <script>
        var colordata, accdata ;
        var ajaxcheck = 0;

        var current_color = 0;
        var current_acc = [];

        var spriteframe = 0;
        var spritetotal = 0;
        var htwratio = 1;
        var sprite_interaction_enabled = false;
        var mouse_startx = 0;

        var drag_threshold = 30;

        var asset_url = '<?php echo env('AWS_CLOUDFRONT_URL'); ?>';

        $(document).ready(function(){
            $.ajax({url: '{{url("/api/model/$model_slug/colors")}}', success: function(data){
                colordata = data; initStage();
            }});

            $.ajax({url: '{{url("/api/model/$model_slug/accessories")}}', success: function(data){
                accdata = data;  initStage();
            }});
        });

        function initStage(){
            ajaxcheck++;
            if(ajaxcheck==2){
                //console.log(colordata);
                console.log(accdata);
                buildStage();
            }
        }

        function buildStage(){

            //console.log(colordata.payload);
            $('.thecontroller').append('<ul class="model-color-option"></ul>');
            var ul = $('.thecontroller .model-color-option')
            $.each(colordata.payload, function(key,color) {
                //console.log(color);
                ul.append('<li data-colorcode="'+color.color_code+'" data-colorindex="'+key+'" style="border-color:'+color.color_code+';">' + color.name + '</li>')
            })
            assignColorButtonAction();

            $('.model-color-option li:first-child').trigger('click');
            setInteractive();
        }

        function assignColorButtonAction(){
            $('.model-color-option li').click(function(){
                var index = $(this).data('colorindex');
                $('.thestage').fadeOut('fast', function(){
                    buildCarHTML(index);
                })
            })
        }

        function buildCarHTML(colorindex){

            var cdata = colordata.payload[colorindex];
            current_color = cdata.color_id;
            //console.log('cdata', cdata)
            //console.log('current_color', current_color)
            var thecar = $('.thecar')
            //
            thecar.html('');
            $.each(cdata.sprite, function(key, img){
                thecar.append('<img class="canvasimg" src="'+asset_url+img+'" />');
            })

            buildAccessories(colorindex);

            // style
            htwratio =  cdata.sprite_info.height / cdata.sprite_info.width
            spritetotal = cdata.sprite.length;

            var ww = cdata.sprite_info.width < $(window).width() ? cdata.sprite_info.width : $(window).width();
            var hh = ww * htwratio;

            $('.thestage, .canvasimg').css('width', ww);
            $('.thestage, .canvasimg').css('height', hh);

            //

            sprite_showframe(spriteframe);
            $('.thestage').fadeIn('fast');
        }

        function buildAccessories(colorindex){
            var adata = accdata.payload;
            var adata_asset = accdata.payload_exterior360;

            // accessories HTML
            $('.theacc').html('');
            $.each(adata_asset, function(key, item){
                if(item.spritedata!=null){
                    var classid = 'accholder-'+item.accid+'-'+item.colorid;
                    $('.theacc').append('<div class="acc-asset-holder '+classid+'"></div>');
                    $.each(item.spritedata.sprite, function(key,img){
                        $('.theacc .'+classid).append('<img class="canvasimg" src="'+asset_url+img+'" />');
                    })
                }

            })

            // accessories options
            $('.theacclist').html('<ul></ul>');
            $.each(adata, function(key, item){
                if(item.type=='exterior' || item.type=='package'){
                    var acclist = '';
                    if(item.type=='package' && item.accessories!=null){
                        acclist = 'data-accchild="'+item.accessories.join(',')+'"';
                    }
                    $('.theacclist ul').append('<li class="acc-item" data-accid="'+item.id+'" data-acctype="'+item.type+'" '+acclist+'>'+item.title+'</li>');
                }
            });

            // accessory click
            $('.acc-item').click(function(){

                $('.acc-asset-holder').hide();

                var targetacc
                current_acc = [];

                if($(this).data('acctype')=='package'){
                    //display all related package

                    var acclist = $(this).data('accchild').split(',');
                    $.each(acclist, function(key, item){
                        targetacc = $('.accholder-'+item+'-'+current_color)
                        current_acc.push(item);
                        $('.accholder-'+item+'-'+current_color).show();
                    });
                } else {
                    targetacc = $('.accholder-'+$(this).data('accid')+'-'+current_color)
                    current_acc = [$(this).data('accid')];
                    targetacc.show();
                }
            })

            // afterbuild execution

            $.each(current_acc, function(key, item){
                $('.accholder-'+item+'-'+current_color).show();
            })

        }

        /* INTERACTIVITY -----------------------------------------------------------*/

        function sprite_showframe(index){
            $('.canvasimg').hide();
            $('.canvasimg:nth-of-type('+(index+1)+')').show();
        }

        function setInteractive(){
            var div = $('.thecover');
            div.bind('mousedown touchstart',function(e){
                var parentOffset = div.offset();
                mouse_startx = e.pageX - parentOffset.left;
                //console.log('start x', mouse_startx);
                div.on('mousemove touchmove',car_drag);
            })

            div.mouseup(function(e){
                div.off('mousemove touchmove');
            });
        }

        function car_drag(e){
            var travel_th = drag_threshold;
            var div = $('.thecover');
            var parentOffset = div.offset();
            var xtravel = mouse_startx - e.pageX - parentOffset.left;

            if(xtravel>travel_th){
                mouse_startx = e.pageX - parentOffset.left;
                spriteframe++
                if(spriteframe>=spritetotal){
                    spriteframe = 0;
                }
                sprite_showframe(spriteframe);
            }
            if(xtravel < -travel_th){
                mouse_startx = e.pageX - parentOffset.left;
                spriteframe--
                if(spriteframe<0){
                    spriteframe = spritetotal-1;
                }
                sprite_showframe(spriteframe);
            }
        }


    </script>



@stop
