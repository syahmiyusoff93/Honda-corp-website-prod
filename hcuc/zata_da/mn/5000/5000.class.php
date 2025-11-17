<?php
if(!class_exists('MNC5000')){
    class MNC5000 {
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
        public function dealerlist($CON, $folder) {
            $disp = [0=>'', 1=>''];
            $DATA = [];
            $tmp = '';
            
            $res = $CON->query("SELECT * FROM lists WHERE list_fid='40' AND list_trash IS NULL AND list_status='1';");
            while($info = $res->fetch_assoc()){ 
                $ID = $info['id'];

                $res_ = $CON->query("SELECT * FROM lists WHERE list_fid='$ID' AND list_status='1';");

                while($info_ = $res_->fetch_assoc()){ 
                    array_push($DATA, $info_['list_title']); 
                }
            }
            natsort($DATA);
            foreach($DATA as $ind=>$val){
                $tmp .= '<div class="cus-drop" da-val="'.htmlspecialchars($val).'">
                    <div>'.$val.'</div>
                </div>';
            }

            return $tmp;
        }
    }
}
$MNC['5000'] = new MNC5000();