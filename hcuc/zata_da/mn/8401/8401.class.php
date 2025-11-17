<?php
if(!class_exists('MNC8401')) {
    class MNC8401 extends INFOEXT{
        public function redLink($info) { 
            $link = $target = '';

            if( $info['link']['redir'] ){
                $link = $info['link']['redir'];
            }
            if( !empty($info['iframe']) )
                $target = 'target="_blank"';

            return '<div class="a-w"><a href="'.$link.'" '.$target.'>'.$info['title'].'</a></div>';
        }
        public function contactlist($item) { 
            $ttl = empty($item['title']) ? '' : '<div class="ttl">'.$item['title'].'</div>';

            return '<div class="contact">
                <div class="f">
                    <div class="l">
                        <div class="bimg-w">
                            <div class="bimg bg-contain" style="background-image: url('.$item['bgurl'].')"></div>
                        </div>
                    </div>
                    <div class="r">'.$ttl.$item['content'].'</div>
                </div>
            </div>';
        }
        public function media($item) {  
            return '<div class="scon">
                <a href="'.$item['link']['redir'].'" target="_blank">
                    <div class="bimg-w">
                        <div class="bimg" style="-webkit-mask-image: url('.$item['bgurl'].'); mask-image: url('.$item['bgurl'].')"></div>
                    </div>
                </a>
            </div>'; 
        } 
    }
}
$MNC['8401'] = new MNC8401();