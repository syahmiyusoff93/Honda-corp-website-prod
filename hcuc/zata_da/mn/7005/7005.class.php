<?php
if(!class_exists('MNC7005')){
class MNC7005 extends INFOEXT {
    public function logo($item){
        $tmp = '<div class="wrap">
            <div class="bimg-w">
                <div class="bimg bg-contain" style="background-image: url('.$item['bgurl'].')" da-img="'.$item['bgurl'].'"></div>
            </div> 
        </div>';
        
        if( $item['link']['redir'] ) $tmp = '<a href="'.$item['link']['redir'].'">'.$tmp.'</a>';
        
        return '<div class="itm f">'.$tmp.'</div>';
    }
}
}
$MNC['7005'] = new MNC7005;