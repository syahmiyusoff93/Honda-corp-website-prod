<?php
$disp = [0=>'',1=>''];

$res_m = $this->getInfo($CON,$folder,['fid','i','1','1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    
    $link = '';
    if( $item['link']['redir'] )
        $link = 'href="'.$item['link']['redir'].'"';
    if(!empty($item['docurl']))
        $link = 'href="'.$item['docurl'].'" target="_blank"';
    $disp[0] = '<a '.$link.' class="btn-gen">'.$item['title'].'</a>';
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