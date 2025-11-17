<?php
if(!isset($MN[$folder['module'].$folder['id']])){ 
    $disp = [0=>''];
    $MN[$folder['module'].$folder['id']] = 1;
    $q_m = "SELECT * FROM lists WHERE list_fid='$folder[id]' AND list_type='m' AND list_status='1' 
          ORDER BY list_priority;";
    $res_m = $CON->query($q_m);
    $item = $this->itemInfo('', $htt[0]);
    while($item_m = $res_m->fetch_object()){
        $item = $this->itemInfo($item_m, $htt[0]);
        $disp[0] .= '<div class="wrap el">
                        <a href="?pid='.$item['id'].'">
                            <div class="wrap">
                                <div class="wrap"><div class="bimg-w"><div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].')"></div></div></div>
                                <div class="info wrap"><div class="ttl">'.$item['title'].'</div></div>
                            </div>
                        </a>
                    </div>';
    }
    $folder['genttl'] = empty($folder['genttl'])?'':"<h2>$folder[genttl]</h2>";
    echo '<section mn="'.$folder['module'].'" da-id="'.$folder['id'].'" class="">
                <div class="container main">
                    '.$folder['genttl'].'
                    <div class="f els">'.$disp[0].'</div>
                </div>
        </section>';
    
}