<?php
if(!class_exists('MNC4001')){
    class MNC4001 extends INFOEXT{
        public function intrTxt($CON, $folder) {
            $tmp = '';

            $res_m = $this->getInfo($CON,$folder,['fid','i', '2', '1']);

            while($item_m = $res_m->fetch_object()){
                $item = $this->itemInfo($item_m, $folder['dot']);
                $item['genttl'] = $item['title'];

                $tmp .= $this->compoundttl($item).'
                <div class="wrap">'.$item['content'].'</div>';
            } 

            return '<div class="intro">'.$tmp.'</div>';
        }
        public function accordionList($CON, $folder) {
            $tmp = '';
            
            $res_m = $this->getInfo($CON,$folder,['fid','i', '1']);

            while($item_m = $res_m->fetch_object()){
                $item = $this->itemInfo($item_m, $folder['dot']);
                $tmp .= '<div class="ele" da-mid="">
                    <div class="ttl tab trans400"><span class="bil"></span>'.$item['title'].'</div>
                    <div class="liss" style="display: none;">
                        <div class="wrapxp lis">
                            '.$item['content'].'
                        </div>
                    </div>
                </div> ';
            } 
            
            return $tmp;
        }
    }
}
$MNC['4001'] = new MNC4001();