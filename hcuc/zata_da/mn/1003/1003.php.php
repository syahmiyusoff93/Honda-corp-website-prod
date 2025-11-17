<?php
$disp = [''];

$res_m = $this->getInfo($CON, $folder, ['fid','i']);
$i=0;
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[0] .= $MNC[$folder['module']]->itemList($item, $i);

    $i++;
}

echo '<section class="" mn="'.$folder['module'].'" da-id="'.$folder['id'].'">
    <div class="wrap itms">'.$disp[0].'</div>
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