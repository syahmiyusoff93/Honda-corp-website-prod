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
    $ttl[1] = empty($ttl[1])?'':'<div class="">'.$ttl[1].'</div>';

    $disp[1].='<div class="item">
        <div class="wrap">
           <div class="wrap">
                <div class="bimg-w">
                    <div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].')"></div>
                </div>
                <div class="f f-a-c f-j-c txtbox ">
                <div class="wrap">
                    <div class="ttl">'.$ttl[1].$ttl[0].'</div>
                    <div class="desc">'.$item['content'].'</div>
                    <div class="taste">'.$btn.'</div>
                </div>
                </div> 
            </div>
        </div>
    </div>';
}

//===========================

echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
    <div class=" animated int" da-inani="zoomIn">
        <div class="wrap"> '.$MAIN['title'].$MAIN['smr'].' </div> 
        <div class="wrap">
            <div class="owl-carousel" owl>'.$disp[1].'</div>
        </div>
    </div>
</section>';

$a_l = file_get_contents('zata_da/mn/'.$folder['module'].'/arrow-l.svg');
$a_r = file_get_contents('zata_da/mn/'.$folder['module'].'/arrow-r.svg');
?>


<script>
    $(function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`),
            btns = $('.btn-gen', main),
            das = $('.owl-carousel', main),
            btn = $('button', das);

        function callback(das) {
            das.trigger('stop.owl.autoplay');
            var H = $('.owl-item.active .item', das).outerHeight(true);
            if ($(window).width() < 575) {
                $('.owl-nav button', das).animate({
                    'bottom': (H / 2)
                });
            } else if ($(window).width() < 1201) {
                $('.owl-nav button', das).animate({
                    'bottom': (H / 2)
                });
            } else {
                $('.owl-nav button', das).animate({
                    'bottom': (H / 2)
                });
            }

            return true;
        }
        let a_l = `<?php echo $a_l;?>`,
            a_r = `<?php echo $a_r;?>`; 
        das.owlCarousel({
            margin: 0,
            loop: true,
            nav: true,
            navText: [a_l, a_r],
            dots: false,
            autoplay: true,
            autoplayTimeout: 9000,
            smartSpeed: 200,
            autoplayHoverPause: false,
            mouseDrag: true,
            touchDrag: true,
            onDragged: callback(das),
            rewind: true,
            onTranslate: function(e) { das.trigger('stop.owl.autoplay'); },
            onTranslated: function(e) { callback(das); },
            responsive: {
                0: {
                    items: 1
                }
            }
        });
        callback(das);
        
    });
</script>