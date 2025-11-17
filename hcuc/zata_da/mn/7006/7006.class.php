<?php
if(!class_exists('MNC7006')){
class MNC7006 extends INFOEXT {
    public function itemList($item) {
        $disp = ['',''];
        
        $link = $iframe = '';
//        if($item['link']['redir'])
//            $link = "href=\"{$item['link']['redir']}\"";
        
        if( isset($item['link']['redir']) && !empty($item['link']['redir']) ){
            $iframe = "da-iframe=\"{$item['link']['redir']}\"";
            $iframe = '<div class="img-w" '.$iframe.'><img src="'.$item['dot'].'zata_da/src/default/360.png" /></div>
            <div class="wrap">Virtual Tour</div> ';
        }
        return '<div class="itm"><div class="wrap"><a href="?pid='.$item['id'].'">
            <div class="wrapxp"> 
                <div class="bimg-w">
                    <div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].');"></div>
                </div> 
                <div class="txt"> 
                    <div class="f f-a-fe">
                        <div class="l"> 
                            '.$iframe.' 
                            <div class="ttl">'.$item['title'].'</div> 
                        </div>
                        <div class="r">'.$item['content'].'</div> 
                    </div>
                </div>  
            </div>
        </a></div></div>';
    }
}
}
$MNC['7006'] = new MNC7006;