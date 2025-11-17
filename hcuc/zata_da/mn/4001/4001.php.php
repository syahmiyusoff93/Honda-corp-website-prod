<?php
    $disp = ['',''];

    echo '<section class="" mn="'.$folder['module'].'" da-id="'.$folder['id'].'">
        <div class="container main">
            '.$MAIN['title'] .'
            <div class="wrap">
                '.$MNC[$folder['module']]->intrTxt($CON, $folder).' 
                <div class="tabbx">
                    <div class="wrap eles">
                        '.$MNC[$folder['module']]->accordionList($CON, $folder).' 
                        <div class="taste txt-c"></div>
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
            main = $(`[mn][da-id="${mnid}"]`);

        if($('.ele', main).length>6){
            $('.taste', main).append(`<button class="btn-gen btn-show">Read All</button>`)
        }
        $(window).resize(async () => {
            let H = await menuH;
            H += $('[mn="8401"]').outerHeight();
            main.css('min-height', `calc(100vh - ${H}px)`)
        }).resize();
    
        $('.tab', main).each(function () {
            let das = $(this),
                par = das.parent();

            das.click(function () {
                das.toggleClass('active');
                $('+.liss', das).slideToggle();

                par.siblings().children('.liss').slideUp();
                par.siblings().children('.tab').removeClass('active');
            });
        });

        let btnShow = $('.btn-show', main);

        btnShow.click(function(){
            if(main.hasClass('showall')){
                main.toggleClass('showall');
                btnShow.html('Read All');
            }else{
                btnShow.html('Show Less');
                main.toggleClass('showall');
            }
        })
 
    });
</script>