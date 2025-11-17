<?php
$disp = [0=>'',1=>'']; 

$res_m = $this->getInfo($CON,$folder,['fid','i','1','1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]); 
    $disp[0] .= '<div class="l">
                    <div class="l-w">
                        <h2>'.$item['title'].'</h2>
                        '.$item['content'].'
                    </div>
                </div>
                <div class="r"></div>';
    
}
if(!empty($disp[0])){
    $disp[0] = '<div class="container main txtbx-1">
        <div class="wrap">
            <div class="lr-w f">'.$disp[0].'</div>
        </div>
    </div>';
}

$res_m = $this->getInfo($CON,$folder,['fid','i','2','1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]); 
    $disp[1] .= '<div class="l">
                    <div class="l-w">
                        <h2>'.$item['title'].'</h2>
                        '.$item['content'].'
                    </div>
                </div>
                <div class="r"></div>';
    
}
if(!empty($disp[1])){
    $disp[1] = '<div class="container main txtbx-2">
        <img class="sushiplatebtm int animated" da-inani="fadeInLeft" src="'.$folder['dot'].'zata_da/src/default/about/about.ele.04.png" alt="">
        <img class="chalk int animated" da-inani="fadeIn"  src="'.$folder['dot'].'zata_da/src/default/about/about.ele.05.png" alt="">
        <img class="sourceplate int animated" da-inani="fadeIn"  src="'.$folder['dot'].'zata_da/src/default/about/about.ele.06.png" alt="">
        <div class="wrap">
            <div class="lr-w f f-j-e">'.$disp[1].'</div>
        </div>
    </div>';
}




echo '<section class=" f f-j-c f-a-c" mn="'.$folder['module'].'" style="background-image: url('.$folder['dot'].'zata_da/src/default/about/about.bg.jpg)" da-id="'.$folder['id'].'">
    <img class="redround" src="'.$folder['dot'].'zata_da/src/default/about/about.ele.01.png" alt="">
    <img class="sushicon" src="'.$folder['dot'].'zata_da/src/default/about/about.ele.02.png" alt="">
    <img class="sushiplate int animated" da-inani="fadeInRight"  src="'.$folder['dot'].'zata_da/src/default/about/about.bg.01.png" alt="">
    
    <div class="container main txtbx-0">
        <img src="'.$folder['dot'].'zata_da/src/default/about/about.ele.03.png" alt="">
    </div>
    
    '.$disp[0].$disp[1].' 
</section>';
?>



<script>
    $(async function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`); 
    });
</script>