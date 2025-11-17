<?php
    $disp = [0=>'',1=>''];
    $res_m = $this->getInfo($CON,$folder,['fid','i','1']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[0] .= $MNC[$folder['module']]->itemsList($CON, $item);
    }

    $res_m = $this->getInfo($CON,$folder,['fid','i','2','3']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[1] .= $MNC[$folder['module']]->groupList($CON, $item);
    }

    if(!empty($disp[1])){
        $disp[1] = '<div class="container btm">
                <div class="wrap infobx">
                <div class="infobx-ttl">What We Do</div> 
                <div class="infobx-itms">
                    <div class="infobx-w f">'.$disp[1].'</div>
                </div> 
            </div>
        </div>';
    }
    
    echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
        <div class="main top">
            <div class="owl-carousel" owl> '.$disp[0].' </div>
        </div> '.$disp[1].' 
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