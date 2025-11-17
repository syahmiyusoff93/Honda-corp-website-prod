<?php 
    $disp = [0=>'',1=>''];
    $res_m = $this->getInfo($CON,$folder,['fid','m']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[0] .= $MNC[$folder['module']]->group($CON, $item);
    }
    
    $smr = empty(strip_tags($folder['smr']))?'':'<div class="sum">'.$folder['smr'].'</div>';
    $folder['genttl'] = empty($folder['genttl'])?'':'<h2>'.$folder['genttl'].'</h2>';

    echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'" class="">
            <div class="container main">
                '.$MAIN['title'].$MAIN['smr'].'
                <div class="wrap eles">
                    '.$disp[0].'
                </div>
            </div>
    </section>';
?>


<script>
    $(function() {
        let id = `<?php echo $folder['id'];?>`,
            mn = `<?php echo $folder['module'];?>`,
            main = $(`[mn="${mn}"][da-id=${id}]`);
        $('.tab', main).each(function() {
            let das = $(this),
                par = das.parent();

            das.click(function() {
                das.toggleClass('active');
                $('+.liss', das).slideToggle();

                par.siblings().children('.liss').slideUp();
                par.siblings().children('.tab').removeClass('active');
            });
        });
        
        $('.itm a:not([href])', main).each(function(){
            let btn=$(this),
                temp = $('template', btn).html(),
                html = `<div class="container main"><div class="close-pop-w ccl"></div><div class="wrap">${temp}</div></div>`;
            uilichtEins(mn, btn, html, ()=>{
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
        
        let triigerid = getUrlVars()['iid']; 
        
        $('.itm a', main).promise().done(()=>{
            if(Boolean(triigerid)){
                $(`[da-iid="${triigerid}"]`,main).trigger('click');
                $('html').addClass('fixed');
            }
        });
        
    });
</script>