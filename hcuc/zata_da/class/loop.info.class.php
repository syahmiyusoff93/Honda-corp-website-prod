<?php
if(!class_exists('INFO')){
    class INFO extends INFOEXT {
        
        public $core = '';
        
        public function frontEndPage($pid, $query, $htt, $comp, $dir, $CON) {
            $this->content($pid, $query, $htt, $comp, $dir, $CON, 'header');
            $this->content($pid, $query, $htt, $comp, $dir, $CON, 'body');
            $this->content($pid, $query, $htt, $comp, $dir, $CON, 'footer');
            return;
        }
        
        //CONTENT GENERATOR
        public function content ($pid, $query, $htt, $comp, $dir, $CON, $mod) {
            include "zata_da/class/loop.info.cell.class.php"; 
            
            $IND = $this->queryIdentifier($pid, $query, $htt, $comp, $dir, $CON, $mod); 
            $obCSS = $obHTML='';
            
            if($mod == 'body'){
                $res = $CON->query("SELECT * FROM lists WHERE id = '$pid' AND list_type = 'm' AND list_lang = '$_SESSION[lang]';");
                if($res->num_rows > 0) {
                    $row = $res->fetch_assoc();
                    $module = $row['list_module']; 
                    if(file_exists("zata_da/mn/$module/$module.group.json")){
                        $JSON = file_get_contents("zata_da/mn/$module/$module.group.json");
                        $JSON = json_decode($JSON,true);
                        if(isset($JSON['pagemode'])) { 
                            $IND['query'] = "SELECT * FROM lists WHERE id = '$pid' AND list_type = 'm' AND list_status = '1' AND list_lang = '$_SESSION[lang]';"; 
                        }
                    }
                }
            }
            
            $PRIV = 0;

            if( !empty($IND['query']) ){
                $res = $CON->query($IND['query']); 
                
                while($info = $res->fetch_object()){
                    
                    $folder = $this->folderInfo($info, $htt[0]);
                    $MAIN = $this->mainMsg($folder); 
                    if(file_exists("zata_da/mn/$folder[module]/$folder[module].class.php"))
                        include "zata_da/mn/$folder[module]/$folder[module].class.php"; 
                    if(file_exists("zata_da/mn/$folder[module]/$folder[module].css.php"))
                        include_once 'zata_da/mn/'.$folder['module'].'/'.$folder['module'].'.css.php'; 
                    if(isset($_SESSION['user'])) 
                        echo $this->editOption($folder, ['dot'=>$htt[0], 'web'=>$IND['web']]);
                    include 'zata_da/mn/'.$folder['module'].'/'.$folder['module'].'.php.php'; 
                    
                } 
            } 
        }
        
        public function queryIdentifier($pid, $query, $htt, $comp, $dir, $CON, $mod){
            $q = $WEB = ''; 
            
            if($mod == 'footer'){
                $WEB = '-1'; 

                $res = $CON->query("SELECT * FROM lists WHERE list_fid = '-1' AND list_status='1' AND list_type='f' AND list_lang = '$_SESSION[lang]' ORDER BY list_priority LIMIT 1;");
                while($info = $res->fetch_object()){
                    $fid = $info->id;
                    $q = "SELECT * FROM lists WHERE list_fid = '$fid' AND list_status='1' AND list_type='m' AND list_lang = '$_SESSION[lang]' ORDER BY list_priority;"; 
                } 
                echo '<div style="margin-top:auto;width:100%"></div>';
            }elseif($mod == 'header'){
                $WEB = '-2'; 

                $res = $CON->query("SELECT * FROM lists WHERE list_fid = '-2' AND list_status='1' AND list_type='f' AND list_lang = '$_SESSION[lang]' ORDER BY list_priority LIMIT 1;");
                while($info = $res->fetch_object()){
                    $fid = $info->id;
                    $q = "SELECT * FROM lists WHERE list_fid = '$fid' AND list_status='1' AND list_type='m' AND list_lang = '$_SESSION[lang]' ORDER BY list_priority;"; 
                }  
            }elseif($mod == 'body'){
                $WEB = '0';
                if(in_array($dir['pmn'], PgBeMod) || in_array($dir['pmn'], PgBeCus)) 
                    $q = "SELECT * FROM lists WHERE id = '$pid' AND list_lang = '$_SESSION[lang]';";
                else 
                    $q = "SELECT * FROM lists WHERE list_fid = '$pid' AND list_type = 'm' AND list_status = '1' AND list_lang = '$_SESSION[lang]' ORDER BY list_priority;"; 
            }
            
            return ['query'=>$q, 'web'=>$WEB];
        }
        
        public function editOption($folder,$D){
             return '<div class="wrap editOption-w editOption'.$folder['module'].'"><div class="editOption"><a target="_blank" href="'.$D['dot'].'e_cms/?uid='.$folder['id'].'&web='.$D['web'].'">Edit</a></div></div>';
        }
    }
}
$info = new INFO;