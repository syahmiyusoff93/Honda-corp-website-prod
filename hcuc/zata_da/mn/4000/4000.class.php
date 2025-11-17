<?php
if(!class_exists('MNC4000')){
class MNC4000 extends INFOEXT  {
    public function tabsData($CON, $folder) {
        $DATA = [];
        
        $res = $this->getInfo($CON,$folder,['fid','m']);
            
        while($item_m = $res->fetch_object()){
            $item = $this->itemInfo($item_m, $folder['dot']);
            $data = $this->tabInfo($CON, $item);

            array_push($DATA, ['title'=>$item['title'], 'info'=>$data]);
        }
        
        return json_encode($DATA, true); 
    }
    public function tabInfo($CON, $item) {
        $DATA = [];
        
        $res = $this->getInfo($CON,$item,['fid','i']);
            
        while($item_m = $res->fetch_object()){
            $item = $this->itemInfo($item_m, $item['dot']); 

            $DATA[] = ['title'=>$item['title'], 'info'=>$item['content']];
        }
        
        return $DATA; 
    }
}
}
$MNC['4000'] = new MNC4000();