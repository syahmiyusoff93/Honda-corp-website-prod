<?php
    $disp = [0=>'',1=>'']; 
//    $q_m = 'SELECT * FROM lists 
//            WHERE list_fid = "'.$folder['id'].'" AND list_type = "i" AND list_status = "1"
//            ORDER BY list_priority;';
//    $res_m = $CON->query($q_m);
//    $item = $this->itemInfo('', $htt[0]);

    $res_m = $this->getInfo($CON,$folder,['fid','i','1','4']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[0] .= '<div class="el">
                        <div class="wrap" da-id="'.$item['id'].'">
                            <div class="bimg-w"><div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].')"></div></div>
                            <div class="ittl">'.$item['title'].'</div>
                        </div>
                    </div>';   
    }
    $ttlcon = '';
    if(!empty($folder['bildurl']))
        $ttlcon = '<span class="consp">
            <div class="bimg-w">
                <div class="bimg mask" style="-webkit-mask-image: url('.$folder['bildurl'].');mask-image: url('.$folder['bildurl'].')"></div>
            </div>
        </span>';
    $btn = '';
    if($folder['sync']['redir']) {
        $btn = '<a href="'.$folder['sync']['redir'].'" class="btn-gen">View More</a>';
    }
    echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'" class="">
        <div class="container-fluid">
        <div class="container main  animated int" da-inani="zoomInDown">
            <div class="secttl">'.$ttlcon.'<span>'.$folder['genttl'].'</span></div>
            <div class="wrap els f">
                '.$disp[0].'
            </div>
            <div class="taste">'.$btn.'</div>
        </div>
        </div>
    </section>';
?>

<script>
    $(function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            id = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${id}"]`),
            els = $('.el [da-id]', main),
            secttl = $('.secttl', main).html(),
            exe = `${dot}zata_da/mn/mn.exe.php`,
            html = `<section><div class="container main"><div class="wrap"><div class="close-pop-w ccl"></div><span class="ccl"></span><div class="wrap disp"/></div></div></section>`;


        let galset = $('.els', main);
        galset.each(function() {
            let gals = $('.el .bimg', this),
                gimgs = [];
            gals.each(function(i) {
                let bg_url = $(this).css('background-image');
                bg_url = /^url\((['"]?)(.*)\1\)$/.exec(bg_url);
                bg_url = bg_url ? bg_url[2] : "";
                gimgs.push(bg_url);
            });
            gals.promise().done(() => {
                gals.each(function(i) {
                    let ind = i;
                    $(this).click(function() {
                        $('body, html').addClass('fixed');
                        $('body').append(`<div class="licht lichtGALS"> <div class="wrap cont" /> </div>`);
                        let licht = $(`.lichtGALS`),
                            temp = `<section>
                                            <div class="container main">
                                                <span class="ccl"></span>
                                                <div class="close-pop-w ccl"></div>
                                                <div class="content">
                                                    <div class="prev slidebtn"><i class="fas fa-chevron-left"></i></div>
                                                    <div class="next slidebtn"><i class="fas fa-chevron-right"></i></div>
                                                     <div class="f f-j-c f-a-c"><img src="${gimgs[i]}" alt=""></div>
                                                 </div>
                                            </div>
                                        </section>`;
                        $('.cont', licht).html(temp);
                        licht.css({
                            'z-index': '1000',
                            'background-color': 'rgba(0,0,0,.87)'
                        });
                        licht.animate({
                            'opacity': '1'
                        });
                        $('.cancel, .ccl, .close, .schliess', licht).click(function() {
                            licht.animate({
                                'opacity': '0'
                            }, function() {
                                licht.remove();
                                $(`[pan-mnid`).removeClass('d-none');
                                if ($('.licht').length == 0)
                                    $('body, html').removeClass('fixed');

                            });

                        });

                        $('.next', licht).click(() => {
                            ind += 1;
                            if (ind >= gals.length)
                                ind = 0;
                            $('img', licht).attr('src', gimgs[ind]);
                        });
                        $('.prev', licht).click(() => {
                            ind -= 1;
                            if (ind < 0)
                                ind = gals.length - 1;
                            $('img', licht).attr('src', gimgs[ind]);
                        });
                    });
                });
            });
        });
    });
</script>