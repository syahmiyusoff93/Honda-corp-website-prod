<?php
if(!class_exists('MNC4100')){
    class MNC4100 extends INFOEXT{ 
        // public function database($CON, $folder, $json = false) {   
        //     $DATA = [];

        //     if( isset($_GET['carid']) ){
        //         $ID = $_GET['carid'];

        //         $stmt = $CON->stmt_init();
        //         $stmt -> prepare("SELECT * FROM car WHERE id=?;");
        //         $stmt -> bind_param('i', $ID);
        //         $stmt -> execute();
        //         $res = $stmt->get_result();
    
        //         while($info = $res->fetch_assoc()){
        //             $info['_price'] = $this->floatString($info['_price']);   
        //             $info['_mileage'] = $this->floatString($info['_mileage']); 
        //             $info['_manufacturingYr'] = $this->floatString($info['_manufacturingYr']); 
        //             array_push($DATA, $info);
        //         }
        //     }  
            
        //     return json_encode($DATA, true);  
        // } 
    }
}
$MNC['4100'] = new MNC4100();