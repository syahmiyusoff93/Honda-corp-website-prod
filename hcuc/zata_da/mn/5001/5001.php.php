<?php
    $disp = ['','',''];
    
    $disp[0] = $MNC[$folder['module']]->getForm(json_decode(file_get_contents('zata_da/src/default/collection.json'),true));

    echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
        <div class="container main">
            <form action="">
                '.$MAIN['title'].$MAIN['smr'].'
                <div class="row">'.$disp[0].'</div>
            </form>
        </div>
    </section>';
?>
<script>
    $(function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`),
            form = $('form',main);
        form.dekami({
            id: mnid,
            dot: dot,
            done: (D) => {
                let w = D.form.parent();
                w.css({
                    'height': w.outerHeight()
                });
                w.animate({
                    'opacity': '0'
                }, () => {
                    w.html(`<h2>Email Sent</h2><p style="text-align: left;">Thank you for your inquiry and we’ll get back to you as soon as possible, within 24 hours at the latest.</p> `).queue((q) => {
                        w.animate({
                            'opacity': '1'
                        });
                        q();
                    });
                });
            }
        });
    });
</script>