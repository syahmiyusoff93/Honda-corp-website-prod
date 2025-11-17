<?php
if(!class_exists('MNC1200')){
    class MNC1200 extends INFOEXT {
        public function getList($CON, $folder) {
            $disp = ['',''];  
            $btn = '';  
            
            $res_m = $this->getInfo($CON,$folder,['fid','i','1' ]);
            while($item_m = $res_m->fetch_object()){
                $item = $this->itemInfo($item_m, $folder['dot']); 
                
                $disp[0] .='<div class="col-md-6">
                    <div class="ttl">'.$item['title'].'</div>
                    <div class="desc">'.$item['content'].'</div>
                </div> ';
            } 
            return $disp[0];
        }
    }
}
$MNC['1200'] = new MNC1200();