<?php
if(!class_exists('MNC7101')){
    class MNC7101 {
        public function itemList($item) {
            $disp = [0=>'', 1=>''];
            
            return '<div class="itm">
                        <div class="wrap">
                            <div class="bimg-w"><div class="bimg bg-cover" style="background-image: url('.$item['bgurl'].')"></div></div>
                            <div class="ittl">'.$item['title'].'</div>
                            <template>
                                <h2>'.$item['title'].'</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><img src="'.$item['bgurl'].'" alt=""></p>
                                    </div>
                                    <div class="col-md-6">'.$item['content'].'</div>
                                </div>
                            </template>
                        </div>
                    </div>';
            
        }
    }
}
$MNC['7101'] = new MNC7101();