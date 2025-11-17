<?php
$disp = [0=>'',1=>''];  
//===========================

$res_m = $this->getInfo($CON,$folder,['fid','i','1','']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);

    $btn = '';
    if($item['link']['redir'])
        $btn = '<a href="'.$item['link']['redir'].'" class="btn-gen">Discover More</a>';

    $ttl = explode('=>',$item['title']);
    $ttl[0] = empty($ttl[0])?'':'<h2 class="">'.$ttl[0].'</h2>';
    $ttl[1] = empty($ttl[1])?'':'<div class="smr cus">'.$ttl[1].'</div>';

    $disp[1] .= '<div class="item">
            <div class="f">
                <div class="wrap">
                    <div class="bimg-w">
                        <div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].')"> </div>
                    </div>
                    <template>
                        <div class="ttl">'.$ttl[1].$ttl[0].'</div>
                        <div class="desc">'.$item['content'].'</div>
                        <div class="taste">'.$btn.'</div>
                    </template>
                </div>
            </div>
        </div>';
}

//===========================

echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
    <div class="container animated int" da-inani="zoomIn">
        <div class="wrap"> '.$MAIN['title'].$MAIN['smr'].' </div>
        <div class="wrap"> 
            <div class="f f-a-c f-j-c lr-w">
                <div class="l">
                    <div class="wrap">
                        <div class="textbox"> </div>
                        <div class="wrap" owl>
                            <div class="dotcontainer"></div>
                        </div>
                    </div>
                </div>
                <div class="r">
                    <div class="owl-carousel"  owl>' . $disp[1] . '</div>
                </div>
            </div>
        </div> 
    </div>
</section>'; 
?>

<script>
    $(function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`),
            btns = $('.btn-gen', main),
            das = $('.owl-carousel', main) ;

        function callback(das) {
            das.trigger('stop.owl.autoplay');
            var H = $('.owl-stage-outer', das).outerHeight(true);

            if ($(window).width() < 575) $('.owl-nav button', das).animate({
                'bottom': (H / 2)
            });
            else $('.owl-nav button', das).animate({
                'bottom': (H / 2)
            });

            return true;
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
            autoplayTimeout: 9000,
            smartSpeed: 1000,
            autoplayHoverPause: false,
            mouseDrag: true,
            touchDrag: true,
            onDragged: callback(das),
            rewind: false,
            dotsClass: 'dotcont',
            onTranslate: function(e) {},
            onTranslated: function(e) {
                callback(das);
                info();
            },
            items: 1
        });
        callback(das); info();

        function info() {
            $('.dotcontainer', main).html('');
            $('.dotcontainer', main).append($('.owl-carousel .dotcont', main).clone(true));

            let text = $('.owl-item.active template', main).html();
            $('.textbox', main).html(text);
        }
        
    });
</script>