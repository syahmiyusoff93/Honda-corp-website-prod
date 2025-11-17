<?php
    $disp = [''];

    $res_m = $this->getInfo($CON, $folder, ['fid','i','1','1']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[0] .= $MNC[$folder['module']]->itemList($item);
    }
    
    echo '<section class=" f f-j-c f-a-c main-bg-check" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">'.$disp[0].'</section>';
?>

<script>
    $(function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`);

        if(($('.main-bg-check > div').css('background-image') !== 'url("")') == false){
            $('.main-bg-check').css('min-height', 'unset');
            $('.main-bg-check').css('padding', '25px 0');
            $('.main-bg-check > .container > div > div').css('color', '#282A2F');
        }

        let url = window.location.href;
        if(url.includes('buyer-seller-guide')){
            $('.main-bg-check').css('display', 'none');
        }
    });
</script>
