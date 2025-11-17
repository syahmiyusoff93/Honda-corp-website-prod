<?php
if(!class_exists('MNC1003')){
    class MNC1003 {
        public function itemList($item, $i) {
            $ani = empty($i%2)?'fadeIn':'fadeIn';
            
            $link='';
            if( !empty($item['link']['redir']) )
                $link = '<div class="taste"> <a href="'.$item['link']['redir'].'" class="btn-gen">Discover More</a> </div>';

            if( !empty($item['bildurl']) )
                $item['bildurl']='<p><img src="'.$item['bildurl'].'" alt=""></p>';

            $item['title'] = explode('=>', $item['title']);
            $item['title'][0] = empty($item['title'][0])?'':'<h2>'.$item['title'][0].'</h2>';
            $item['title'][1] = empty($item['title'][1])?'':'<div class="sttl">'.$item['title'][1].'</div>';
            
            return '<div class="wrap itm animated int" da-inani="'.$ani.'">
                <div class="wrap f">
                    <div class="ln bg-cover" da-bgsrc="'.$item['bgurl'].'">
                        <div class="bimg-w">
                            <div class="bimg"></div>
                        </div>
                    </div>
                    <div class="rn f f-a-c f-j-c">
                        <div class="wrap">
                            '.$item['bildurl'].$item['title'][0].$item['title'][1].'
                            <div class="desc">'.$item['content'].'</div>
                            '.$link.'
                        </div>
                    </div>
                </div>
            </div>';
        }
    }
}
$MNC['1003'] = new MNC1003();