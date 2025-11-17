<?php
if(!class_exists('MNC3003')){
    class MNC3003 extends INFOEXT{
        public function itemsList($CON, $item) {
            $disp = [0=>''];
            
            return '<div class="item bg-cover" style="background-image: url('.$item['bgurl'].')">
                <div class="f f-j-c f-a-c itemrow">
                    <div class="row f-j-c f-a-c">
                        <div class="ln"></div>
                        <div class="rn"></div>
                    </div>
                </div>
            </div>';
        }
    }
}
$MNC['3003'] = new MNC3003();