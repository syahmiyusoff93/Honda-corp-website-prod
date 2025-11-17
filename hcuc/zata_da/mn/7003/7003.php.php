<?php 
    $disp = [''];
    $res_m = $this->getInfo($CON,$folder,['fid','i','1']); 
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        
        $tmp = '<div class="wrap">
            <div class="bimg-w">
                <div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].')" da-img="'.$item['bgurl'].'"></div>
            </div>
            <div class="ttl">'.$item['title'].'</div>
        </div>';
        
        $btn = '';
        if( $item['link']['redir'] ) $btn = '<div class="taste">'.$this->button($item['link']['redir'], 'btn-gen').'</div>';
        
        $disp[0] .= '<div class="itm f animated int" da-inani="fadeIn">'.$tmp.$btn.'</div>';
    } 

    echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
        <div class="container">
            <div class="wrap">'.$MAIN['title'].$MAIN['smr'].'</div>
        </div>
        <div class="container main">
            <div class="wrap">
                <div class="itms f">
                    '.$disp[0].'
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
        
    });
</script>