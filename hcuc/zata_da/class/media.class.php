<?php
if(!class_exists('MEDIA')){
    class MEDIA {
        public function uploadimg($file, $loc) {
            $fileN = $file['name'];
            $fileTmp = $file['tmp_name'];
            $fileS = $file['size'];
            $fileE = $file['error'];
            $fileTyp = $file['type'];

            $getExt = explode('.', $fileN);
            $fileExt = strtolower(end($getExt));

            //$newN = date("ymdhis").'.'.base_convert(uniqid('', true),10,30).'.'.$fileExt;
            $newN = date("ymd").'.'.base_convert(uniqid('', true),10,30).'.'.$fileExt;
            $dest = $loc . $newN;
            move_uploaded_file($fileTmp, $dest);

            return $newN;
        }
        
        public function resize($src, $srcN, $percent) {
            list($w, $h) = getimagesize($src);
            if($w>2000 | $h>2000){
                $wn =$w * $percent;
                $hn =$h * $percent;
            }else{
                $wn =$w;
                $hn =$h;
            }
            
            $imgN=imagecreatetruecolor($wn,$hn);
            imagecopyresampled($imgN,$srcN,0,0,0,0,$wn,$hn,$w,$h);
            
            return $imgN;
        }
        
        public function imgResize($src, $percent){
            $prop = getimagesize($src);
            $imageType = $prop[2];
            switch ($imageType) {
                case IMAGETYPE_PNG:
                    $srcN = imagecreatefrompng($src);
                    $imgN = $this->resize($src, $srcN, $percent);
                    imagepng($imgN,$src);
                    break;           

                case IMAGETYPE_JPEG:
                    $srcN = imagecreatefromjpeg($src);
                    $imgN = $this->resize($src, $srcN, $percent);
                    imagejpeg($imgN,$src);
                    break;

                case IMAGETYPE_GIF:
                    $srcN = imagecreatefromgif($src);
                    $imgN = $this->resize($src, $srcN, $percent);
                    imagegif($imgN,$src);
                    break;

                default:
                    break;
            }
        }
    }
}

$MEDIA = new MEDIA();