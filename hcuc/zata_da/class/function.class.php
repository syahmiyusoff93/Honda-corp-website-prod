<?php
if(!class_exists('LINTING')){
class LINTING {
    public function JSCS($names, $ext, $mtrand, $path) { 
        $ext_ = ($mtrand == 0)?'.'.$ext:'.'.$ext.'?'.mt_rand();
        
        if($ext == 'css'){
            foreach($names as $key => $val){
                echo '<link href="'.$path.$val.$ext_.'" rel="stylesheet" type="text/css">';
            }
        }elseif($ext == 'js'){
            foreach($names as $key => $val){
                echo '<script src="'.$path.$val.$ext_.'" type="text/javascript"></script>';
            }
        } 
    }
}
}
$LISTING = new LINTING();