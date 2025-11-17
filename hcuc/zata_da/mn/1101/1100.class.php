<?php
if(!class_exists('MNC1101')){
    class MNC1101 extends INFOEXT {
        public function getList($CON, $folder) {
            $disp = ['',''];  
            $btn = '';  
            
            $res_m = $this->getInfo($CON,$folder,['fid','i','1','1']);
            while($item_m = $res_m->fetch_object()){
                $item = $this->itemInfo($item_m, $folder['dot']);
                 
                if( $item['link']['redir'] )
                    $btn = $this->button($item['link']['redir'], 'btn-gen');

                $img = $ttl = '';
                if( !empty($item['title']) )
                    $ttl = $this->ttlCutting($item);
                if( !empty($item['bgurl']) )
                    $img = '<p><span class="img-w"><img src="'.$item['bgurl'].'" /></span></p>';
                
                $disp[0] .='<div class="col-md-6">'.$img.'</div>
                <div class="col-md-6">
                    '.$ttl.'
                    <div class="desc">'.$item['content'].'</div>
                    <div class="taste">'.$btn.'</div>
                </div>';
            } 
            return $disp[0];
        }
    }
}
$MNC['1101'] = new MNC1101();