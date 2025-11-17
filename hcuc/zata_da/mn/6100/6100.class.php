<?php
if(!class_exists('MNC6100')){
class MNC6100 extends INFOEXT{
    
    public function getOption($CON, $folder) {
        $disp = [0=>'',1=>'', 2=>'']; 

        $res_m = $this->getInfo($CON, $folder, ['fid', 'm' ]);

        while( $item_m = $res_m->fetch_object() ){

            $item = $this->itemInfo($item_m, $folder['dot']);
            $disp[0] .= '<div class="cus-drop" da-val="'.htmlspecialchars($item['title']).'">
                <div>'.$item['title'].'</div>
            </div>';

        }
        
        return empty($disp[0]) ? '<div class="cus-drop" da-val="">
            <div>No Options</div>
        </div>' : $disp[0];
    }
    public function jsonData($CON, $folder) {
        $disp = [0=>'',1=>'', 2=>'']; 
        $DATA = [];

        $res_f = $this->getInfo($CON, $folder, ['fid', 'm' ]); 

        while( $item_f = $res_f->fetch_object() ){ 
            $FOL = $this->itemInfo($item_f, $folder['dot']);   
            
            $res_m = $this->getInfo($CON, $FOL, ['fid', 'i', '1']);
            while( $item_m = $res_m->fetch_object() ){ 
                $item = $this->itemInfo($item_m, $folder['dot']); 

                $content = explode('=>', $item['content']);

                $data = [
                    'title'=>$item['title'],
                    'iframe'=>$item['iframe'],
                    'address'=>$content[0],
                    'id'=>$item['id']
                ];   

                array_push( $DATA, $data );
            }
        } 
        return json_encode($DATA, true);
    }



}
}
$MNC['6100'] = new MNC6100();