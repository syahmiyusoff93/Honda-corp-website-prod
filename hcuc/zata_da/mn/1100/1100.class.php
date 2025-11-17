<?php
if(!class_exists('MNC1100')){
    class MNC1100 extends INFOEXT {
        public function getList($CON, $folder) {
            $disp = ['',''];  
            $btn = '';  
            
            $res_m = $this->getInfo($CON,$folder,['fid','i','1' ]);
            while($item_m = $res_m->fetch_object()){
                $item = $this->itemInfo($item_m, $folder['dot']);
                  
                
                $disp[0] .='<div class="itm-row f f-a-c">
                <div class="wrap">
                    <div class="lr-w f f-a-c">
                        <div class="l">
                            <div class="l-w animated int" da-inani="fadeIn">
                                <h2 class="ttl">'.$item['title'].'</h2>
                                <div class="desc">'.$item['content'].'</div>
                            </div>
                        </div>
                        <div class="r animated int" da-inani="fadeIn">
                            <img src="'.$item['bgurl'].'" />
                        </div>
                    </div>
                </div>
                </div>';
            } 
            return $disp[0];
        }
    }
}
$MNC['1100'] = new MNC1100();