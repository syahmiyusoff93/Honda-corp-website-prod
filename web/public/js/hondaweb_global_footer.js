/* VAR */
var scrolling_action_enabled_timeout = null;
var scrolling_action_enabled = false;
var root = $('html, body');

// require jquery
$(document).ready(function(){
    /* FN */
    saifn_modelpage_hidemainnav_desktop = function(){
        if($('#modelmenu').hasClass('fixed')){
            return 1;
        }
        $('#modelmenu').removeClass('fixed-lower').addClass('fixed');
        $('header').removeClass('down').addClass('up');
    }

    saifn_modelpage_showmainnav_desktop = function(){
        if($('#modelmenu').hasClass('fixed-lower')){
            return 1;
        }
        $('#modelmenu').removeClass('fixed').addClass('fixed-lower');
        $('header').removeClass('up').addClass('down');
    }

    saifn_modelpage_enablescrolling = function(){
        clearTimeout(scrolling_action_enabled_timeout);
         // wait a bit before enable hide main menu when scroll down.
         scrolling_action_enabled_timeout = setTimeout(function(){
            scrolling_action_enabled = true;
            scrolling_action_enabled_timeout = null;
            //console.log('scroll enabled')
        }, 1000);
    }

    /* EXE */

    /* 1024 BREAKPOINT */
    var windowSize = $(window).width();
    if (windowSize > 1024) {
        /* HEADER NAVIGATION BREAK AT 1024 */

        /* EXPLORE ALL MODELS SECTION HOVER EFFECT */
        $(".model-selection-card").mouseenter(function(){
        $(this).find('.hover-bg').removeClass('short').addClass('tall').stop();
        $(this).find('.mtitle').delay(1000).addClass('mtitle-on');
        // $(this).removeClass('back').addClass('active').stop();
        });
        $(".model-selection-card").mouseleave(function(){
            $(this).find('.hover-bg').stop().removeClass('tall').addClass('short');
            $(this).find('.mtitle').removeClass('mtitle-on');
        })


        /* GLOBAL NAVIGATION FUNCTION */
        $('.hasdd').click(function(){
            var dropdownID = $(this).data('dropdown');
            var leftPos = $(this).offset().left;
            // $(this).find('img').toggleClass('active');

            if ($('.dd-content[data-dropdown=' + dropdownID + ']').css("display") == "block")
                {
                    $('.dd-content[data-dropdown=' + dropdownID + ']').stop().slideUp();
                    $(this).find('img').removeClass('active');
                    $('html').removeClass('with-featherlight');

                    }

            if ($('.dd-content[data-dropdown=' + dropdownID + ']').css("display") == "none")
                {
                    $('.for-desktop .dd-content[data-dropdown=' + dropdownID + ']').css('left', leftPos + 'px');
                    $('.dd-content[data-dropdown=' + dropdownID + ']').stop().slideDown();
                    $(this).find('img').addClass('active');
                    $('html').addClass('with-featherlight');

                }

        })

        $('.dd-content').click(function(){
            $(this).slideUp(200);
        })

        /* CLICK OUTSIDE MAIN MENU, HEADER MENU SLIDEUP */
        var mouse_is_inside = false;
        $('.dd-content').hover(function(){
            mouse_is_inside=true;
        }, function(){
            mouse_is_inside=false;
        });

        $("body").mouseup(function(){
            if(! mouse_is_inside) $('.dd-content').slideUp();
            $('.hasdd').find('img').removeClass('active');
            $('html').removeClass('with-featherlight');
        });

    } else {

        $(".model-selection-card").ready(function(){
            $(this).find('.mtitle').addClass('mtitle-on');
        });

    }/* BREAKPOIINT 1024 END */



    /* MODEL GALLERY RESPOSIVE STRUCTURE CHANGE IN MOBILE */
    if (windowSize > 768) {
    } else {
    }/* BREAKPOIINT 768 END */

    /* MODEL MENU SMOOTH SCROLL */

    $('.smooth-slide a[href^="#"]').click(function(e){
        e.preventDefault();

        var href = $.attr(this,'href');
        //console.log('hi');
        scrolling_action_enabled = false;
        if(scrolling_action_enabled_timeout!=null){
            clearTimeout(scrolling_action_enabled_timeout);
        }
        $(this).addClass('active').parent().siblings().find('a').removeClass('active');
        var aboveelementoffset = 140;
        root.animate({
            scrollTop: $(href).offset().top - aboveelementoffset
        }, 500, function(){
            // window.location.hash = href;
            root.scrollTop($(href).offset().top - aboveelementoffset);
            saifn_modelpage_enablescrolling();

        });
        // return false;
    })
    /* MODEL MENU SMOOTH SCROLL END */

    /* MODEL MENU STICK WHEN SCROLL & HEADER GO UP */
    if($('#modelmenu').hasClass('model-menu')){
        var previousScroll = 0;

        $(window).scroll(function(){
            var currentScroll = $(this).scrollTop();

            if(!scrolling_action_enabled || currentScroll <= previousScroll || currentScroll<400){
                saifn_modelpage_showmainnav_desktop();
            }
            else {
                saifn_modelpage_hidemainnav_desktop();
            }
            previousScroll = currentScroll;
        })
    }


    /* MAIN NAVIGATION MODEL HOVER OTHER MODEL FADE EFFECT */
    $('.model li').hover(function(){
        $(this).siblings().stop().fadeTo(300, 0.3);
    }, function(){
        $(this).siblings().stop().fadeTo(300, 1);
    }
    );

    /* MODEL INNER NAVIGATION */
    /* MOBILE DROPDOWN MENU -- NEED TO RELOAD RESIZE */
    $('.dd-menu').hide();

    $('.menu-icon').click(function(){
        $('.dd-content').hide();
        $('.menu-icon .navicon').toggleClass('open');
        $('html').toggleClass('with-featherlight');
        $('.mobile-menu').removeClass('active');
        $('.modelmenu').addClass('fixed-lower');
        $('header').toggleClass('mobile-stick');


        $('.dd-menu').stop().slideToggle(function(){
            $('.mobile-menu').click(function(){
                $(this).next().stop().slideToggle();
                $(this).toggleClass('active');
            });
            $('.cta-mobile-experience').toggleClass('active');
        });

    })

    /*CLICK ON MODEL LOGO SCROLL TO TOP*/
    $("a[href='#top']").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    });

    $('.toggle-arrow').click(function(){
        // console.log('8');
        // $('.for-mobile .menu-toggle').slideToggle();
        $('.arrow-white-down').toggleClass('expand');
        $('.menu-toggle').slideToggle();
    })
    /* ON CLICK TOGGLE ITEM IT WILL SLIDEUP  -- NEED TO RELOAD RESIZE*/
    $('.menu-toggle ul li a, .btn-shopping-tools a').click(function(){
        $('.menu-toggle').slideUp();
        $('.toggle-arrow').stop().removeClass('active');
    })


    /* HAPPENING SECTION HOVER EFFECT*/
    $('.happening-card').mouseenter(function(){
            $(this).find('.happening-img').fadeOut();
            $(this).find('.happening-details').fadeIn();
        })
        $('.happening-card').mouseleave(function(){
            $(this).find('.happening-img').fadeIn();
            $(this).find('.happening-details').fadeOut();
    })

    /* HAPPENING IN MOBILE DIFFERENT TREATMENT SHOW CONTENT -- NEED TO RELOAD RESIZE */
    $('.happening-card-mobile').find('.happening-img, .happening-details').show();
    $('.happening-card-mobile').ready(function(){
        $(this).find('.happening-img').show();
        $(this).find('.happening-details').show();
    });

    /* MODEL & MODEL INNER PAGE TAB */
    $(".tab-slider-body").hide();
    $(".tab-slider-body:first").show();

    $(".tab-slider-nav li").click(function() {
        $(".tab-slider-body").hide();
        var activeTab = $(this).attr("rel");

        $("#"+activeTab).fadeIn();
            if($(this).attr("rel") == "tab2"){
                $('.tab-slider-tabs').addClass('slide');
            } else {
                $('.tab-slider-tabs').removeClass('slide');
            }

        $(".tab-slider-nav li").removeClass("active");
        $(this).addClass("active");
        // $('.tab-slider-trigger').addClass("border")
    });


    if($('.feature-content.owl-carousel').length > 0){
        $('.feature-content.owl-carousel').owlCarousel({
            margin: 10,
            nav: false,
            loop: true,
            autoHeight:true,
            responsive: {
                0: { items: 1 },
                1024: { items: 1 }
            }
        })
    }

    if($('.performance .owl-carousel').length > 0){
        $('.performance .owl-carousel').owlCarousel({
            margin: 0,
            nav: false,
            loop: false,
            center: true,
            dots: true,
            responsive: {
                0: { items: 1 },
                1024: { items: 1 }
            }

        })
    }

    /* LANDING HERO BANNER SLIDE */
    mainSlider = $('.landing-hero.owl-carousel');

    if(mainSlider.length>0){
        mainSlider.owlCarousel({
            autoplay: true,
            autoplayTimeout: 8000, /* was 5000, changed at 20201202 */
            // lazyLoad: true,
            loop: true,
            dots: true,
            items: 1,
            smartSpeed: 500,
        });

        mainSlider.on('changed.owl.carousel', function(property) {
            var current = property.item.index;
            var prev = $(property.target).find(".owl-item").eq(current).prev().find("img").attr('data-navipicture');
            var next = $(property.target).find(".owl-item").eq(current).next().find("img").attr('data-navipicture');

            $('.navPrev').find('img').attr('src', prev);
            $('.navNext').find('img').attr('src', next);
        });



        $('.navNext').on('click', function() {
            mainSlider.trigger('next.owl.carousel', [300]);
            return false;
        });

        $('.navPrev').on('click', function() {
            mainSlider.trigger('prev.owl.carousel', [300]);
            return false;
        });
    }


    /* MODEL INNER PAGE */
    /* colour + find a dealer */
    $('.more').click(function(){
        $(this).next('.expand-content').slideToggle();
        $(this).toggleClass('active');
    })

    $('.intro-title').click(function(){
        if ($(this).parent().hasClass('active')) {
            $(this).parent().removeClass('active');
        } else {
            $('.package').removeClass('active')
            $(this).parent().addClass('active');
        }
    })


    if($('.gallery-container-bottom .owl-carousel').length>0){
        $('.gallery-container-bottom .owl-carousel').owlCarousel({
            margin: 0,
            nav: true,
            navText:["<div class='arrow-red-left'></div>","<div class='arrow-red-right'></div>"],
            loop: true,
            dots: true,
            responsive: {
                0: { items: 2 },
                1024: { items: 4 }
            }
        })
    }

    /* CAROUSEL FUNCTION - GLOBAL USED -- NEED TO RELOAD RESIZE */
    if($('.happening-wrapper.owl-carousel').length>0){
        $('.happening-wrapper.owl-carousel').owlCarousel({
            margin: 10,
            nav: true,
            navText:["<div class='arrow-red-left'></div>","<div class='arrow-red-right'></div>"],
            loop: false,
            responsive: {
                0: { items: 1 },
                600: { items: 1 },
                1000: { items: 1 }
            }
        })
    }

    /* CAROUSEL FUNCTION - GLOBAL USED */
    if($('.model-selection .owl-carousel').length>0){
        var model_carousel_item = $('.model-selection-container .car-item').length;
        $('.model-selection .owl-carousel').owlCarousel({
            margin: 20,
            nav: true,
            navText:["<div class='arrow-red-left'></div>","<div class='arrow-red-right'></div>"],
            loop: model_carousel_item > 4 ,
            dots: false,
            center: model_carousel_item < 4 ,
            // stagePadding: 200,
            responsive:{
                0:{ items:1 },
                640:{ items:1, stagePadding: 100 },
                768:{ items:1,  stagePadding: 200},
                960:{ items:2 },
                1024:{items:3 },
                1400:{ items:4 },
                1600:{ items:4 },
                1800:{ items:5 }
            },
        })

    }

    /* MODEL LANDING GALLERY -- FEATHERLIGHT ONLY FOR MODEL INNER GALLERY */

    function initFeatherlightopt(){
        $('.gallery-container-bottom .owl-nav button .arrow-red-right, .gallery-container-bottom .owl-nav button .arrow-red-left  ').click(function(){
            $('html').addClass('with-featherlight');
        })

        $('.gallery-container-bottom .thumbnail').click(function(){
            $('html').removeClass('without-featherlight');
        })

        $('.featherlight-next, .featherlight-previous').click(function(){
            if(!$('html').hasClass('with-featherlight')){
                $('html').addClass('with-featherlight');
            }
        })
    }

    if($('.gallery-img, .gallery').length>0){
        $('.gallery-img, .gallery').featherlightGallery({
            gallery: {
                fadeIn: 300,
                fadeOut: 300
            },
            openSpeed:    300,
            closeSpeed:   300,
            previousIcon: '<div class="arrow-red-left"></div>',
            nextIcon:'<div class="arrow-red-right"></div>',
            afterOpen: initFeatherlightopt,
        });
    }

    /* FORM DROP DOWN SELECT */
    var selectiontagdisplay = 'hidden';
    $('.variant-select .dropdown-select').each(function(){
        //console.log($(this))
        var toggleID = $(this).data('toggle');
        var ul = $(this).find('.dropdown-menu');
        var caret = $(this).find('.caret');
        //
        if(ul.find('li').length<2) {
            caret.hide(); // if only select item less than 2, dont do any click action
        } else {
            //console.log(ul);
            selectiontagdisplay = 'visible';
        }
    });
    // make .selection-tag display if only there's a dropdown that is selectable
    $('.selection-tag').css('visibility', selectiontagdisplay);

    // click action
    $('.dropdown-select').click(function(){
        //console.log($(this))
        var toggleID = $(this).data('toggle');
        var ul = $(this).find('.dropdown-menu');
        var caret = $(this).find('.caret');

        if(!caret.is(':visible')) {
            return true; // if caret is not visible, its an indication of dropdown is disabled
        }

        if (ul.hasClass('hide')) {
            $('.dropdown-menu .caret').removeClass('down');
            ul.stop().slideDown().removeClass('hide');
            caret.addClass('down');

        } else {
            ul.stop().slideUp().addClass('hide');
            caret.removeClass('down');

        }

    })
    $('.dropdown-select .dropdown-menu').each(function(){
        if(!$(this).hasClass('hide')){
            $(this).addClass('hide');
        }
    })

    /* CLICK OUTSIDE DROPDOWN MENU SLIDEUP */
    var dd_mouse_inside = false;
    var latest_dd_interacted = null;
    $('.dropdown-select').click(function(){
        latest_dd_interacted = $(this);
    });
    $('.dropdown-select').hover(function(){
        dd_mouse_inside=true;
    }, function(){
        dd_mouse_inside=false;
    });

    $('.dropdown-menu').scroll(function(){
        dd_mouse_inside=true;
    })

    $("body").mousedown(function(){
        //console.log('dd_mouse_inside',dd_mouse_inside);
        if(!dd_mouse_inside) {
            //$('.dropdown-menu').stop().slideUp().parent().find('.caret').removeClass('down').addClass('hide');
            if(latest_dd_interacted!=null && !latest_dd_interacted.find('.dropdown-menu').hasClass('hide')){
                latest_dd_interacted.trigger('click');
                latest_dd_interacted=null;
            }
        }
    });

    /* DROPDOWN MENU CLICK AND SHOW IN DROPDOWN BOX */
    $('.dropdown-menu li').click(function(){
        $(this).parent().parent().find('.btn:first-child').text($(this).text());
        $(this).parent().parent().find('.btn:first-child').val($(this).text());
    });

    /*
        GA EVENTS
        ga('send', 'event', [eventCategory], [eventAction], [eventLabel], [eventValue], [fieldsObject]);
    */
    $('a').mousedown(function(){ console.log("a track");
       // ga('send', 'event', 'anchorlink', 'click', $(this).attr('href'));
    })

    // FORCED TOP ON RELOAD
    $('html,body').scrollTop(0); // reset scroll to top whenever refreshed
    saifn_modelpage_showmainnav_desktop();
    saifn_modelpage_enablescrolling();
    //console.log('page init 2');

    // AUTOSCROLL TO SHOPPING TOOLS
    var url = window.location.href
    var hash = url.split('#')[1];
    if(hash=='shopping-tools'){
        console.log('yes--')
        $('#shoppingtools').trigger('click')
    }

});

/* TO ADDRESS IOS SCALING */
document.addEventListener('touchmove', function (event) {
    if (event.scale !== 1) { return false; }
  }, false);

  var lastTouchEnd = 0;
  document.addEventListener('touchend', function (event) {
    var now = (new Date()).getTime();
    if (now - lastTouchEnd <= 300) {
      return false;
    }
    lastTouchEnd = now;
  }, false);
