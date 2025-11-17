<?php
$disp = [0=>'',1=>'']; 

$res_m=$this->getinfo($CON,$folder,['fid','i','1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[0] .= $MNC[$folder['module']]->item($item);
}

$disp['btn'] = '';
if( $folder['sync']['redir'] )
    $disp['btn'] = '<a class="btn-gen" href="'.$folder['sync']['redir'].'">Check Availability</a>';


echo '<section mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].');" da-id="'.$folder['id'].'" class="">
        <div class="container">
            '.$MAIN['title'].$MAIN['smr'].'
            <div class="gals f f-j-c">'.$disp[0].'</div>
            <div class="wrap"><div class="taste">'.$disp['btn'].'</div></div>
            <div class="wrap"><div class="shr-w">'.$MNC[$folder['module']]->sharer($pid, $folder).'</div></div>
        </div>
</section>';
?>

<script>
    $(function() {
        let mn = `<?php echo $folder['module'];?>`,
            id = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${id}"]`); 
    });
</script> 