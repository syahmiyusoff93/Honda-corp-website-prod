<?php
$disp = [0=>'',1=>'']; 

$res_m = $this->getInfo($CON,$folder,['fid','i','1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $item['title'] = empty($item['title'])?'':'<h2>'.$item['title'].'</h2>';
    $item['bgurl'] = empty($item['bgurl'])?'':'<p><img src="'.$item['bgurl'].'" alt=""></p>';
    
    $btn = '';
    if( $item['link']['redir'] )
        $btn = '<a class="btn-gen" href="'.$item['link']['redir'].'">View</a>';
    if( $item['docurl'] )
        $btn = '<a target="_blank" class="btn-gen" href="'.$item['docurl'].'">Download PDF</a>';
    
    $disp[0] .= '<div class="col-md-6">'.$item['bgurl'].'</div>
                <div class="col-md-6">'.$item['title'].'
                    <div class="wrapxp desc"> '.$item['content'].$disp[1].$btn.' </div>
                </div>';
}

echo '<section class=" f f-j-c f-a-c" mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
    <div class="container main animated int" da-inani="fadeInUp">
        <div class="row">'.$disp[0].'</div>
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
 