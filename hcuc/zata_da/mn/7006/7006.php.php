<?php
$disp = [0=>'',1=>''];

$res_m = $this->getInfo($CON,$folder,['fid','m']);

while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[0] .= $MNC[$folder['module']]->itemList($item);
}

echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].');" da-id="'.$folder['id'].'" class="" > 
    <div class="container">
        <div class="alone">'.$MAIN['title'].$MAIN['smr'].'</div>
        <div class="itms">
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
    
    $('[da-iframe]', main).each(function(){
        let das = $(this),
            iframelink = das.attr('da-iframe');
        das.click(()=>{ window.open(iframelink, '_blank'); });
    });
    
});
</script>