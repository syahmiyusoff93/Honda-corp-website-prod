

const getParameterByName = (name, string) => {
    var regexS = "[\\?&]" + name + "=([^&#]*)",
        regex = new RegExp(regexS),
        results = regex.exec(string);
    if (results == null) return "0";
    else return decodeURIComponent(results[1].replace(/\+/g, " "));
}

const uiaddLoad = (selector, text) => {
    let html = `<div class="loader"> <div>
        <div class="lds-dual-ring"></div>
        <div class="msg" style="color:var(--clr01x, #fff);text-align:center;">${text}</div>
    </div> </div>`;
    selector.append(html);
}

function uifadeRemove(selector) {
    selector.animate({ 'opacity': '0' }, () => {
        selector.remove();
    });
}

const uihidemsg = () => {
    setTimeout(function () {
        $('[warning]').each(function () {
            $(this).slideUp(function () {
                $(this).remove();
            });
        });
    }, 3000);
}
const quanSet = (selw, min=0)=>{
    selw.each(function() {
        let das = $(this),
            add = $('.btn-add', das),
            sub = $('.btn-sub', das),
            inp = $('[type="number"]', das);
        inp.on('keydown', (e)=>{
            if(e.key==='.' || e.key==='e') e.preventDefault()
        });
        add.click(function() {
            let val = +inp.val() + 1;
            inp.val(val);
        });
        sub.click(function() {
            if (inp.val() > min) {
                let val = +inp.val() - 1;
                inp.val(val)
            };
        });
    });
}

