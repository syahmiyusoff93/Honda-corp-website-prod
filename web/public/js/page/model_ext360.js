
    /*

    CUSTOM ASSET SPINNER FOR HONDA MODEL EXTERNAL 360
    Saiful Yusoff / 20200521

    Require jQuery

    */

    var colordata, accdata,color_notes ;
    var ajaxcheck = 0;

    var current_color = 0;
    var current_acc = [];

    var spriteframe = 0;
    var spritetotal = 0;
    var htwratio = 1;
    var asset_actual_width = 0;
    var sprite_interaction_enabled = false;
    var mouse_startx = 0;

    var drag_threshold = 30;

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
        $.ajax({url: color_api, success: function(data){
            colordata = data; initStage();
        }});

        $.ajax({url: accessories_api, success: function(data){
            accdata = data;  initStage();
        }});
    });

    function initStage(){
        ajaxcheck++;
        if(ajaxcheck==2){
            // set tyle params
            color_notes = colordata.meta.color_notes
            if(color_notes==undefined){
                color_notes = {};
            }
            //console.log('color_notes',colordata)
            var cdata = colordata.payload[0];
            asset_actual_width = cdata.sprite_info.width;
            htwratio =  cdata.sprite_info.height / cdata.sprite_info.width
            spritetotal = cdata.sprite.length;

            buildStage();
            // rest of the functions defined in 'js/page/model_ext360.js'
        }
    }

function buildStage(){

    $('.color-option-holder').html('');
    $.each(colordata.payload, function(key,color) {
        var allow = true;

        // if have hide directive for spesific color
        if(color_viewtype!=undefined){
            if(color_viewtype=='exterior'){
                console.log(color_notes);
                setColorNote(color_notes.color_note_exterior)
                if(color.hide_exterior!=undefined && color.hide_exterior==1){
                    allow = false;
                }
            }
            if(color_viewtype=='packages'){
                setColorNote(color_notes.color_note_packages)
                if(color.hide_packages!=undefined && color.hide_packages==1){
                    allow = false;
                }
            }
        }

        if(allow){
            $('.color-option-holder').append( '<li class="btn-color-exterior" style="background-color:'+color.color_code+'" data-colorindex="'+key+'" data-cname="'+color.name+'"></li>' );
        }
    })

    $('.colorpickerdisclaimer').slideDown();

    assignColorButtonAction();

    $('.color-option-holder li:first-child').trigger('click');
    setInteractive();
}

function setColorNote(note){
    if(note!=undefined && note!=''){
        $('.colorpickerdisclaimer').html(note);
    }
}

function assignColorButtonAction(){
    $('.color-option-holder li').click(function(){
        $('.color-option-holder>li').removeClass('active');
        $(this).addClass('active');
        var index = $(this);
        $('.ajax-cta-cname').html(index.data('Loading...'))
        $('.thestage').fadeOut('fast', function(){
            $('.ajax-cta-cname').html(index.data('cname'))
            buildCarHTML(index.data('colorindex'));
        })
    })
}

function buildCarHTML(colorindex){

    var cdata = colordata.payload[colorindex];
    current_color = cdata.color_id;

    var thecar = $('.thecar')
    thecar.html('');
    $.each(cdata.sprite, function(key, img){
        if(img.substring(0,3)=='htt'){
            asset_url = '';
        }
        thecar.append('<img class="canvasimg" src="'+asset_url+img+'" />');
    })

    if(canvas360_enable_accessories){
        buildAccessories(colorindex);
    }

    resize360Assets();

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
                if(img.substring(0,3)=='htt'){
                    asset_url = '';
                }
                $('.theacc .'+classid).append('<img class="canvasimg" src="'+ asset_url+img +'" />');
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

        hideAllAccessories()

        var targetacc
        current_acc = [];

        if($(this).data('acctype')=='package'){
            //display all related package
            showAccPackage($(this).data('accchild'));
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
function hideAllAccessories(){
    $('.acc-asset-holder').hide();
}

function showAccPackage(list){
    hideAllAccessories()
    current_acc = [];
    //display all related package

    var acclist = list.split(',');
    $.each(acclist, function(key, item){
        targetacc = $('.accholder-'+item+'-'+current_color)
        current_acc.push(item);
        $('.accholder-'+item+'-'+current_color).show();
    });
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

    div.mouseup(function(e){
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
