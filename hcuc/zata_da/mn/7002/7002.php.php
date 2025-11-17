<?php
$disp = [0=>'',1=>''];

$res_m = $this->getInfo($CON,$folder,['fid','i','1','9']);
$i = 1;
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[0] .= $MNC[$folder['module']]->itemList($item, $i);
    $i ++;
}

$res_m = $this->getInfo($CON,$folder,['fid','i','2']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[1] .= $MNC[$folder['module']]->buttons($item);
}

echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].');" da-id="'.$folder['id'].'" class="" da-panx="module"> 
        <div class="container">
            <div class="alone">'.$MAIN['title'].$MAIN['smr'].'</div>
            <div class="itms animated int" da-inani="fadeIn">
                <div class="f">'.$disp[0].'</div>
            </div>
            <div class="taste">
                <div class="row">
                    <div class="col-sm-12 div-link" style="display:contents">
                        '.$disp[1].' 
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
            id = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${id}"]`);
        
        $('.div-link > div').addClass('col-sm-6');
        $('.div-link > div > a').removeClass('btn-gen');
        $('.div-link > div > a').addClass('btn-gen-v2');
    });
</script>