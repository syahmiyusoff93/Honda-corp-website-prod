<?php
$disp = [0=>'',1=>''];
$iframe = '';

$res_m = $this->getInfo($CON,$folder,['fid','i']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[0] .= $MNC[$folder['module']]->itemsList($CON, $item);
}

if( isset($folder['sync']['redir']) && !empty($folder['sync']['redir']) ){
    $iframe = "da-iframe=\"{$folder['sync']['redir']}\"";
    $iframe = '<div class="img-w" ><img '.$iframe.' src="'.$folder['dot'].'zata_da/src/default/360.png"></div>';
    
}
echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
    <div class="main" style="background-image: url()">
        <div class="owl-carousel bg-cover owl-loaded" owl="">
            '.$disp[0].'
        </div>
    </div>
    <div class="wrap txt f f-j-c f-a-c">
        <div class="container"> 
            '.$iframe.$MAIN['title'].'
            <div class="wrap f f-j-c ">
            <div class="btn-arrow f f-j-c f-a-c"><i class="fas fa-chevron-down"></i></div>
            </div>
        </div>
        <div owl="cust">
            <div class="custdot"></div>
        </div>
    </div>
</section>';

$a_l = file_get_contents('zata_da/mn/'.$folder['module'].'/arrow-l.svg');
$a_r = file_get_contents('zata_da/mn/'.$folder['module'].'/arrow-r.svg');
?> 
<script>
    $(function() {
        let mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`),
            das = $('.owl-carousel', main);
        $('[da-iframe]', main).each(function(){
            let das = $(this),
                iframelink = das.attr('da-iframe');
            das.click(()=>{ window.open(iframelink, '_blank'); });
        });
        $('.btn-arrow',main).click(async ()=>{
             let Hm = await menuH;  
            Hm = main.outerHeight(); 
            $('html, body').animate({
                scrollTop: Hm
            }, 900, 'linear' );
        });

        function callback(das, main) {
            var H = $('.owl-stage', das).outerHeight(true);
            
            $('.owl-nav button', das).animate({
                'bottom': H - $('.owl-item.active .item', das).outerHeight(true) / 2
            });
            $('.owl-dots', das).animate({
                'bottom': H - $('.owl-item.active .item', das).outerHeight(true) + 15
            });
        }

        let a_l = `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="451.847px" height="451.847px" viewBox="0 0 451.847 451.847" style="enable-background:new 0 0 451.847 451.847;" xml:space="preserve"><g><path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"/></g></svg>`,
            a_r = `<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="451.846px" height="451.847px" viewBox="0 0 451.846 451.847" style="enable-background:new 0 0 451.846 451.847;" xml:space="preserve"> <g> <path d="M345.441,248.292L151.154,442.573c-12.359,12.365-32.397,12.365-44.75,0c-12.354-12.354-12.354-32.391,0-44.744L278.318,225.92L106.409,54.017c-12.354-12.359-12.354-32.394,0-44.748c12.354-12.359,32.391-12.359,44.75,0l194.287,194.284c6.177,6.18,9.262,14.271,9.262,22.366C354.708,234.018,351.617,242.115,345.441,248.292z"/> </g></svg>`;

        das.owlCarousel({
            margin: 0,
            loop: true,
            nav: false,
            navText: [a_l, a_r],
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            smartSpeed: 2000,
            autoplayHoverPause: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            mouseDrag: false,
            touchDrag: false,
            dotsContainer: '.custdot',
            onTranslate: function(e) {
                das.trigger('stop.owl.autoplay');
            },
            onTranslated: function(e) {
                das.trigger('play.owl.autoplay');
            },
            responsive: {
                0: {
                    items: 1,
                    center: true
                },
                600: {
                    items: 1,
                    center: true
                },
                1000: {
                    items: 1,
                    center: true
                }
            }
        });

        das.on('translated.owl.carousel', function(e) {
            callback(das, main);
        });
         $(window).resize(async () => {
            let Hm = await menuH;
            if ($('.headertop').length > 0) Hm += $('.headertop').outerHeight();

            if ($(window).width() > 991) {
                $('.itemrow, .txt', main).css({
                    'height': `calc(100vh - ${Hm}px)`
                });
            } else {
                $('.itemrow, .txt', main).css({
                    'height': `calc(100vh - ${Hm}px)`
                });
            }
            callback(das, main);
        }).resize();
    });
</script>
