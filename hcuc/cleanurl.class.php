<?php
if(!class_exists('CURL')){
    class CURL {
        public function pregUrl($str, $reg){
            $str = preg_replace($reg, ' ', $str);
            $str = preg_replace('/\s+/', ' ', $str);
            $str = trim($str);
            $str = preg_replace('/ /', '-', $str);
            return $str;
        }
        public function findSprach($CON, $fid){
            $lang = false;
            
            $stmt = $CON->stmt_init();
            $stmt -> prepare("SELECT * FROM lists WHERE id=?;");
            $stmt -> bind_param('i', $fid);
            $stmt -> execute();
            $res = $stmt -> get_result();
            while($info = $res->fetch_object()) $lang = $info->list_lang; 
            return $lang;
        }
        public function titleToSprach($CON, $str){
            return strtoupper($this->pregUrl($str, '/[^A-Za-z0-9\-]/'));
        }
        public function makeCleanUrl($str){
            return strtolower($this->pregUrl($str, '/[^A-Za-z0-9\/\-]/'));
        }
        // Method to get the perimeter
        public function getCleanUrl($str, $id, $lang, $CON){

            $ttl = explode('=>', $str);

            $str = $ttl[0];
            
            $str = $this->pregUrl($str, '/[^A-Za-z0-9\-]/');
            $str = strtolower($str);
            
            $stmt = $CON->stmt_init();
            $stmt -> prepare("SELECT list_cleanurl FROM lists WHERE list_cleanurl=? AND list_lang=? AND NOT id=?;");
            $stmt -> bind_param('ssi', $str, $lang, $id);
            $stmt -> execute();
            $res = $stmt -> get_result();
            
            if(($res -> num_rows) != 0) {
                $i = 2;
                do {
                    $sN = $str.$i;
                    
                    $stmt = $CON->stmt_init();
                    $stmt -> prepare("SELECT list_cleanurl FROM lists WHERE list_cleanurl=? AND list_lang=? AND NOT id=?;");
                    $stmt -> bind_param('ssi', $sN, $lang, $id);
                    $stmt -> execute();
                    $res = $stmt -> get_result();
                    if($res -> num_rows == 0) return $sN; 
                    $i++;
                } while ($i > 0);
            }
            
            return $str;
        }
    }
}

$CURL = new CURL();