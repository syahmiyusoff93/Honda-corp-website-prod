<?php
if(!class_exists('INFOEXT')){
    class INFOEXT {
        public function mmbInfo ($R, $dot) {
            $d = [];
            $d['id'] = empty($R->id)?'':$R->id;
            $d['name'] = empty($R->mmb_name)?'':$R->mmb_name;
            $d['email'] = empty($R->mmb_email)?'':$R->mmb_email;
            $d['cart'] = empty($R->mmb_cart)?[]:json_decode($R->mmb_cart, true);
            $d['info'] = empty($R->mmb_info)?[]:json_decode($R->mmb_info, true);
            $d['joinDate'] = empty($R->mmb_createdDate)?'':$R->mmb_createdDate;
            $d['dot'] = $dot;
            
            return $d;
        }
        
        public function invInfo ($R, $dot) {
            $d = [];
            $d['id'] = empty($R->id)?'':$R->id;
            $d['name'] = empty($R->inv_name)?'':$R->inv_name;
            $d['type'] = empty($R->inv_type)?'':$R->inv_type;
            $d['bild'] = empty($R->inv_bildurl)?0:$R->inv_bildurl;
            $d['fid'] = empty($R->inv_fid)?'':$R->inv_fid;
            $d['sku'] = empty($R->inv_sku)?'':$R->inv_sku;
            $d['ssku'] = empty($R->inv_ssku)?'missing id':$R->inv_ssku;
            $d['quan'] = empty($R->inv_quan)?'':$R->inv_quan;
            $d['var'] = empty($R->inv_var)?'':$R->inv_var;
            $d['subcat'] = empty($R->inv_subcat)?0:$R->inv_subcat;
            $d['price'] = empty($R->inv_price)?'0.00':$R->inv_price;
            $d['priceDisc'] = empty($R->inv_priceDisc)?'0.00':$R->inv_priceDisc;
            $d['disc'] = empty($R->inv_disc)?'':$R->inv_disc;
            $d['prio'] = empty($R->inv_priority)?0:$R->inv_priority;
            $d['trash'] = empty($R->inv_trash)?'':$R->inv_trash;
            $d['cont'] = empty($R->inv_content)?'':$R->inv_content;
            $d['stat'] = empty($R->inv_status)?0:$R->inv_status;
            $d['iframe'] = empty($R->inv_iframe)?'':$R->inv_iframe;
            $d['info'] = empty($R->inv_info)?'':$R->inv_info;
            $d['media'] = empty($R->inv_media)?[]:json_decode($R->inv_media, true);
            $d['dot'] = $dot;
            
            $d['bildurl'] = (empty($d['bild'])) ? '' : ($dot.'zata_da/src/inventory/'.$d['bild']);
            
            return $d;
        }
        
        //FOLDER INFO GENERATOR
        public function folderInfo ($R, $dot) {
            $d = [];
            $d['id'] = empty($R->id)?'':$R->id;
            $d['fid'] = empty($R->list_fid)?'':$R->list_fid;
            $d['type'] = empty($R->list_type)?'':$R->list_type;
            $d['module'] = empty($R->list_module)?'':$R->list_module;
            $d['title'] = empty($R->list_title)?'':$R->list_title;
            $d['cleanurl'] = empty($R->list_cleanurl)?'':$R->list_cleanurl;
            $d['sync'] = empty($R->list_link)?[]:json_decode($R->list_link, true);
            $d['smr'] = empty($R->list_content)?'':$R->list_content;
            $d['genttl'] = empty($R->list_iframe)?'':$R->list_iframe;
            $d['priority'] = empty($R->list_priority)?'':$R->list_priority;
            $d['bg'] = empty($R->list_bgurl)?'':$R->list_bgurl;
            $d['bild'] = empty($R->list_bildurl)?'':$R->list_bildurl;
            $d['dot'] = $dot;
            
            $d['bgurl'] = ''; $d['bgthb'] = ''; $d['bgsml'] = ''; $d['bgimgthb']=''; $d['bgimgsml']=''; $d['bgimg']="";
            $d['bildurl'] = ''; $d['bildthb'] = ''; $d['bildsml'] = ''; $d['bildimgthb']=''; $d['bildimgsml']=''; $d['bildimg']="";
            
            if(!empty($d['bg'])){ 
                list($d['bgurl'], $d['bgthb'], $d['bgsml'], $d['bgimgthb'], $d['bgimgsml'], $d['bgimg']) = $this->imgTag($d['bg'], $dot);
            }
            if(!empty($d['bild'])){ 
                list($d['bildurl'], $d['bildthb'], $d['bildsml'], $d['bildimgthb'], $d['bildimgsml'], $d['bildimg']) = $this->imgTag($d['bild'], $dot);
            }
            
            if(!isset($d['sync']['redir'])) $d['sync']['redir'] = false;
            
            return $d;
        }
        public function imgTag($name, $dot) {
            $loc = [0=>'zata_da/src/img/'.$name,
                   1=>'zata_da/src/img/thumb/'.$name,
                   2=>'zata_da/src/img/small/'.$name];
            $pathDef = $dot.'zata_da/src/default/';
            $type = [IMAGETYPE_JPEG, IMAGETYPE_GIF, IMAGETYPE_PNG];
            
            foreach($loc as $key => $path){
                if(file_exists($path)){
                    list($img['width'], $img['height'], $img['type'], $img['attr']) = getimagesize($path);
                    $D[5] = '<img src="'.$pathDef.'empty.png" da-imgsrc="'.$dot.$loc[0].'" '.$img['attr'].'/>';
                    if(in_array($img['type'], $type)){
                        $D[$key] = $dot.$path;
                        $D[$key+2] = '<img src="'.$pathDef.'empty.png" da-imgsrc="'.$D[$key].'" '.$img['attr'].'/>';
                    }else{
                        $D[$key] = $dot.$loc[0];
                        $D[$key+2] = '<img src="'.$pathDef.'empty.png" da-imgsrc="'.$D[$key].'" '.$img['attr'].'/>';
                    }
                }else{
                    $D[$key] = $dot.$loc[0];
                    $D[$key+2] = '<img src="'.$pathDef.'empty.png" da-imgsrc="'.$D[$key].'" />';
                }
            }
            
            if(file_exists($loc[0])){
                list($img['width'], $img['height'], $img['type'], $img['attr']) = getimagesize($loc[0]);
                $D[5] = '<img src="'.$pathDef.'empty.png" da-imgsrc="'.$dot.$loc[0].'" '.$img['attr'].'/>';
            }
            return $D;
        }
        //ITEM INFO GENERATOR
        public function itemInfo ($R, $dot) {
            $d = [];
            $d['id'] = empty($R->id)?'':$R->id;
            $d['fid'] = empty($R->list_fid)?'':$R->list_fid;
            $d['type'] = empty($R->list_type)?'':$R->list_type;
            $d['module'] = empty($R->list_module)?0:$R->list_module;
            $d['title'] = empty($R->list_title)?'':$R->list_title;
            $d['content'] = empty($R->list_content)?'': $R->list_content;
            $d['link'] = empty($R->list_link)?[]:json_decode($R->list_link, true);
            $d['media'] = empty($R->list_media)?[]:json_decode($R->list_media, true);
            $d['iframe'] = empty($R->list_iframe)?'':$R->list_iframe;
            $d['priority'] = empty($R->list_priority)?'':$R->list_priority;
            $d['bg'] = empty($R->list_bgurl)?'':$R->list_bgurl;
            $d['bild'] = empty($R->list_bildurl)?'':$R->list_bildurl;
            $d['doc'] = empty($R->list_doc)?'':$R->list_doc.'#';
            $d['docurl'] = (empty($d['doc'])) ? '' : ($dot.'zata_da/src/doc/'.$d['doc']);
            $d['dot'] = $dot;
            
            $d['bgurl'] = ''; $d['bgthb'] = ''; $d['bgsml'] = ''; $d['bgimgthb']=''; $d['bgimgsml']=''; $d['bgimg']="";
            $d['bildurl'] = ''; $d['bildthb'] = ''; $d['bildsml'] = ''; $d['bildimgthb']=''; $d['bildimgsml']=''; $d['bildimg']="";
            
            if(!empty($d['bg'])){ 
                list($d['bgurl'], $d['bgthb'], $d['bgsml'], $d['bgimgthb'], $d['bgimgsml'] ) = $this->imgTag($d['bg'], $dot);
            }
            if(!empty($d['bild'])){ 
                list($d['bildurl'], $d['bildthb'], $d['bildsml'], $d['bildimgthb'], $d['bildimgsml'] ) = $this->imgTag($d['bild'], $dot);
            }
            
            //===============================
            if(substr($d['title'], 0,1) == "[" && substr( $d['title'],-1) == "]") $d['title'] = '';
            
            if(!isset($d['link']['redir'])) $d['link']['redir'] = false;
            
            return $d;
            
        }
        public function moduleScript($folder){
            $link = "zata_da/mn/$folder[module]/$folder[module].js";
            if(file_exists($link)) return "<script src='$folder[dot]$link' type='text/javascript'></script>";
            else return '';
        }
        public function min_html($input) {
           $Search = array(
            '/(\n|^)(\x20+|\t)/',
            '/(\n|^)\/\/(.*?)(\n|$)/',
            '/\n/',
            '/\<\!--.*?-->/',
            '/(\x20+|\t)/', # Delete multispace (Without \n)
            '/\>\s+\</', # strip whitespaces between tags
            '/(\"|\')\s+\>/', # strip whitespaces between quotation ("') and end tags
            '/=\s+(\"|\')/'); # strip whitespaces between = "'

           $Replace = array(
            "\n",
            "\n",
            " ",
            "",
            " ",
            "><",
            "$1>",
            "=$1");

            $input = preg_replace($Search,$Replace,$input);
            return $input;
        }
        public function mediaImages($item){
            $disp = [0=>[]];
            $fol = ceil($item['id']/10);
            $fol = $item['dot'].'zata_da/src/contentmedia/'.$fol.'/';
            
            foreach($item['media'] as $k => $v) {
                if(preg_match('/image/', $v['type']))
                    array_push($disp[0], $fol.$v['name']);
            }
            return json_encode($disp[0],true);
        }
        public function gals($item){
            $gals = '';
            $fol = $this -> mediaPath($item);
            foreach($item['media'] as $k => $v) {
                if(preg_match('/image/', $v['type']))
                    $ttl = isset($v['title']) ? htmlspecialchars($v['title']) : '';
                    
                    $gals.= '<div class="gal">
                        <div class="wrap">
                            <div class="bimg-w">
                                <div class="bimg bg-contain" galsttl="'.$ttl.'" style="background-image: url('.$fol.$v['name'].')"></div>
                            </div>
                        </div>
                    </div>';
            }
            if(!empty($gals)) $gals = '<div class="wrap gals-w"><div class="gals f">'.$gals.'</div></div>';
            
            return $gals;
        }

        public function button($link, $class='', $blank = '', $str = 'View Details'){
            $links = explode('=>', $link);

            if(!empty($blank)) $blank = 'target="_blank"'; 

            if(isset($links[1]))
                return '<a class="'.$class.'" '.$blank.'  href="'.$links[1].'">'.$links[0].'</a>';
            else
                return '<a class="'.$class.'" '.$blank.' href="'.$link.'">'.$str.'</a>';
        }
        public function getInfo($CON, $folder, $D){
            //$D = ['uid/fid', 'i/m', 'module','limit'];
            $id = ($D[0] == 'fid')?"list_fid='$folder[id]'":"id='$folder[id]'";
            $typ = ($D[1] == 'i')?TIS1sql.OBLPsql:TMS1sql.OBLPsql;
            $mod = empty($D[2])?'':"AND list_module='$D[2]'";
            $lim = empty($D[3])?'':"LIMIT $D[3]";
            
            return $CON->query("SELECT * FROM lists WHERE $id $mod AND list_trash IS NULL AND $typ $lim;");
        }
        public function mainMsg($D){
            $ttl = explode('=>', $D['genttl']);

            if( isset($ttl[1]) ){
                $ttl[0] = empty($ttl[0])?'':'<h2 class="cus">'.$ttl[0].'</h2>';
                $ttl[1] = '<div class="reddyttl">'.$ttl[1].'</div>';

                $D['title'] = $ttl[0].$ttl[1];
            }else{
                $D['title'] = empty($D['genttl'])?'':'<h2 class="cus">'.$D['genttl'].'</h2>';
            } 
            
            $D['smr'] = empty($D['smr'])?'':'<div class="smr cus">'.$D['smr'].'</div>';
             
            return ["title"=>$D['title'],"smr"=>$D['smr']];
        }
        public function ttlCutting($D){
            $ttl = explode('=>', $D['title']);

            if( isset($ttl[1]) ){
                $ttl[0] = empty($ttl[0])?'':'<h2>'.$ttl[0].'</h2>';
                $ttl[1] = '<div class="reddyttl">'.$ttl[1].'</div>';

                $D['title'] = $ttl[0].$ttl[1];
            }else{
                $D['title'] = empty($D['title'])?'':'<h2>'.$D['title'].'</h2>';
            }  
             
            return $D['title'];
        }

        public function specialTtl($D) {
            $ttl = explode('=>',$D['genttl']);
            $ttl[0] = empty($ttl[0])?'':'<h2>'.$ttl[0].'</h2>';
            $ttl[1] = empty($ttl[1])?'':$ttl[1];
            
            $h2sub = '';
            if(!empty($ttl[1]))
                $h2sub = '<div class="h2sup">'.$ttl[1].'</div>';
            
            if(!empty($D['smr']))
                $D['smr'] = '<div class="r"> <div class="wrap">'.$D['smr'].'</div> </div>';
            
            if( !empty($h2sub) || !empty($ttl[0]) ){
            return '<div class="specialttl">
                <div class="f f-a-c">
                    <div class="l">
                        <div class="wrap">
                            '.$h2sub.$ttl[0].' 
                        </div>
                    </div>
                    '.$D['smr'].'
                </div>
            </div>';
            }
            return false;
        }
        public function splitTtl($D){
            $ttl = explode('=>', $D['title']);
            $ttl[0] = empty($ttl[0])?'':$ttl[0];
            $ttl[1] = empty($ttl[1])?'':$ttl[1];
            return $ttl;
        }
        public function mediaPath($D){
            $fol = ceil($D['id']/10);
            return $D['dot'].'zata_da/src/contentmedia/'.$fol.'/';
        }
        public function toDate($D, $format){
            $prio = $D['priority']; $prio = ($prio>0)?$prio:-$prio;
            $format = empty($format)?"j<\s\u\p>S</\s\u\p> M Y":$format;
            if($date = DateTime::createFromFormat('Ymd', $prio))
                return $day = date_format($date,"$format");
            return false;
        }
        public function floatString($val){
            $val = str_replace(",","",$val); 
            return floatval($val);
        }
        public function buttonTxtTrans($str){
            $LANG = 'EN';
            $TXT = [
                'Back to Top'=>[
                    'BM'=>'Kembali ke Atas'
                ],
                'Contact Us'=>[
                    'BM'=>'Hubungi Kami'
                ],
                'Recommended Products'=>[
                    'BM'=>'Produk Disyorkan'
                ],
                'Products Preview'=>[
                    'BM'=>'Ulasan Produk'
                ],
                'Video Guide'=>[
                    'BM'=>'Panduan Video'
                ],
                'Scroll Down'=>[
                    'BM'=>'Tatal Ke Bawah'
                ],
                'How to Use'=>[
                    'BM'=>'Cara Penggunaan'
                ],
                'Usage'=>[
                    'BM'=>'Pengunaan' 
                ],
                'Products Ingredient'=>[
                    'BM'=>'Kandungan Utama Dan Kebaikannya' 
                ] 
            ];

            if( isset($_SESSION['lang']) )  $LANG = $_SESSION['lang']; 
            if( isset($TXT[$str][$LANG]) ) return $TXT[$str][$LANG];

            return $str;
        }
        public function database($CON, $folder = '', $json = false) {   
            $DATA = [];

            if( isset($_GET['carid']) ){
                $ID = $_GET['carid'];

                $stmt = $CON->stmt_init();
                $stmt -> prepare("SELECT * FROM car WHERE id=?;");
                $stmt -> bind_param('i', $ID);
                $stmt -> execute();
                $res = $stmt->get_result();
    
                while($info = $res->fetch_assoc()){
                    $info['_price'] = $this->floatString($info['_price']);   
                    $info['_mileage'] = $this->floatString($info['_mileage']); 
                    $info['_manufacturingYr'] = $this->floatString($info['_manufacturingYr']); 

                    if( $content = $this->dealerInfo($CON, $info) ){
                        
                        $info['address'] = $content[0];
                        $info['companyname'] = $content['companyname'];
                        $info['companyimg'] = $content['companyimg'];

                        if( isset($content[1]) ){
                            $info['time'] = $content[1];
                        }
                    }

                    array_push($DATA, $info);
                }
            }  
            
            return json_encode($DATA, true);  
        }
        public function dealerInfo($CON, $INFO = '' ) {   
            $DATA = []; 

            if( isset($INFO['_location']) && !empty($INFO['_location']) ) {
                $ID = $INFO['_location'];

                $stmt = $CON->stmt_init();
                $stmt -> prepare("SELECT * FROM lists WHERE id=?;");
                $stmt -> bind_param('i', $ID);
                $stmt -> execute();
                $res = $stmt->get_result();

                while($info = $res->fetch_assoc()){

                    $content = explode('=>', $info['list_content']); 
                    $content['companyname'] = $info['list_title']; 
                    $content['companyimg'] = $info['list_bgurl']; 

                } 

                if( isset($content) ) { 
                    return $content;
                }else{
                    return false;
                }

                
            }else{
                return false;
            }
 
            
        } 
        public function jsonCar($CON, $folder) {   
            $JSON = 'zata_da/json/car.json';
            $JSON = file_get_contents($JSON);
            $JSON = json_decode($JSON, true); 

            return json_encode($JSON['variance'], true);
        } 
    }
}

$INFOEXT = new INFOEXT();