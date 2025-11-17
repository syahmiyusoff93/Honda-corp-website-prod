<?php
    $disp = [0=>''];

    $i=0;
    $res_m = $this->getInfo($CON,$folder,['fid','i','','']);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $ani = empty($i%2)?'fadeInLeft':'fadeInRight';
        
        $link='';
        if( !empty($item['link']['redir']) )
            $link = '<div class="taste"> <a href="'.$item['link']['redir'].'" class="btn-gen">Read More </a> </div>';
        if( !empty($item['docurl']) )
            $link = '<div class="taste"> <a target="_blank" href="'.$item['docurl'].'" class="btn-gen">Download Catalogue</a> </div>';
        
        if( !empty($item['bildurl']) )
            $item['bildurl']='<div class="icon">
                <div class="bimg-w">
                    <div class="bimg bg-contain" style="background-image: url('.$item['bildurl'].')"></div>
                </div>
            </div>';

        if( !empty($item['title']) ){
            $item['title'] = '<div class="ttl">'.$item['title'].'</div>';
        }
            
        $disp[0].='<div class="wrap itm animated int" da-inani="'.$ani.'"  da-id="'.$item['id'].'">
            <div class="wrap f">
                <div class="ln bg-cover" style="background-image: url('.$item['bgurl'].')">
                    <div class="bimg-w">
                        <div class="bimg"></div>
                    </div>
                </div>
                <div class="rn f f-a-c f-j-c" style="">
                '.$item['title'].'
                    <div class="wrap txt">
                        '.$item['bildurl'].' 
                        <div class="desc">'.$item['content'].'</div>
                        '.$link.'
                    </div>
                </div>
            </div>
        </div>';
        
        $i++;
    }
    
    echo '<section class="" mn="'.$folder['module'].'" da-id="'.$folder['id'].'">
        <div class="wrap itms">'.$disp[0].'</div>
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