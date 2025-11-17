<?php 
    $disp = ['','','','','',''];
    $res_m = $this->getInfo($CON,$folder,['fid','i','1']); 
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[0] .= $MNC[$folder['module']]->logo($item);
    } 
    if(!empty($disp[0])){
        $disp[0] = '<div class="container">
            <div class="wrap">
                <h2 class="cath2">Organised by</h2>
                <div class="itms f f-j-sa">'.$disp[0].'</div>
            </div>
        </div>'; 
    }


    $res_m = $this->getInfo($CON,$folder,['fid','i','2']); 
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[1] .= $MNC[$folder['module']]->logo($item);
    } 
    if(!empty($disp[1])){
        $disp[1] = '<div class="container">
            <div class="wrap">
                <h2 class="cath2">Endorsed by</h2>
                <div class="itms f f-j-sa">'.$disp[1].'</div>
            </div>
        </div>'; 
    }


    $res_m = $this->getInfo($CON,$folder,['fid','i','3']); 
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[2] .= $MNC[$folder['module']]->logo($item);
    } 
    if(!empty($disp[2])){
        $disp[2] = '<div class="container">
            <div class="wrap">
                <h2 class="cath2">Supported by</h2>
                <div class="itms f f-j-sa">'.$disp[2].'</div>
            </div>
        </div>'; 
    }




    echo '<section class="" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
        <div class="container">
            <div class="wrap">'.$MAIN['title'].$MAIN['smr'].'</div>
        </div>
         '.$disp[0].' 
         '.$disp[1].' 
         '.$disp[2].' 
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