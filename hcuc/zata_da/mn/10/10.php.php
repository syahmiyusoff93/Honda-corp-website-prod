<?php 
$disp = [0=>'',1=>''];
$nav = $MNC[$folder['module']]->pageMenu($CON, $pid);

$res_m = $this -> getInfo($CON,$folder,['fid','i','1']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $link = empty($item['link']['redir'])?'#':$item['link']['redir'];
    $disp[1].='<div class="itm">
        <div class="f f-a-c">
            <div class="l"><div class="bimg-w icon"><div class="bimg bg-masking" style="-webkit-mask-image: url('.$item['bgurl'].'); mask-image: url('.$item['bgurl'].')"></div></div></div>
            <div class="r">'.$item['content'].'</div> 
        </div>
    </div>';
}

$res_m = $this -> getInfo($CON,$folder,['fid','i','2']);
while($item_m = $res_m->fetch_object()){
    $item = $this->itemInfo($item_m, $htt[0]);
    $link = empty($item['link']['redir'])?'#':$item['link']['redir'];
    $disp[0].='<div class="scon-el"><div class="scon">
        <a href="'.$link.'" target="_blank">
            <div class="bimg-w">
                <div class="bimg" style="-webkit-mask-image: url('.$item['bgurl'].'); mask-image: url('.$item['bgurl'].')"></div>
            </div>
        </a>
    </div></div>';
}
if(!empty($disp[0])) $disp[0] = '<div class="med f f-j-fe">'.$disp[0].'</div>';

$BOOKBTN = '';
//$BOOKBTN = $MNC[$folder['module']]->bookBtn($CON, $pid);

echo '<div class="wrap headertop">
    <div class="container-fluid">
        <div class="f f-a-c">
            <div class="ln">
                <div class="wrap">
                    <div class="itms f">
                        '.$disp[1].'
                    </div>
                </div>
            </div>
            <div class="rn">
                '.$disp[0].'
            </div>
        </div>
    </div>
</div>
<div class="mob-nav">
    <div class="container-fluid">
        <div class="f f-j-sb f-a-c">
            <div class="logo"><a href="'.$folder['dot'].'"><img src="'.$comp['imglogo'].'" alt=""></a></div>
 
            <div class="menucon f f-j-c f-a-c"><i class="fas fa-bars"></i></div>
        </div>
    </div>
</div>
<div mn="menu">
    <div class="container-fluid main">
        <div class="nav f f-j-fs j-a-c">
            <!-- <div class="logo"><a href="'.$folder['dot'].'"><img src="'.$comp['imglogo'].'" alt=""></a></div> --!>
            <ul class="f f-j-c f-a-c"><li><div class="logo" style="overflow-y: clip;"><a href="'.$folder['dot'].'"><img src="'.$comp['imglogo'].'" alt=""></a></div></li>'.$nav[0].'</ul>
        </div>
    </div>
</div>';
?>

<style>
    .licht .container.nav {
        margin: 0;
        width: 100%;
        max-width: 100%;
        min-height: 100vh;
        background-color: #ffcb08;
        padding: 0;
    }
</style>

<script>
    $(function() { 
        menu_main(`<?php echo $pid;?>`, `<?php echo join(',',$dir['idc']);?>`);
    });
</script>