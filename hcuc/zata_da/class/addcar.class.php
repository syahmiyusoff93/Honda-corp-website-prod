<?php
if(!class_exists('ADDCAR')){
    class ADDCAR {
        public function generateID() { 
            return date("ymd").'.'.base_convert(uniqid('', true),10,30);
        }
        
        public function uploadimg($file, $LOC) {
            $fileN = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileS = $file['size'];
            $fileE = $file['error'];
            $fileTyp = $file['type'];
        
            $getExt = explode('.', $fileN);
            $fileExt = strtolower(end($getExt));
         
            $newName = $this->generateID().'.'.$fileExt;
            $dest = "$LOC/$newName";
            move_uploaded_file($fileTmp, $dest);
        
            return $newName;
        } 
        public function uploadimgBulk($file, $LOC, $i) {
            $fileN = $file['name'][$i];
            $fileTmp = $file['tmp_name'][$i];
            $fileS = $file['size'][$i];
            $fileE = $file['error'][$i];
            $fileTyp = $file['type'][$i];
        
            $getExt = explode('.', $fileN);
            $fileExt = strtolower(end($getExt));
         
            $newName = $this->generateID().'.'.$fileExt;
            $dest = "$LOC/$newName";
            move_uploaded_file($fileTmp, $dest);
        
            return $newName;
        } 
    }
}
$ADDCAR = new ADDCAR();