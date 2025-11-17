<?php
if(!class_exists('MNC1900')){
    class MNC1900 {
        public function itemList($item) {
            $disp = [0=>'', 1=>''];
            
            if(!empty($item['bgurl']))
                $item['bgurl'] = '<p><img src="'.$item['bgurl'].'" alt=""></p>';
            if(!empty($item['bildurl']))
                $item['bildurl'] = '<p><img src="'.$item['bildurl'].'" alt=""></p>';
            if(!empty($item['title']))
                $item['title'] = '<h2>'.$item['title'].'</h2>';
            if(!empty($item['iframe']))
                $item['iframe'] = '<h2>'.$item['iframe'].'</h2>';
            
            return $item['title'].$item['iframe'].$item['content'].$item['bgurl'];
        }
    }
}
$MNC['1900'] = new MNC1900();