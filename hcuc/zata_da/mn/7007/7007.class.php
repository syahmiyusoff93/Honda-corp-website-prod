<?php
if(!class_exists('MNC7007')){
class MNC7007 extends INFOEXT {
    public function itemList($item) {
        $disp = ['','']; 
        
        return '<div class="itm int animated" da-inani="fadeIn"><div class="wrap">
            <div class="-w">
                <div class="ttl">'.$item['title'].'</div>
                <div class="list">'.$item['content'].'</div>
            </div>
        </div></div>';
    }
}
}
$MNC['7007'] = new MNC7007;