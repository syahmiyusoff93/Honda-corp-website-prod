<?php
if(!class_exists('MNC3005')){
    class MNC3005 extends INFOEXT {
        public function itemList($CON, $item){ 
            $disp = ['','']; 
            
            $res = $this->getInfo($CON,$item,['fid','i']);
            while($data = $res->fetch_object()){
                $info = $this->itemInfo($data, $item['dot']);

                $disp[0] .= '<h2>'.$info['title'].'</h2>
                '.$info['content'].$item['bgimg'];
            }
            if(!empty($disp[0]))
                $disp[0] = '<template>'.$disp[0].'</template>';
            
            $date = $this->toDate($item,'');
            
            return '<div class="item" style="background-image: url()">
                <div class="wrap">
                   <div class="bimg-w">
                       <div class="bimg bg-cover" da-hovsec="all 6s ease .5s" da-bgsrc="'.$item['bgsml'].'";"> </div>
                   </div>
                   <a>
                      <div class="wrap">
                           <div class="ttl">'.$date.'</div> 
                           <div class="view">Clieck Here to Large View</div>
                           '.$disp[0].'
                       </div>
                    </a>
                </div>
            </div>';
            
            //if it's i level, return its parent id
        } 
    }
}
$MNC['3005'] = new MNC3005;