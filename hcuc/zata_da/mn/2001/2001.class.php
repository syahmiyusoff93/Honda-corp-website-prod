<?php
if(!class_exists('MNC2001')) {
class MNC2001 extends INFOEXT{
    public function linken($item) { 
        $disp = [''];  
        
        return '<div class="taste"><div>
        <a class="btn-gen btn-main"> '.$item['title'].' <template>'.strip_tags($item['content']).'</template></a>
        
        </div></div>'; 
    } 
    public function mitteln($item) { 
        $disp = ['']; $img = '';
        
        if(!empty($item['bgurl'])) $img = '<img src="'.$item['bgurl'].'">';
        
        return ' <div class="itm itm-mitteln">'.$img.'</div> '; 
    }
    public function rechten($item) { 
        $disp = ['']; $btn = '';
        
        if($item['link']['redir']) $btn .= '<div>'.$this->button($item['link']['redir'], 'btn-gen').'</div>';
        
        return '<div class="taste wrap taste-drei">
        <a class="btn-gen"> '.$item['title'].' 
        <template>'.strip_tags($item['content']).'</template>
        </a>
        </div>'; 
    }
}
}
$MNC['2001'] = new MNC2001();