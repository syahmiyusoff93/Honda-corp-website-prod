<?php
$disp = [''];

$disp[0] .= $MNC[$folder['module']]->getList($CON, $folder); 

echo '<section class="" mn="'.$folder['module'].'"  da-id="'.$folder['id'].'" style="background-image: url('.$folder['bgurl'].')"> 
    <div class="wrap bg-contain main-w" >
        <div class="container main">
            <div class="row">'.$disp[0].'</div>
        </div>
    </div>
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