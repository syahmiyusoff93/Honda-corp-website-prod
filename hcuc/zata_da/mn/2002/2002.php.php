<?php
    $disp = [0=>'',1=>'']; 

    $res_m = $this->getInfo($CON,$folder,['fid','i','1','1']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $item['title'] = empty($item['title'])?'':'<h2>'.$item['title'].'</h2>';
        $item['content'] = empty($item['content'])?'':$item['content'];
        $link='';
        if(!empty($item['docurl']))
            $link = empty($item['docurl'])?'':'<p><a href="'.$item['docurl'].'" target="_blank" class="btn-gen">Read More +</a></p>';
        if(!empty($item['link']['redir']))
            $link = empty($item['link']['redir'])?'':'<p><a href="'.$item['link']['redir'].'" class="btn-gen">Read More +</a></p>';
        
        $disp[0].=$item['title'].$item['content'].$link;
    }
    //===========================

    $res_m = $this->getInfo($CON,$folder,['fid','i','2','']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        
        $disp[1].='<div class="item">
                        <div class="wrap">
                           <div class="wrap">
                                <div class="bimg-w">
                                    <div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].')"></div>
                                </div>
                            </div>
                        </div>
                    </div>';
    }
    
    //===========================

    echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
            <div class="container animated int" da-inani="zoomIn">
                <div class="desc"> '.$disp[0].' </div>
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
        let c = true;
        das.owlCarousel({
            margin: 15,
            loop: true,
            nav: true,
            navText: [a_l, a_r],
            dots: true,
            autoplay: true,
            autoplayTimeout: 9000,
            smartSpeed: 200,
            autoplayHoverPause: false,
            mouseDrag: true,
            touchDrag: true,
            onDragged: callback(das),
            rewind: true,
            onTranslate: function(e) {
                das.trigger('stop.owl.autoplay');
            },
            onTranslated: function(e) {
                callback(das);
            },
            responsive: {
                0: {
                    items: 1
                }
            }
        });
        callback(das);
        
    });
</script>