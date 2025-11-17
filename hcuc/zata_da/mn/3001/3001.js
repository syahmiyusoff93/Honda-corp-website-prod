const MNC3001JS = (main, mn, mnid) => {
    let das = $('.owl-carousel', main);

    function callback(das, main) {
        var H = $('.owl-stage', das).outerHeight(true);
        if ($(window).width() < 992) {
            $('.owl-nav button', das).animate({
                'bottom': H - $('.owl-item.active .item', das).outerHeight(true)
            });
        } else {
            $('.owl-nav button', das).animate({
                'bottom': H - $('.owl-item.active .item', das).outerHeight(true) / 2
            });
        }

        $('.owl-dots', das).animate({
            'bottom': 30
        });
        //            $('>div.main', main).animate({
        //                'height': $('.owl-item.active .item', das).outerHeight(true)
        //            });
    }

    let a_l = `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="451.847px" height="451.847px" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;" xml:space="preserve"><g><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"/></g></svg>`, a_r = `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="451.846px" height="451.847px" viewBox="0 0 451.846 451.847" style="enable-background:new 0 0 451.846 451.847;" xml:space="preserve"><g><path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"/></g></svg>`;

    das.owlCarousel({
        margin: 0,
        loop: true,
        nav: true,
        navText: [a_l, a_r],
        dots: true,
        autoplay: true,
        autoplayTimeout: 4000,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        //animateIn: 'rollIn',
        //animateOut: 'rollOut',
        mouseDrag: true,
        touchDrag: true,
        onTranslate: function (e) {},
        onTranslated: function (e) {},
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });
    
    das.promise().done(function(){
        let videoitem = $('.videoitem',main);
        videoitem.each(function(){
            let videobtn = $(this),
                vsrc = $('template', videobtn)[0].outerHTML;
            
            vsrc = $( $.parseXML(vsrc) ).contents();
            vsrc = vsrc.find('iframe').attr('src');
            
            let popframe = `<iframe width="560" height="315" src="${vsrc}?autoplay=1&showinfo=0&controls=1&autohide=1&modestbranding=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" class="ab" allowfullscreen></iframe>`;
            
            popframe = `<div class="container main">
                <span class="ccl"></span>
                <div class="close-pop-w ccl"></div>
                <div class="content">
                     <div class="f f-j-c f-a-c">
                        ${popframe}
                     </div>
                 </div>
            </div>`;
            uilichtEins(mn, videobtn, popframe, () => {
                let licht = $(`.licht${mn}`),
                    fr = $('iframe', licht);
                $(window).resize(() => {
                    let  vw = fr.width() * 9 / 16;
                    $('iframe', licht).css({ 'height': vw });
                }).resize();
            });
        });
    });

    das.on('translated.owl.carousel', (e) => callback(das, main));

    $(window).resize(async () => { 
        $('.infobx', main).css('margin-top', `-${$('.infobx-ttl', main).outerHeight()}px`);

        let Hm = await menuH;
        if ($('.headertop').length) Hm += $('.headertop').outerHeight();

        if ($(window).width() > 992) {
            $('.itemrow', main).css({
                'height': `calc(100vh - ${Hm}px)`
            });
        } else {
            $('.itemrow', main).css({
                'height': 'auto'
            });
        }
        callback(das, main);
    }).resize();
}