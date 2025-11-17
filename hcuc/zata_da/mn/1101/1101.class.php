<?php
if(!class_exists('MNC1101')){
    class MNC1101 extends INFOEXT {
        public function getList($CON, $folder, $MAIN) {
            $disp = ['',''];  
            $group = $cont = [];
            $tmp = '';
            
            $res_m = $this->getInfo($CON,$folder,['fid','i','1', '8' ]);
            $c = $res_m->num_rows;
            $i = 0; 
            while($item_m = $res_m->fetch_object()){
                $item = $this->itemInfo($item_m, $folder['dot']); 
                
                if( $i !=0 && ($i % 4) == 0 ) {
                    array_push($group, $tmp);
                    $tmp = '';
                }  

                $tmp .= '<div class="itm" >
                    <div class="wrap">
                        <div class="bimg-w">
                            <div class="bimg bg-contain" style="background-image: url('.$item['bgurl'].')"><span class="nbr">'.($i + 1).'</span></div>
                        </div>
                        <div class="ttl">'.$item['title'].'</div> 
                        <div class="desc">'.$item['content'].'</div> 
                    </div>
                </div>';
 
                $i ++; 
            }  
            if( $c % 4 > 0 ){
                array_push($group, $tmp);
            } 

            $res_m = $this->getInfo($CON,$folder,['fid','i','2']); 
            $img = [];
            while($item_m = $res_m->fetch_object()){
                $item = $this->itemInfo($item_m, $folder['dot']); 
                
                 array_push($img, $item['bgurl']);
            }  

            foreach( $group as $k=>$v ){
                $title = $MAIN['title'];
                if( empty($img[$k]) ) $img[$k] = '';
                if($k > 0) $title = '';

                $disp[0] .= '<div class="itm-row f f-a-c">
                <div class="wrap">
                    <div class="lr-w f f-a-c">
                        <div class="l">
                            <div class="l-w animated int" da-inani="fadeIn">
                            '.$title.'
                            <div class="itms">
                            <div class="itms-w f">
                                '.$v.'
                            </div>
                            </div>
                            </div>
                        </div>
                        <div class="r animated int" da-inani="fadeIn">
                            <img src="'. $img[$k] .'" />
                        </div>
                    </div>
                </div>
                </div>';
            }


            return $disp[0]; 
        } 
    }
}
$MNC['1101'] = new MNC1101();