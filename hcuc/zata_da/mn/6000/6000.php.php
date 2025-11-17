<?php 
$disp = ['']; 
$class = $SECTTL = '';

$res_m = $this->getInfo($CON,$folder,['fid','i','1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);

    $disp[0] .= $item['iframe'];
    
    if(preg_match('/youtube/i', $item['iframe']))
        $class = 'video';
}
if( !empty($MAIN['title']) || !empty($MAIN['smr']) ){
    $SECTTL = '<div class="secttl">
        <div class="container">'.$MAIN['title'].$MAIN['smr'].'</div>
    </div>';
}

echo '<section mn="'.$folder['module'].'" style="background-image: url()" da-id="'.$folder['id'].'" class="'.$class.'">
    '.$SECTTL.'
    <div class="wrapxp main"> 
    </div>
    <div class="maplyr f f-a-c f-j-c">
        <div class="container">
            <p><img src="'.$htt[0].'zata_da/src/default/locationcon.png" alt=""></p>
            <h2>View Our Location</h2>
            <div class="taste"> <span>Open The Map</span> </div>
        </div>
    </div>
    <div class="wrap "><button class="btn-gen btn-ccl" type="button">Cancel</button></div>
</section>';
?>
 

<script>  
$(()=>{
    let mn = `<?php echo $folder['module'];?>`,
        mnid = `<?php echo $folder['id'];?>`,
        main = $(`[mn][da-id="${mnid}"]`),
        iframe = `<?php echo $disp[0];?>`,
        lyr = $('.maplyr',main),
        btnCcl = $('.btn-ccl',main);
    
    $('.main',main).html(iframe);
    $('.taste span',main).click(function(){
        lyr.fadeOut();
        btnCcl.fadeIn();
    });
    btnCcl.click(function(){
        btnCcl.fadeOut();
        lyr.fadeIn();
    });
});
</script>
