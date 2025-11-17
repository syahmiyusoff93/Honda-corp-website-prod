<?php
if(!class_exists('MNC2000')) {
    class MNC2000 extends INFOEXT{
        public function itemList($item) { 
            $disp = [0=>'']; 
            $ttl = explode('=>',$item['title']);
            $ttl[0] = empty($ttl[0])?'':'<div class="ttl">'.$ttl[0].'</div>';
            $ttl[1] = empty($ttl[1])?'':'<div class="subttl">'.$ttl[1].'</div>';

            return '<div class="bg-lay bg-cover" style="background-image: url('.$item['bgurl'].')"></div>
            <div class="bg-layer bg-cover" style="background-image: url('.$item['dot'].'zata_da/src/default/dotting.png)"></div>
            <div class="container main f f-j-c">
                <div class="txt-w">'.$ttl[0].$ttl[1].$item['content'].'</div>
            </div>'; 
        } 
    }
}
$MNC['2000'] = new MNC2000();