const uilichtAft = (fid) => {
    $('html').addClass('fixed');
    let licht = $(`.licht${fid}`);
    scanImg($('[da-imgsrc]',licht));
    scanBg($('[da-bgsrc]',licht));
    $('.cancel, .ccl, .close, .schliess', licht).click(function () {
        licht.animate({ 'opacity': '0' }, () => {
            licht.remove();
            if ($('[class*=licht]').length == 0) $('html').removeClass('fixed');
        });

    });
}
const oc = (oc, val = '') => {
    if(oc){
        return oc;
    }else{
        return val;
    }
}
const uilichtSet = (name, html, func)=>{
    $('body').append(`<div class="licht licht${name}"><section class="f f-a-c f-j-c" /></div>`);
    $('html').addClass('fixed');
    let licht = $(`.licht${name}`);
    $('>section',licht).html(`<span class="ccl"></span>${html}`).queue(function(q){
        let element = document.querySelector(`img.zm`);
        if(element) var instance = panzoom(element);
        q();
    });
    licht.css({
        'z-index': '1000',
        'background-color': 'rgba(0,0,0,.87)'
    });
    licht.animate({
        'opacity': '1'
    }, function () {
        uilichtAft(name);
        (func == undefined) ? '' : func();
    });
}
const uilichtEins = (name, btn, html, func) => {
    btn.click(function () {
        $('body').append(`<div class="licht licht${name}"><section class="f f-a-c f-j-c" /></div>`);
        $('html').addClass('fixed');
        let licht = $(`.licht${name}`);
        $('>section',licht).html(`<span class="ccl"></span>${html}`).queue(function(q){
            let element = document.querySelector(`img.zm`);
            if(element) var instance = panzoom(element);
            q();
        });
        licht.css({
            'z-index': '1000',
            'background-color': 'rgba(0,0,0,.87)'
        });
        licht.animate({ 'opacity': '1' }, () => {
            uilichtAft(name);
            (func == undefined) ? '' : func();
        });
    });
} 
const animate = () => {
    let das = $('[da-inani]');

    das.each(function () {
        let da = $(this),
            inAni = da.attr('da-inani'),
            outAni = da.attr('da-outani');
        da.on('inview', function (event, isInView) {
            if (isInView) {
                da.removeClass('int');

                da.addClass(inAni);
                da.removeClass(outAni);
                da.off('inview');
            } 
        }); 
    });
}
const preload = (src) => new Promise((s, r) => {
    const img = new Image();
    img.addEventListener("load", () => s(img));
    img.addEventListener("error", err => r(err));
    img.src = src;
});
const scanBg = (sel) => {
    let bgs = sel || $('[da-bgsrc]');
    if(bgs.length > 0)
        bgs.each(function(){
            let $this = $(this);
            $this.on('inview', function (event, isInView) {
                $this.off('inview');
                preload($this.attr("da-bgsrc")).then(v=>{
                    $this.css({'background-image': `url(${$this.attr("da-bgsrc")})`});
                    $this.animate({'opacity':'1'},900,()=>{
                        $this.removeAttr("da-bgsrc");
                        if($this.attr('da-hovsec')){
                            $this.css({'transition': `${$this.attr('da-hovsec')}`});
                            $this.removeAttr("da-hovsec");
                        }
                    })
                }); 
            }); 
        }); 
}
const scanImg = (sel) => {
    let imgs = sel || $('[da-imgsrc]');
    if(imgs.length > 0)
        imgs.each(function(){
            let $this = $(this);
            $this.on('inview', function (event, isInView) {
                $this.off('inview');
                preload($this.attr("da-imgsrc")).then(v=>{
                    $this.attr("src", $this.attr("da-imgsrc"));
                    $this.animate({'opacity':'1'},900,()=>{
                        $this.removeAttr("da-imgsrc");
                    })
                }); 
            }); 
        }); 
}
const bg = (sel, typ = null) => {
    let css = sel.css("background-image"),
        img = css.replace(/(?:^url\(["']?|["']?\)$)/g, "");
    if(typ == 'name') img = img.split('/').pop();
    
    return img == 'none'?null:img;
}
const getUrlVars = () => {
    let vars = {};
    let parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, (m, key, value) => vars[key] = value);
    return vars;
}

const maxHeight = (elems) => {
    return Math.max.apply(null, elems.map(function() {
        return $(this).outerHeight(true);
    }).get());
}
const maxWidth = (elems) => {
    return Math.max.apply(null, elems.map(function() {
        return $(this).outerWidth(true);
    }).get());
}
const asyncForEach = async (array, callback) => {
    if(array?.length)
        for (let i = 0; i < array.length; i++) {
            await callback(array[i], i, array);
        }
}

const scrollTo = (sel, done) => {
    let Hm = menuH;
    
    $('html, body').animate({
        scrollTop: sel.offset().top - Hm
    }, 900, 'linear', ()=>{
        if(typeof done === 'function') done.call(this);
    });
}

const menuH = new Promise((res, rej)=>{
    let Hm = 0;
    if($('[mn="menu"]').length) Hm += $('[mn="menu"]').outerHeight();
    console.log(Hm)
    if($('.mob-nav').length)  Hm += $('.mob-nav').outerHeight();
    console.log(Hm)
    res(Hm);
});
$(function () {
    $('[mn]').each(function(){
        let das = $(this), id = das.attr('da-id');
        das.attr('id',id);
    });
    $('[mn]').promise().done(()=>{
        $('a[href^="#"]:not(.anders)').each(function () {
            $(this).on('click', function (e) {
                e.preventDefault();
                scrollTo($($(this).attr('href')));
            });
        });
    });
});

const uipadAjust = new Promise((res, rej)=>{
    var das = $('section[mn]'),
        n = das.length;

    for (let i = 0; i < (n - 1); i++) {
        var clr1 = $(`section[mn]:eq(${i})`).css("background-color"),
            clr2 = $(`section[mn]:eq(${i + 1})`).css("background-color"),
            bgimg1 = bg($(`section[mn]:eq(${i})`), 'name'),
            bgimg2 = bg($(`section[mn]:eq(${i + 1})`), 'name');
        bgimg1 = (bgimg1 == null) ? null : (bgimg1.includes('.')) ? bgimg1 : null;
        bgimg2 = (bgimg2 == null) ? null : (bgimg2.includes('.')) ? bgimg2 : null;
        if ((clr1 == clr2) && (Boolean(bgimg1) == false && Boolean(bgimg2) == false))
            $(`section[mn]:eq(${i + 1})`).css({ 'padding-top': '0' });
       
    }
    res('Done');
});

$(window).on('load',()=>{
    SmoothScroll({
        // Scrolling Core
        animationTime: 999, // [ms]
        stepSize: 90, // [px]
    });
    
    scanImg();
    scanBg();
});
animate();
const countDecimalDigits = (value) => {
    if ( (value % 1) != 0) 
          return value.toString().split(".")[1].length;  
      return 0;
}
const setInputSelection = (inputs) => {
    inputs.click(function(){
        let input = $(this),
            dropbx = $('+ div .cus-drop-main', input),
            options = $(`.cus-drop`, dropbx);

        options.unbind();
        dropbx.addClass('show');
        input.on('mouseleave', function(){
            dropbx.removeClass('show');
        })
        options.on('mouseover', function(){
            dropbx.addClass('show');
            input.focus();
            input.show();
        })
        options.click(function(){
            console.log('clicked');
            let option = $(this),
                val = option.attr('da-val');
            input.val(val);
            input.trigger('change');
            dropbx.removeClass('show');
        });
    })
} 
const setInputSelectionArrow = (inputs) => {
    inputs.click(function(){
        let input_w = $(this),
            input = $('input', input_w),
            dropbx = $('+ div .cus-drop-main', input_w),
            options = $(`.cus-drop`, dropbx);

        options.unbind();

        input_w.toggleClass('show');
        dropbx.toggleClass('show');
        dropbx.on('mouseleave', function(){
            input_w.removeClass('show');
            dropbx.removeClass('show');
        })
        options.click(function(){
            let option = $(this),
                val = option.attr('da-val');
            input.val(val);
            input.trigger('change');
            dropbx.removeClass('show');
        });
    })
} 
const formObj2Json = (formArray) => { //serialize data function
    var returnArray = {};
    for (var i = 0, len = formArray.length; i < len; i++){
        if(Boolean(formArray[i].value))
            returnArray[formArray[i].name] = formArray[i].value;
    }
    return returnArray;
}
const setInputOnOff = (inputs) => {  
    inputs.click(function(){
        let input = $(this),
            nextinput = $("+ input", input),
            val = 'ON'; 

        val = input.val() == 'ON' ? 'OFF' : 'ON';  
        val_ = input.val() == 'ON' ? '0' : '1';  

        input.attr('value', val);
        nextinput.val(val_)
    }); 
}

const numberWithCommas = x => {
    if (x !== null) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
}
const commaStandard = (val, decimal = true) => {
    val = +val;

    if(decimal)
        return val.toLocaleString('en-US', { 
            minimumFractionDigits:2,
            maximumFractionDigits:2,
            currency: "MYR" 
        })
    else
        return val.toLocaleString('en-US', { 
            minimumFractionDigits:0,
            maximumFractionDigits:0,
            currency: "MYR" 
        })
}
const setSlider = sliders => {
    sliders.each(function(){
        let $slider = $(this),
            $numberformat = $slider.attr('num-format'),
            $range = $('.slider-range', $slider),
            $max = + $('.max-range', $slider).html(),
            $min = + $('.min-range', $slider).html(),
            $iptMin = $('.inp-min', $slider),
            $iptMax = $('.inp-max', $slider),
            input = $(`input[name][hidden]`, $slider),
            $v1, $v2;
 
        $iptMin.val($min);
        $iptMax.val($max);
        //slider range init set
        $range.slider({
            range: true,
            min: $min,
            max: $max,
            values: [$min, $max],
            change: function( event, ui ) {
                let jsonR = {
                    min: ui.values[0],
                    max: ui.values[1]
                };
                
                input.val(JSON.stringify(jsonR));
                input.change()
            },
            slide: function(event, ui) {

                $v1 = ui.values[0];
                $v2 = ui.values[1];

                $iptMin.val($v1);
                $iptMax.val($v2);                         
                
                if($numberformat == 'comma'){
                    $v1 = numberWithCommas(ui.values[0]);
                    $v2 = numberWithCommas(ui.values[1]);
                } 

                $("[min]", $slider).html($v1);
                $("[max]", $slider).html($v2);

                
            }
        }); 

        $slider.append(`<button type="button" class="resetSlider" hidden>Reset</button>`);
        let btnReset = $('.resetSlider', $slider);

        btnReset.click(()=>{
            $range.slider("destroy");
            btnReset.remove();
        })

        $iptMax.on('keyup', function(){
            let $vmax = + $iptMax.val(),
                $vmin = + $iptMin.val();

            if( $vmax <= $max && $vmax >= $vmin){
                $range.slider( "values", 1, $vmax )
            }
        })
        $iptMin.on('keyup', function(){
            let $vmax = + $iptMax.val(),
                $vmin = + $iptMin.val();

            if( $vmin >= $min && $vmin <= $vmax){
                $range.slider( "values", 0, $vmin )
            }
        })

        //slider range data tooltip set
        var $handler = $(".ui-slider-handle", $range);
        if($numberformat == 'comma'){
            $v1 = numberWithCommas($range.slider("values", 0));
            $v2 = numberWithCommas($range.slider("values", 1));
        }else{
            $v1 = $range.slider("values", 0);
            $v2 = $range.slider("values", 1);
        }

        // $handler.eq(0).append(`<b class='amount'><span min> ${$v1} </span></b>`);
        // $handler.eq(1).append(`<b class='amount'><span max> ${$v2} </span></b>`);
        //slider range pointer mouseup event
        $(window).click(()=>{
            $handler.children(".amount").fadeOut(300);
        });
        //slider range pointer mousedown event
        $handler.on("mousedown mouseenter", function(e) {
            e.preventDefault();
            $(this).children(".amount").fadeIn(300);
        });

        //slider range pointer mouseup event
        $handler.on("mouseup", function(e) {
            e.preventDefault();
            $(this).children(".amount").fadeOut(300);
        });
 
    }) 
}
const filterTheCar = (database, filterSetting, parse='') => new Promise( async (res, rej) => {
console.log(filterSetting)

    let first = database.filter( row => { 
        return Object.keys(filterSetting).every(key => {  

            if( key == 'search' ) {
                if( Boolean(filterSetting[key]) ) {
                    let val = filterSetting[key].toLowerCase().replace(/ /g, ""),
                        title = row._title.toLowerCase().replace(/ /g, ""),
                        location = row._location.toLowerCase().replace(/ /g, "");
                    // let val = filterSetting[key].toLowerCase().replace(/ /g, ""),
                    //     title = row._title.toLowerCase().replace(/ /g, "");

                        if (val.includes("sdnbhd")) {
                            return location.includes(val);
                        } else {
                            return title.includes(val);
                        }

                    // return title.includes(val);
                }else{
                    return true
                }
                
            }else 
            if(filterSetting[key] == 'All') { 
                return true
            }else 
            if(key == 'priceR') {
                parse = JSON.parse(filterSetting.priceR);
                return row._price >= parse.min && row._price <= parse.max
            }else 
            if(key == 'mileR') {
                parse = JSON.parse(filterSetting.mileR);
                return row._mileage >= parse.min && row._mileage <= parse.max
            }else 
            if(key == 'yearsR') {
                parse = JSON.parse(filterSetting.yearsR);
                return row._manufacturingYr >= parse.min && row._manufacturingYr <= parse.max
            }
            else{ 
                return filterSetting[key] === row[key]
            } 
        }); 
    })   

    first.sort(function(a, b) { 
        return b._featured - a._featured; 
    })
    first.sort(function(a, b) { 
        return b._lprice - (a._lprice);
    })
    first.sort(function(a, b) { 
        return b._lmileage - (a._lmileage);
    })
    first.sort(function(a, b) { 
        return b._recent - (a._recent);
    })

    res (
        first
    );
} )
const installment = (row) => new Promise( async (res, rej)=>{
    let price = row?._price,
        deposit = price * 0.1,
        interest = 4,
        repaymentYr = 7;

    let inst = ( ( (price - deposit) + ((price - deposit) * (interest / 100) * repaymentYr)) ) / (repaymentYr * 12);

    res(inst)
})