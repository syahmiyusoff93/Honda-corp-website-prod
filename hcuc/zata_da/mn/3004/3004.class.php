<?php
if(!class_exists('MNC3004')){
    class MNC3004 {
        public function getItemFids($CON, $id){
            //check if id is i level
            $ids = [];
                
            $q="SELECT * FROM lists WHERE list_fid='$id';";
            $res = $CON->query($q);
            while($item = $res->fetch_object()){
                if($item->list_type=='m')
                    array_push($ids, $item->id);
            }
            
            return $ids;
            
            //if it's i level, return its parent id
        }
        public function itemList($info) {
            $disp = [0=>'', 1=>''];
            
            $info['title'] = explode('=>',$info['title']);
            $info['title'][1] = empty($info['title'][1])?'':$info['title'][1];
            $disp[0] = '<div class="wrap">
                <div class="bimg-w"><div class="bimg bg-cover" style="background-image: url('.$info['bgurl'].')">
                    <div class="bottom">
                        <div class="ttl">'.$info['title'][0].'</div>
                        <div class="desc">'.$info['title'][1].'</div>
                    </div>
                </div></div>
            </div>';
            
            $disp[1] .= '<h2>'.$info['title'][0].'</h2>
                        <div class="desc">'.$info['title'][1].'</div>';
            $btnClose = '<a class="btn-gen ccl">Close</a>';
            $disp[1]= empty(strip_tags($info['content']))?
                $disp[1].$btnClose
                : '<div class="col-lg-7">' .$disp[1].'<div class="cont wrap">'.$info['content'].'</div>'.$btnClose. '</div>';
            
            $info['bgurl']=empty($info['content'])?
                '<div class="col-lg-12"><p style="text-align:center;"><img src="'.$info['bgurl'].'" alt=""></p></div>'
                :'<div class="col-lg-5"><p><img src="'.$info['bgurl'].'" alt=""></p></div>';
            
            $temp = '<div class="row">'.$info['bgurl'].$disp[1].'</div>';
            
            $disp[0] = '<div class="f">'.$disp[0].'<template>'.$temp.'</template></div>';
            
            return '<div class="item">'.$disp[0].'</div>';
        }
    }
}
$MNC['3004'] = new MNC3004;