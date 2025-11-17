<?php
    $disp = [0=>'',1=>''];
    $res_m = $this->getInfo($CON,$folder,['fid','i']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[0] .= $MNC[$folder['module']]->itemsList($CON, $item);
    }
    
    echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
        <div class="main">
            <div class="owl-carousel" owl>
                '.$disp[0].'
            </div>
        </div>

    </section>';

    $a_l = file_get_contents('zata_da/mn/'.$folder['module'].'/arrow-l.svg');
    $a_r = file_get_contents('zata_da/mn/'.$folder['module'].'/arrow-r.svg');
?> 
<script>
    $(async () => { 
        let mn = `<?php echo $folder['module'];?>`,
            id = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${id}"]`);

        MNC<?php echo $folder['module']?>JS(main, mn, id); 
    });
</script>