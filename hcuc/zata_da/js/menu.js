const menu_main = (pid, idc, page, logo) =>{ 
    idc = idc.split(',');
    for (let i = 0; i < idc.length; i++) { $(`[href="?pid=${idc[i]}"]`).parent().addClass('active'); }

    $('[da-mn="5"]').each(function(){ 
        let das = $(this),
            href = das.attr('href');
        if(href.includes(`?pid=${pid}&scrollid=`))
            das.attr('href', href.replace(`?pid=${pid}&scrollid=`,'#'));
    });

    $('.nav li:has(ul a[da-mn="4"]) > a').removeAttr('href');
    $('a[da-mn="4"][href]').click(function(e){
        let redir = $(this),
            link = redir.attr('href');
        if( link.includes(`da-func="contactUs"`) ){
            e.preventDefault();
            $(`[da-func="contactUs"]`).trigger('click');
            return false;

        } 
    });


    let main = $('[mn="menu"]'),
        nav = $('.nav', main).html(),
        navlist = $('.nav > ul', main).html(),
        menuStat = false;

    let select = () => {
        $('.nav [selector]').each(function(){
            let selector = $(this),
                value = selector.attr('selector'),
                val = {};

            value = value.split('-');

            val.id = value[0];
            val.tab = value[1];

            selector.click(()=>{
                $('html, body').animate({
                    scrollTop: $(`[da-id=${val.id}]`).offset().top - $('.mob-nav').outerHeight() - $('[mn="menu"]').outerHeight()
                }, 900, 'linear', function() { 
                    $(`[da-selector="${val.tab}"]`).trigger('click');
                });

                $('[licht][menu]').animate({
                    'opacity': '0'
                }, function() {
                    $(this).remove();
                });

                $('body, .mob-nav, .menucon').removeClass('fixed active');
                menuStat = false;
                $('.menucon').html('<i class="fas fa-bars"></i>');

            });
        });
    }

    $('.menucon').click(function() {
        if (menuStat == false) {
            $('body').addClass('fixed'); 

            $('body > section[mn]').addClass('d-n'); 

            $(`<div class="container mnsec nav f f-j-c f-a-c">${nav}</div>`).insertAfter(main);

            $('[licht]').html('').queue(function(q) {  
                $('[licht] a[href^="#"], [licht] a[href^="da-func"]').click(function(e){
                    e.preventDefault();

                    let redir = $(this),
                        link = redir.attr('href');

                    if( link.includes(`da-func="contactUs"`) ){
                        e.preventDefault();
                        $(`[da-func="contactUs"]`).trigger('click'); 
                    } else {
                        $('body').removeClass('fixed');
                        $('body, .mob-nav, .menucon').removeClass('fixed active');
                        $('[licht][menu]').animate({
                            'opacity': '0'
                        }, function() {
                            $(this).remove();
                        });
                        menuStat = false;
                        $('.menucon').html('<i class="fas fa-bars"></i>');
                        $('html, body').animate({
                            scrollTop: $($(this).attr('href')).offset().top - $('.mob-nav').outerHeight()
                        }, 900, 'linear' );
                    } 
                });
                 
                select();
                q();
            });
            $('[licht]').css({
                'z-index': '999'
            });
            //menu without link
            $('.nav li:has(ul)>a').removeAttr('href');
            $('[licht] .nav li:has(ul)>a').append(' +');
            $('[licht] .nav li:has(ul)>a').click(function() {
                $('+ul', this).slideToggle();
            });

            menuStat = true;
            $(this).addClass('fixed');
            $(this).html('<i class="fas fa-times"></i>');  

        } else if (menuStat == true) {
            $('.mnsec').remove();
            $('[mn].d-n').removeClass('d-n'); 
            $('body, .mob-nav, .menucon').removeClass('fixed active');
            $(this).html('<i class="fas fa-bars"></i>');

            menuStat = false; 
        } 
    });

    select(); 
}
