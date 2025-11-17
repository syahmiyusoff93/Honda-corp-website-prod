<?php
if(!class_exists('MNC7002')){
class MNC7002 extends INFOEXT {
    public function itemList($item, $i) {
        $disp = [[],'']; $img = $taste = ''; 

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
    public function buttons($item) {
        $link = '';

        if( $item['link']['redir'] ){
            $link = $item['link']['redir'];
        }
        if( $item['docurl'] ){
            $link = $item['docurl'];
        }
        

        return '<div><a href="'.$link.'" class="btn-gen wrap">'.$item['title'].'<span></span></a></div>';
    }
}
}
$MNC['7002'] = new MNC7002;