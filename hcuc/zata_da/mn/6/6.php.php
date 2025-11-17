<?php
 
$disp = ['','',''];

$res_m = $this->getInfo($CON,$folder,['fid','m']);
$i = 1;
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]); 
    
    if($i < 5){
        $disp[0] .= '<div class="item sushi">
            <div class="f f-j-c wrapxp" da-pid="?pid='.$item['id'].'">
            <div class="wrap ttl-w">
                <div class="wrapxp f f-j-c"><div class="ttl">'.$item['title'].'</div></div>
                <div class="border"></div>
                </div>
                <div class="wrap">
                    <img src="'.$item['bgurl'].'" class="animated">
                </div>
            </div>
        </div>';
    }elseif($i < 6) {
        $disp[1] .= '<div class="item set">
            <div class="f f-j-fs wrapxp" da-pid="?pid='.$item['id'].'"> 
                <div class="wrap ttl-w">
                    <div class="wrapxp f f-j-c"><div class="ttl">'.$item['title'].'</div></div>
                    <div class="border"></div>
                </div>
                <div class="wrap">
                    <img src="'.$item['bgurl'].'" class="animated">
                </div>
            </div>
        </div>';
    }else{
        $disp[2] .= '<div class="item set">
            <div class="f f-j-fs wrapxp" da-pid="?pid='.$item['id'].'"> 
                <div class="wrap ttl-w">
                    <div class="wrapxp f f-j-c"><div class="ttl">'.$item['title'].'</div></div>
                    <div class="border"></div>
                </div>
                <div class="wrap">
                    <img src="'.$item['bgurl'].'" class="animated">
                </div>
            </div>
        </div>';
    }
    $i++;
}

echo '<section class=" f f-j-c " mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'">
<img class="foodimg" src="'.$htt[0].'zata_da/src/default/menu/img.menu.05.png" alt="">
    <div class="container main ">
        <img class="roundicon" src="'.$htt[0].'zata_da/src/default/menu/img.menu.01.png" alt="">
        <div class="img-welcometext">
            <img class="welcomtext" src="'.$htt[0].'zata_da/src/default/menu/img.menu.03.png" alt="">
            <img class="textdecor" src="'.$htt[0].'zata_da/src/default/menu/img.menu.02.png" alt="">
        </div>
        <img class="menutype" src="'.$htt[0].'zata_da/src/default/menu/img.menu.04.png" alt="">
        
        <div class="wrap">
            <div class="lr-w-1 f">
                <div class="l"></div>
                <div class="r">
                    <div class="r-w f"> '.$disp[0].' </div>
                </div>
            </div> 
        </div>
        
        <div class="wrap">
            <div class="lr-w-2 f">
                <div class="l">
                    <div class="r-w f">'.$disp[1].'</div>
                </div>
                <div class="r">
                    <div class="r-w f"> </div>
                </div>
            </div> 
        </div>
        
        <div class="wrap">
            <div class="items-listing f"> '.$disp[2].' </div> 
        </div>
        
    </div>
</section>';
?>



<script>
    $(async function() {
        let dot = `<?php echo $htt[0];?>`,
            mn = `<?php echo $folder['module'];?>`,
            mnid = `<?php echo $folder['id'];?>`,
            main = $(`[mn][da-id="${mnid}"]`); 
        $(`[da-pid]`, main).click(function(){ 
            let btn = $(this),
                url = btn.attr('da-pid');
            window.location.href = url;
        });
        $('.item', main).hover(function(){
            $('img', this).addClass('pulse');
        }, function(){
            $('img', this).removeClass('pulse');
        });
    });
</script>