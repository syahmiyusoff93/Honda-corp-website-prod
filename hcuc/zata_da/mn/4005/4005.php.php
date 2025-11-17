<?php
    $q_m = 'SELECT * FROM lists 
            WHERE list_fid = "'.$folder['id'].'" AND list_type = "i" AND list_status = "1"
            ORDER BY list_priority;';
    $res_m = $CON->query($q_m);
    $disp = [0=>''];
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $link = empty($item['link']['redir'])?'#':$item['link']['redir'];
        
        $disp[0] .= '<a href="'.$link.'">
        <div class="bimg-w">
            <div class="bimg bg-cover" style="-webkit-mask-image: url('.$item['bgurl'].'); mask-image: url('.$item['bgurl'].');"> </div>
        </div> <span>'.strip_tags($item['title']).'</span> </a>';
    }

    echo '<div mn="4005">
            '.$disp[0].'
          </div>';