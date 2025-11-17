<?php
if(!class_exists('MNC4001')) {
class MNC4001 extends INFOEXT{
    public function group($CON, $folder) { 
        $disp = [0=>'',1=>''];
        $res_m = $this->getInfo($CON,$folder,['fid','i','1','']);
        
        while($item_m = $res_m->fetch_object()){
            $item = $this->itemInfo($item_m, $folder['dot']);
            $disp[0] .= $this->profile($item);
        }

        return '<div class="ele" da-mid="">
            <div class="ttl tab trans400">
                '.$folder['title'].'
            </div>
            <div class="liss">
                <div class="wrapxp lis">
                    <div class="align-items-center">
                    <div class="itms f">
                        '.$disp[0].'
                    </div>
                    </div>
                </div>
            </div>
        </div>';
    } 
    public function profile($item) { 
        $ttl = explode('=>', $item['title']);
        $ttl[0] = isset($ttl[0]) ? $ttl[0] : '' ;
        $ttl[1] = isset($ttl[1]) ? $ttl[1] : '' ;
        
        $post = '<div class="post">'.strip_tags($item['content']).'</div>';
        $name = '<div class="name">'.$ttl[0].'</div>';
        $other = '<div class="other">'.$ttl[1].'</div>';
        
        return '<div class="itm">
            <div class="wrap">
                <div class="bimg-w">
                    <div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].');"></div>
                    '. $post . $name . $other .' 
                </div>
            </div>
        </div>';
    }

}
}
$MNC['4001'] = new MNC4001();
