<?php
if(!class_exists('MNC7003')){
class MNC7003 extends INFOEXT {
    public function itemsList($CON, $INFO, $DOT) {
        $disp = [0=>''];
        $q="SELECT * FROM lists
            WHERE list_fid='$INFO[id]' AND ".TIS1sql.OBLPsql.";";
        $res = $CON->query($q);
        $count = $res->num_rows;

        $i=0;
        while($item = $res->fetch_object()){
            if($i<3){
                $disp[0] .= '<div class="bimg bg-cover" style="background-image: url('.$DOT.'zata_da/src/img/'.$item->list_bgurl.')"></div>';
            }else{
                break;
            }
            $i++;
        }
        return empty($disp[0])?['<div class="bimg bg-cover" style="background-image: url()"></div>',$count]:[$disp[0],$count];
    }
}
}
$MNC['7003'] = new MNC7003();