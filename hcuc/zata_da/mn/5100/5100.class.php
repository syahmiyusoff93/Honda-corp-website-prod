<?php
if(!class_exists('MNC5100')){
    class MNC5100 extends INFOEXT{ 
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
 
 
        // public function jsonCar($CON, $folder) {   
        //     $JSON = 'zata_da/json/car.json';
        //     $JSON = file_get_contents($JSON);
        //     $JSON = json_decode($JSON, true); 

        //     return json_encode($JSON['variance'], true);
        // } 

        
    }
}
$MNC['5100'] = new MNC5100();