<?php
if(!class_exists('base_url')){
    class base_url {
        public function query() {
            $que = $_SERVER['QUERY_STRING'];

            $queArr = explode('/', $que);
            $count = count($queArr);
            
            $dot = '';
            $countN = '';
            if($count > 2){
                $countN = $count - 2;
                for($i = $countN; $i > 0 ; $i--){ $dot .= '../'; }
            }
            $countN = empty($countN)?0:$countN;
            return array($dot, $countN);
        }
        
        public function host() { return HEIMPATH.'/'.$_SESSION['lang']; }
        
        public function tohome() {
            $link = HEIMPATH.'/'.$_SESSION['lang'].'/home';
            header('Location: '.$link);
            exit();
        }
    }
}
$base = new base_url;