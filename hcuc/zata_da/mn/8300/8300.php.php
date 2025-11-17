<?php
if(!class_exists('DIR')){
    class DIR {
        public function pathInd($CON, $ID){
            $q = "SELECT * FROM lists WHERE id = '".$ID."';";
            $res = $CON->query($q);
            $path = '';
            while ($info = $res->fetch_object()){
                $id = $info->id; $fid = $info->list_fid; 
                $path = empty($info->list_title)?'<span dir-uid="'.$id.'" dir-umn="'.$info->list_module.'">No Title ['.$id.']</span>':'<span dir-uid="'.$id.'" dir-umn="'.$info->list_module.'">'.strip_tags($info->list_title).'</span>'; 

                do {
                    if($fid == 1){ break; }elseif($fid > 0){
                        $q = "SELECT * FROM lists WHERE id = '$fid';";
                        $res = $CON->query($q);
                        while ($info = $res->fetch_object()){
                            $id = $info->id;
                            
                            if($info->list_type=='i'){
                                $title = empty($info->list_title)?'No Title ['.$id.'] > ':strip_tags($info->list_title).' > ';
                            }else{
                                $title = empty($info->list_title)?'<span dir-uid="'.$id.'" dir-umn="'.$info->list_module.'">No Title ['.$id.']</span> >':'<span dir-uid="'.$id.'" dir-umn="'.$info->list_module.'">'.strip_tags($info->list_title).'</span> > ';
                            }
                            
                            $path = $title.$path;
                            $fid = $info->list_fid;
                        }
                    }
                }while ($fid > 0); 
            } return empty($path)?'':$path;
        }
    }
}
$DIR = new DIR;
echo '<div mn="'.$folder['module'].'" style="background-image: url('.$folder['bgurl'].')" da-id="'.$folder['id'].'" class="">
    <div class="container">
    '.$DIR->pathInd($CON, $folder['fid']).'
    </div>
</div>';
