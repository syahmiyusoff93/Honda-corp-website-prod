<?php
if(!class_exists('MNC5002')){
    class MNC5002 {
        public function itemList($item, $i) {
            $item['title'] = empty($item['title'])?:'<h2>'.$item['title'].'</h2>';
            $item['bildurl'] = empty($item['bildurl'])?'':'<img class="obj" src="'.$item['bildurl'].'" alt="">';
                
            return '<div class="wrap itm bg-cover f f-a-c f-j-c" style="background-image: url('.$item['bgurl'].')">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8"></div>
                                <div class="col-lg-4">' .$item['title'].$item['content'].$item['bildurl'].'</div>
                            </div>
                        </div>
                    </div>';
        }
    }
}
$MNC['5002'] = new MNC5002();