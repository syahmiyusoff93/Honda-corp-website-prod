<?php
$disp = [0=>'',1=>'']; 

if( isset($_SESSION['member']) ){
    $res_m = $this->getInfo($CON,$folder,['fid','i','1']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]); 

        $disp[0] .= '<p><a href="'.$item['dot'].'file.php?file='.$item['doc'].'" target="_blank"><i class="fas fa-file-alt"></i> '.$item['title'].'</a></p><hr>'; 
    }
}elseif( $PRIV == 0 ){
    $PRIV = 1;
    $disp[0] = file_get_contents('zata_da/mn/mn.login.php');
}
echo '<section class=" f f-j-c f-a-c" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
    <div class="container main animated int" da-inani="fadeInUp">
        <div class="wrap">'.$disp[0].'</div>
    </div>
</section>';
?>
<script>
    $(async function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`);
        $('.desc img',main).each(function() {
            let img = $(this),
                temp = `<img class="zm" src="${img.attr('src')}" alt="">`,
                html = `<section mn="enlargement"><div class="container xmain"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">${temp}</div></div></section>`;

            uilichtEins(mn, img, html);
        });
    });
</script>