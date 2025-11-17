<?php
if(!class_exists('MNC7102')){
    class MNC7102 extends INFOEXT{
        public function itemList($item) {
            $disp = [0=>'', 1=>''];
            
            return '<div class="itm">
                        <div class="wrap">
                            <div class="bimg-w">
                                <div class="bimg bg-contain" style="background-image: url('.$item['bgurl'].')"></div>
                            </div>
                            <div class="date">'.$this->toDate($item).'</div>
                            <div class="ttl">'.$item['title'].'</div>
                            <div class="txt ellipsis2">'.$this->get_words(strip_tags($item['content'])).'</div>
                            <template>
                                <h2>'.$item['title'].'</h2>
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <div class="wrap content-w">
                                        '.$item['content'].'
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p class="pimg"><img src="'.$item['bgurl'].'" alt=""></p>
                                    </div>
                                </div>
                                '.$this->gals($item).'
                            </template>
                        </div>
                    </div>';
            
        }
        public function get_words($sentence, $count = 30) {
          preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
          return $matches[0];
        }
        public function toDate($item, $format=''){
            $prio = $item['priority']; $prio = ($prio>0)?$prio:-$prio;
            $format = empty($format)?"j<\s\u\p>S</\s\u\p> M Y":$format;
            if($date = DateTime::createFromFormat('Ymd', $prio))
                return $day = date_format($date,"$format");
            return '';
        }
    }
}
$MNC['7102'] = new MNC7102();