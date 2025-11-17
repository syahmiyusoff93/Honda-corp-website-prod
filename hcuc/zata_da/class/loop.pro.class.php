<?php
if(!class_exists('PROFILE')){
    class PROFILE {
        public function company($CON, $dot) {
            $q_cp = "SELECT * FROM info WHERE info_name = 'CP';";
            $res_cp = $CON->query($q_cp);
            $comp = []; $comp['cMed'] = [];
            while($info = $res_cp->fetch_object()){
                $J = json_decode($info->info_json, true);
                $comp['imglogo'] = empty($J['imglogo'])?'':$J['imglogo'];
                $comp['imgfav'] = empty($J['imgfav'])?'':$J['imgfav'];
                $comp['cName'] = empty($J['cName'])?'':$J['cName'];
                $comp['cRegis'] = empty($J['cRegis'])?'':$J['cRegis'];
                $comp['cCont'] = empty($J['cCont'])?'':$J['cCont'];
                $comp['cFax'] = empty($J['cFax'])?'':$J['cFax'];
                $comp['cMail'] = empty($J['cMail'])?'':$J['cMail'];
                $comp['cAdd'] = empty($J['cAdd'])?'':$J['cAdd'];
                
                $comp['imglogo'] = empty($comp['imglogo'])?'':$dot.'zata_da/src/cp/'.$comp['imglogo'];
                $comp['imgfav'] = empty($comp['imgfav'])?'':$dot.'zata_da/src/cp/'.$comp['imgfav'];
                
                $q_md = "SELECT * FROM info WHERE info_name = 'MD';";
                $res_md = $CON->query($q_md);
                while($infocp = $res_md->fetch_object()){ $comp['cMed'] = json_decode($infocp->info_json, true); }
            };
            
            return $comp;
        }
    }
}
$profile = new PROFILE();