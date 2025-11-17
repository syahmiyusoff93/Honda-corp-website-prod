<?php
if(!class_exists('MNC7104')) {
    class MNC7104 extends INFOEXT{
        public function sharer($pid, $folder){
            
            $url = urlencode(HEIMPATH."/article.php?pid=$pid");
            
            $facebook = '<div class="scon"><a href="https://www.facebook.com/sharer.php?u='.$url.'" target="_blank"><div class="bimg-w"><div class="bimg bg-contain" style="background-image: url('.$folder['dot'].'/zata_da/src/default/shr-facebook.png)"></div></div></a></div>';
            
            $twitter = '<div class="scon"><a href="https://twitter.com/intent/tweet?url='.$url.'" target="_blank"><div class="bimg-w"><div class="bimg bg-contain" style="background-image: url('.$folder['dot'].'/zata_da/src/default/shr-twitter.png)"></div></div></a></div>';
            
            $linkedin = '<div class="scon"><a href="https://www.linkedin.com/shareArticle?mini=true&url='.$url.'" target="_blank"><div class="bimg-w"><div class="bimg bg-contain" style="background-image: url('.$folder['dot'].'/zata_da/src/default/shr-linkedin.png)"></div></div></a></div>';
            
            //$whatsapp = '<div class="scon"><a href="https://api.whatsapp.com/send?text='.$url.'" target="_blank"><div class="bimg-w"><div class="bimg" style="-webkit-mask-image: url('.$folder['dot'].'/zata_da/src/default/i-whatsapp.png); mask-image: url('.$folder['dot'].'/zata_da/src/default/i-whatsapp.png)"></div></div></a></div>';
            
            return '<div class="med">
                <div class="f f-a-c f-j-c">
                    <div class="medttl">Share <img src="'.$folder['dot'].'zata_da/src/default/shr-con.png" /></div>
                    <div class="f">'.$facebook.$twitter.$linkedin.' </div>
                </div>
            </div>';
        }
        
        public function item($item) {
            $disp = [0=>'']; 
            
            $ttl = explode('=>',$item['title']);
            $ttl[0] = empty( $ttl[0] )?'':'<div class="ttl">'.$ttl[0].'</div>';
            $ttl[1] = empty( $ttl[1] )?'':'<div class="num">'.$ttl[1].'</div>';
            
            $temp = '<div class="wrap">
                <div class="bimg-w">
                    <div class="bimg bg-cover" da-bgsrc="'.$item['bgurl'].'"></div>
                </div>
            </div>
            <div class="wrap">
                <div class="ttl">
                    '.$ttl[1].$ttl[0].'
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
$MNC['7104'] = new MNC7104();