<?php
$disp = [0=>'',1=>''];

$res_m = $this->getInfo($CON, $folder, ['fid', 'i', '1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[0] .= $MNC[$folder['module']]->itemList($item);
}

$res_m = $this->getInfo($CON, $folder, ['fid', 'i', '2']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $disp[1] .= '<div class="gal">
        <div class="wrap">
            <div class="bimg-w">
                <div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].')"></div>
            </div>
        </div>
    </div>';
}
if(!empty($disp[1]))
    $disp[1] = '<div class="gals f">'.$disp[1].'</div>';

echo '<section class=" f f-j-c f-a-c" mn="'.$folder['module'].'" da-id="'.$folder['id'].'">
    <div class="bg-cover layer" style="background-image: url('.$folder['bgurl'].')"></div>
    <div class="gradient"></div>
    <div class="container-fluid">
        <div class="container main animated int" da-inani="fadeInUp">
            <div class="objgrp">
                <img class="obj01" src="'.$htt[0].'zata_da/src/default/img.01.png" xhref="http://stellarputrajaya.com/">
                <img class="obj02" src="'.$htt[0].'zata_da/src/default/img.02.png" xhref="#">
                <img class="obj03" src="'.$htt[0].'zata_da/src/default/img.03.png" xhref="http://www.shaftsburyputrajaya.com.my/">
            </div>
            <div class="row"><div class="col-12">'.$disp[0].'</div></div>
            <div class="wrap">'.$disp[1].'</div>
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
        
        $(window).on('load', ()=>{
            main.css({'min-height': `calc(100vh - ${$('[mn="8401"]').outerHeight()}px)`});
        }); 
        
        $('img[class*=obj]',main).click(function(){
            let img = $(this),
                href = img.attr('xhref');
            console.log(href);
            
            if(href != '#') window.open(href, "_blank");
        });
        $('img:not([class*=obj])',main).each(function() {
            let img = $(this),
                temp = `<img class="zm" src="${img.attr('src')}" alt="">`,
                html = `<div mn="enlargement"><div class="container xmain"><span class="ccl"></span><div class="close-pop-w ccl"></div><div class="wrap">${temp}</div></div></div>`;

            uilichtEins(mn, img, html);
        });
    });
</script>