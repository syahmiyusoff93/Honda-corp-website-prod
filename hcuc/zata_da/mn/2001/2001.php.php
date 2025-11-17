<?php
$disp = ['','',''];

$res_m = $this->getInfo($CON, $folder, ['fid','i','3','3']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[2] .= $MNC[$folder['module']]->rechten($item);
}

$res_m = $this->getInfo($CON, $folder, ['fid','i','1','1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[0] .= $MNC[$folder['module']]->linken($item);
}

if( !empty($disp[2]) )
    $disp[0] = $disp[0].$disp[2];
if( !empty($disp[0]) )
    $disp[0] = '<div class="itm itm-linken"><div class="wrap"><div class="ttl"></div>'.$disp[0].'</div></div>';

if( !empty($disp[2]) )
    $disp[2] = '<div class="itm itm-rechten"><div class="wrap f f-a-c"><div class="wrap"><div class="ttl"></div>'.$disp[2].'</div></div></div>';

$res_m = $this->getInfo($CON, $folder, ['fid','i','2','1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[1] .= $MNC[$folder['module']]->mitteln($item);
}

echo '<section class=" f f-j-c f-a-c" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
    <div class="container main f f-a-c">'.$disp[0].$disp[1].$disp[2].'</div>
</section>';
?>

<script>
$(function() {
    let dot = `<?php echo $htt[0];?>`,
        mn = `<?php echo $folder['module'];?>`,
        mnid = `<?php echo $folder['id'];?>`,
        main = $(`[mn][da-id="${mnid}"]`);
    
    $('.itm-linken, .itm-rechten').each(function(){
        let das = $(this),
            disp = $('.ttl',das);
        
        $('a',das).each(function(){
           let btn = $(this),
               ttl = $('template',btn).html();
            btn.click(()=>{ disp.html(ttl); });
        }); 
    }); 
    //$('.btn-main',main).trigger('click');
});
</script>
