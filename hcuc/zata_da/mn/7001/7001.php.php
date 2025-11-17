<?php
$disp = [0=>'',1=>''];

$res_m = $this->getInfo($CON,$folder,['fid','i', '1', '9']);
$i = 1;
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[0] .= $MNC[$folder['module']]->itemList($item, $i);
    $i ++;
}

echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].');" da-id="'.$folder['id'].'" class="" da-panx="module"> 
        <div class="container">
            <div class="alone">'.$MAIN['title'].$MAIN['smr'].'</div>
            <div class="itms animated int" da-inani="fadeIn">
                <div class="f">'.$disp[0].'</div>
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
 
    });
</script>
 