<?php
if(!class_exists('MNC7103')) {
    class MNC7103 extends INFOEXT{ 
        public function item($item) {
            $disp = [0=>'']; 
            $temp = '<div class="wrap">
                <div class="bimg-w">
                    <div class="bimg bg-cover" da-bgsrc="'.$item['bgurl'].'"></div>
                </div>
            </div>
            <div class="wrap">
                <div class="ttl">
                    '.$item['title'].'
                </div>
                <div class="desc">
                    '.$item['content'].'
                </div>
            </div>';
        
            if(!empty($item['link']['redir']))
                $temp = '<a target="_blank" href="'.$item['link']['redir'].'">'.$temp.'</a>';

            return '<div class="gal wrap bg-cover" >
                <div class="wrap">
                    '.$temp.'
                </div>
            </div>';
        }

    }
}
$MNC['7103'] = new MNC7103();