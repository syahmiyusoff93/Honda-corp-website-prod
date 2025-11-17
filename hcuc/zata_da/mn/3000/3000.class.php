<?php
if(!class_exists('MNC3000')){
    class MNC3000 extends INFOEXT{
        public function itemsList($CON, $item) {
            $disp = [0=>''];
            $template = $class = '';
            $link = empty($item['link']['redir'])?'':explode('=>',$item['link']['redir']);
            
            if( !empty($item['iframe']) ){
                $class = 'videoitem';
                $template = '<template>'.$item['iframe'].'</template>';
            }else{
                if(empty($link[1])){
                    $link=empty($link[0])?'':'<div class="taste"><a href="'.str_replace(' ','',$link[0]).'" class="btn-gen">Read More</a></div>';
                }else{
                    $link=empty($item['link']['redir'])?'':'<div class="taste"><a href="'.str_replace(' ','',$link[1]).'" class="btn-gen">'.$link[0].'</a></div>';
                }
            }
             
            $item['title']=empty(strip_tags($item['title']))?'':'<div class="ttl"><span>'.$item['title'].'</span></div>';
            
            $item['content']=empty(strip_tags($item['content']))?'':'<div class="desc"><div>'.$item['content'].'</div></div>';

            $item['bildurl']=empty($item['bildurl'])?'':'<img src="'.$item['bildurl'].'" alt="">';
            
            return '<div class="item bg-cover '.$class.'" da-bgsrc="'.$item['bgurl'].'">
                <div class="f f-j-c f-a-c itemrow">
                    <div class="wrap">
                        <div class="f  f-j-c f-a-c">
                            <div class="container animen">
                                ' . $item['title'] . $item['content'] . $link . $template . '
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }
}
$MNC['3000'] = new MNC3000();