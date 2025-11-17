<?php
if(!class_exists('MNC7001')){
class MNC7001 extends INFOEXT {
    public function itemList($item, $i) {
        $disp = [[],'']; $img = $taste = ''; 

        $data = json_encode($disp[0],true);

        $tmp = '<div class="wrap">
            <div class="bimg-w">
                <div class="bimg bg-contain" style="background-image: url('.$item['bgurl'].');">
                <span class="nbr" style="display:none">'.($i).'</span>
                </div>
            </div>
            <div class="txt">
                <div class="ttl">'.$item['title'].'</div>
                <div class="wrap">'.$img.'</div>  
            </div>
            <div class="desc">
                <div >'.$item['content'].'</div> 
            </div>
            '.$taste.'
        </div>'; 

        return '<div class="itm"><div class="wrap">'.$tmp.'</div></div>';
    }
}
}
$MNC['7001'] = new MNC7001;