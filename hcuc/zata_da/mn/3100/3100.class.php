<?php
if(!class_exists('MNC3100')){
class MNC3100 extends INFOEXT {
    public function itemList($CON, $item, $i){ 
        $disp = ['',''];
        $type = $i == 1 ? 'odd' : 'even' ;
        
        $tmp = '<div class="bimg-w">
            <div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].');"> </div>
        </div>
        <div class="ttl">'.$item['title'].'</div>';
        
        if($item['link']['redir']) $tmp = '<a href="'.$item['link']['redir'].'">'.$tmp.'</a>';
        
        return '<div class="item '.$type.'" style="background-image: url()">
            <div class="wrapxp f">'.$tmp.'</div>
        </div>'; 
    } 
}
}
$MNC['3100'] = new MNC3100;