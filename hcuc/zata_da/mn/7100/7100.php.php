<?php
    $disp = [0=>'',1=>''];

    $res_m = $this->getInfo($CON, $folder, ['fid', 'i']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[0] .= $MNC[$folder['module']]->itemList($item);
    }

    echo '<section class="f f-j-c f-a-c" mn="'.$folder['module'].'" da-id="'.$folder['id'].'">
        <div class="bg-cover layer" style="background-image: url('.$folder['bgurl'].')"></div>
        <div class="gradient"></div>
        <div class="container main">
            <div class="wrap">
            <div class="wrap">'.$MAIN['title'].'</div>
            <div class="itms f">'.$disp[0].'</div>
            </div>
        </div>
    </section>';
?>

<script>
    $(function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`);
        
        $('.itm > div', main).each(function(){
            let das = $(this),
                tmp = $('template',das).html(),
                html = ` <div class="container main"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">${tmp}<div class="taste"><button class="btn-gen ccl">Back</button></div></div></div> `;
            
            uilichtEins(mn, das, html, ()=>{
                let licht = $(`.licht${mn}`);
                let gals = $('.bimg',licht),
                    gimgs = [];
                gals.each(function(i) {
                    let bg_url = $(this).css('background-image');
                    bg_url = /^url\((['"]?)(.*)\1\)$/.exec(bg_url);
                    bg_url = bg_url ? bg_url[2] : "";
                    gimgs.push(bg_url);
                });
                gals.promise().done(() => {
                    gals.each(function(i) {
                        let ind = i,
                            temp = `<div class="container main">
                                <div class="close-pop-w ccl"></div>
                                <div class="content">
                                    <div class="prev slidebtn"><i class="fas fa-chevron-left"></i></div>
                                    <div class="next slidebtn"><i class="fas fa-chevron-right"></i></div>
                                    <div class="f f-j-c f-a-c"><img src="${gimgs[i]}" alt=""></div> 
                                 </div>
                            </div>`;
                        
                        uilichtEins('GALS', $(this), temp, ()=>{
                            let licht = $(`.lichtGALS`);
                            
                            $('.next', licht).click(() => {
                                ind += 1;
                                if (ind >= gals.length) ind = 0;
                                $('img', licht).attr('src', gimgs[ind]);
                            });
                            $('.prev', licht).click(() => {
                                ind -= 1;
                                if (ind < 0) ind = gals.length - 1;
                                $('img', licht).attr('src', gimgs[ind]);
                            });
                        });
                    });
                });
            });
        });
        
            main.css({
                'min-height': `calc(100vh - ${$('[mn="8401"]').outerHeight()}px)`
            });
    });
</script>