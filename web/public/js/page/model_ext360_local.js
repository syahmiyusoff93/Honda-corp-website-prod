
    /*

    CUSTOM ASSET SPINNER FOR HONDA MODEL EXTERNAL 360
    Saiful Yusoff / 20200521

    Require jQuery

    */

    var apidata ;
    var ajaxcheck = 0;

    var current_color = 0;
    var current_acc = [];

    var spriteframe = 0;
    var spritetotal = 0;
    var htwratio = 1;
    var asset_actual_width = 0;
    var sprite_interaction_enabled = false;
    var mouse_startx = 0;

    var drag_threshold = 10;

    if(canvas360_maxwidth == null || canvas360_maxwidth==undefined){
        // if maximum width for the 360 asset is not defined, put a value
        var canvas360_maxwidth = 900; // original 360 asset width
        canvas360_maxwidth = 540;
    }

    if(canvas360_enable_accessories == null || canvas360_enable_accessories==undefined){
        // if not set, provide a default
        var canvas360_enable_accessories = true;
    }

    $(document).ready(function(){
        $.ajax({url: theapi, success: function(data){
            console.log(data);
            apidata = data; initStage();

        }});
    });

    function initStage(){
        ajaxcheck++;
        if(ajaxcheck==1){
            // set tyle params
            var cdata = apidata.payload[0];
            asset_actual_width = cdata.sprite_info.width;
            htwratio =  cdata.sprite_info.height / cdata.sprite_info.width
            spritetotal = cdata.sprite.length;

            console.log(spritetotal, htwratio, asset_actual_width)

            buildCarHTML();
            setInteractive();
            // rest of the functions defined in 'js/page/model_ext360.js'
        }
    }



function buildCarHTML(){

    var cdata = apidata.payload[0];

    var thecar = $('.thecar')
    thecar.html('');
    $.each(cdata.sprite, function(key, img){
        if(img.substring(0,3)=='htt'){
            asset_url = '';
        }
        thecar.append('<img class="canvasimg" src="'+asset_url+img+'" />');
    })

    resize360Assets();

    sprite_showframe(spriteframe);
    $('.thestage').fadeIn('fast');
}



function resize360Assets(){
    var ww = $(window).width(); // start with set width to window width
    ww = canvas360_maxwidth < ww ? canvas360_maxwidth : ww;  // if the maxsize is defined and smaller than window, use that
    ww = asset_actual_width < ww ? asset_actual_width : ww; // if asset size is even smaller than that, use it

    var hh = ww * htwratio;
    $('.thestage, .canvasimg').css('width', ww);
    $('.thestage, .canvasimg').css('height', hh);
}
$(window).resize(resize360Assets);

/* INTERACTIVITY -----------------------------------------------------------*/

function sprite_showframe(index){
    $('.canvasimg').hide();
    $('.canvasimg:nth-of-type('+(index+1)+')').show();
}

function setInteractive(){
    var div = $('.thecover');
    div.on('mousedown',{ passive: true }, function(e){
        mouse_startx = e.pageX;
        //console.log('start x', mouse_startx);
        div.on('mousemove', { passive: true }, car_drag);
    })

    div.on('touchstart',{ passive: true }, function(e){
        mouse_startx = e.originalEvent.touches[0].pageX;
        //console.log('touch start x', mouse_startx);
        div.on('touchmove', { passive: true }, car_drag);
    })

    $(document).mouseup(function(e){
        div.off('mousemove touchmove');
    });
}

function car_drag(e){

    var pagex = e.pageX;
    if(pagex==undefined){
        pagex = e.originalEvent.touches[0].pageX;
    }

    var travel_th = drag_threshold;
    var div = $('.thecover');
    var parentOffset = div.offset();
    var xtravel = mouse_startx - pagex;

    if(xtravel>travel_th){
        mouse_startx = pagex;
        spriteframe++
        if(spriteframe>=spritetotal){
            spriteframe = 0;
        }
        sprite_showframe(spriteframe);
    }
    if(xtravel < -travel_th){
        mouse_startx = pagex;
        spriteframe--
        if(spriteframe<0){
            spriteframe = spritetotal-1;
        }
        sprite_showframe(spriteframe);
    }
}
