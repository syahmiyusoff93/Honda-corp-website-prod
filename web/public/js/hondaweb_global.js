// helpers

function getWidth() {
    return Math.max(
        document.body.scrollWidth,
        document.documentElement.scrollWidth,
        document.body.offsetWidth,
        document.documentElement.offsetWidth,
        document.documentElement.clientWidth
    );
}

    function getHeight() {
    return Math.max(
        document.body.scrollHeight,
        document.documentElement.scrollHeight,
        document.body.offsetHeight,
        document.documentElement.offsetHeight,
        document.documentElement.clientHeight
    );
}

function trace(msg){
    console.log(msg);
}

function pad(num, size) {
    var s = num+"";
    while (s.length < size) s = "0" + s;
    return s;
}

// landing: model scroll

var landing_model_card_xpos = 0;

function moveX(xx){
    anime({targets: '.model-selection-wrapper', translateX: xx, duration: 300, easing: 'easeInOutQuad'});
}

function modelCardMoveLeft(){
    landing_model_card_xpos -= getWidth();
    moveX(landing_model_card_xpos);
}

function modelCardMoveRight(){
    landing_model_card_xpos += getWidth();
    moveX(landing_model_card_xpos);
}

function processTabularOutput(label, tickimg){
    if(typeof label == 'string'){
        label = label.trim();
        switch(label.toLowerCase()){
            case 'y':
            case 'yes':
            case 'true':
            case 1:
                label = '<img src="'+tickimg+'" />';
                break;
            case 'n':
            case 'no':
            case 'n/a':
            case 'N/A':
            case undefined:
                label = '';
                break;
        }
        return label;
    }
    return '';
}

function copyToClipboard(str){
    el = document.createElement('textarea');
    el.value = str;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
}


/* REQUIRE JQUERY */

    /**
    * jQuery plugin to replace text strings
    *
    * Taken from @link http://net.tutsplus.com/tutorials/javascript-ajax/spotlight-jquery-replacetext/
    */

    $.fn.replaceText = function( search, replace, text_only ) {
    return this.each(function(){
            var node = this.firstChild,
            val, new_val, remove = [];
            if ( node ) {
                do {
                if ( node.nodeType === 3 ) {
                    val = node.nodeValue;
                    new_val = val.replace( search, replace );
                    if ( new_val !== val ) {
                    if ( !text_only && /</.test( new_val ) ) {
                        $(node).before( new_val );
                        remove.push( node );
                    } else {
                        node.nodeValue = new_val;
                    }
                    }
                }
                } while ( node = node.nextSibling );
            }
            remove.length && $(remove).remove();
        });
    };
    $.fn.highlightText = function( search ) {
        return this.replaceText(/\b(search)\b/gi, '<span class="highlight">$1</span>');
    }


function addAbilityToUncheckRadioInput(){
    $('p:has(input[type=radio])').on('mousedown', function(e){
    var radio = $(this).find('input[type=radio]');
    var wasChecked = radio.prop('checked');
    radio[0].turnOff = wasChecked;
    radio.prop('checked', !wasChecked);
    });

    $('p:has(input[type=radio])').on('click', function(e){
    var radio = $(this).find('input[type=radio]');
    radio.prop('checked', !radio[0].turnOff);
    radio[0]['turning-off'] = !radio[0].turnOff;
    });
}
function replaceNonBreakableHyphens(div){
    div.each(function(){
        //replace hypens with no-breaking ones
        $txt = $(this);
        if ($txt.html().indexOf("<") == -1 && $txt.html().indexOf(">") == -1){
            $txt.text( $txt.text().replace(/-/g, '‑') );
        }
    });
}

function normalise_td_height(){
    $('tr').each(function(){
        var tdmaxheight = 0;
        var tr = $(this);
        var tds = tr.find('td');

        replaceNonBreakableHyphens(tds);
        var col=1;
        var cellisempty = true;
        tds.each(function(){
            // process the height
            $(this).css('height', 'unset');
            var hh = $(this).outerHeight();
            if(hh>tdmaxheight){
                tdmaxheight = hh;
            }

            if(col>1 && $(this).html()!=''){
                cellisempty = false;
            }
            col++;
        })

        if(cellisempty){
            // hiding row of spec that all cell empty
            tr.hide();
        } else {
            tr.show();
            tr.find('td').each(function(){
                if($(this).html()==''){
                    $(this).html('_'); // default label for no value
                }
            })
        }
        $(tds).css('height', tdmaxheight+'px');
    })
    //console.log('cell normalised')
    checkDataRowEmpty();
}

function checkDataRowEmpty(){
    //spec-title
    $('.spec-title').each(function(){
        var maincat = $(this);
        var slug = maincat.data('slug');
        var display = 'none';
        $('.'+slug+'-child').each(function(){
            if($(this).is(':visible')){
                display = 'block';
            }
        })
        maincat.css('display', display);
        //console.log(slug);
    });
}


function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
        val = val.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
    }
    return val;
}

/*COOKIE */
function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/; secure;";
}

function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ')
            c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0)
            return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    //console.log('cookie cleared. ('+name+')')
    createCookie(name, "", -1);
}




$(function(){

    // news snippets rotate
    if($('.newslist li').length>0){
        var newsticker_hold_time = 5000;
        var news_item_displayed = 1;
        var total_news_item = $('.newslist li').length;

        function rotate_new_item(){
            $('.newslist li').slideUp();
            $('.newslist li:nth-of-type('+news_item_displayed+')').slideDown();
            news_item_displayed++
            if(news_item_displayed>total_news_item){
                news_item_displayed = 1;
            }
        }

        if($('.newslist li').length>1){
            setInterval(rotate_new_item, newsticker_hold_time);
            rotate_new_item();
        }
    }





    addAbilityToUncheckRadioInput();
    replaceNonBreakableHyphens($('.nonbreakable-hyphens'));
    normalise_td_height();

    // global close button
    $('.btn-close, .show-').click(function(){
        $('.show').hide();
        $('body').removeClass('hidden-f');
        $('body').css('overflow-y', 'auto');
        $('header').css('z-index','10');
    })


});



