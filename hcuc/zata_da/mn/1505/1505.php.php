<?php
$disp = [0=>'',1=>''];
if( isset($_SESSION['member']) ){
    $res_m = $this->getInfo($CON,$folder,['fid','i','2']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);

        $tmp = '<div class="bimg-w">
            <div class="bimg" style="-webkit-mask-image: url('.$item['bgurl'].'); mask-image: url('.$item['bgurl'].')"></div>
        </div>';
        if($item['link']['redir'])
            $tmp = '<a href="'.$item['link']['redir'].'" target="_blank">'.$tmp.'</a>';

        $disp[1] .= '<div class="itm">
            <div class="wrap">
                <div class="scon">'.$tmp.'</div>
            </div>
        </div>';
    }

    if(!empty($disp[1]))
        $disp[1] = '<div class="itms f f-a-c f-j-c med">'.$disp[1].'</div>';

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


        if(empty($item['bildurl'])){
            $disp[0] .= '<div class="col-12">'.$item['title'].$item['bgurl'].'
                        <div class="wrapxp desc"> '.$item['content'].$disp[1].' </div>
                        </div> 
                        <div class="col-12">'.$btn.'</div>';
        }else{
            $item['bildurl'] = '<div class="col-md-6"><p><img src="'.$item['bildurl'].'" alt=""></p></div>';
            $disp[0] .= $item['bildurl'].'
                        <div class="col-md-6"> '.$item['content'].$disp[1].' </div>
                        <div class="col-12">'.$btn.'</div>';
        } 
    }
}elseif( $PRIV == 0 ){
    $PRIV = 1;
    $disp[0] = file_get_contents('zata_da/mn/mn.login.php');
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