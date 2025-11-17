<?php
    header('Content-Type: application/json');
    
    define('BASEPATH',realpath('.'));
    include_once "../config.php"; 
    include_once "../include/affectedlist.php"; 
   
    if(isset($_POST)){
        // $product_type = $_POST['product_type'];
        $vin = htmlspecialchars(strip_tags(@$_POST["vin"]), ENT_QUOTES, 'UTF-8');
        $vin = str_replace(["-", "–"], '', $vin);
        //$vin = 'PMHGM2640BD102046';
        //$vin = 'JHMGD38704S200580';

        //$result = mysqli_query($connection,"SELECT DISTINCT productType from productupdate_new WHERE vin = '".$vin."'");      
        // $variable = array();
        
        // AFTER 6 DEC 2017
        //$sql = "SELECT DISTINCT productType,partNo, status, model, year from productupdate_new WHERE vin = ? AND (productType!='batteryS') order by productType";
        // AFTER TBA
        //$sql = "SELECT DISTINCT productType,partNo, status, model, year from productupdate_new WHERE vin = ? AND (productType!='doorMirrorSw' AND productType!='batteryS') order by productType";
        

        $embargocomp = "";
        if(is_array(@$embargo_list) && count($embargo_list)>0){
            // check if there's any component that SHOULD NOT appear YET
            
            foreach ($embargo_list as $key => $value) {
               $embargocomp .= " AND productType!='".$value."'";
            }
        }
        $sql = "SELECT DISTINCT productType, productupdateID, partNo, status, model, year, model_preventive 
        from productupdate_new 
        WHERE vin = ? ".$embargocomp." 
        AND productType != 'battery' 
        order by productupdateID;";

        $stmt = $conn->prepare($sql) or die("Prepare failed");
        $stmt->execute([$vin]);
        // $result = $database->query("select",$qry,$connection,$variable);

        $result = $stmt->fetchAll();

        // New list for new productType (engineBoldEarth & acgTerminalNut)
       /* $sql2 = "SELECT DISTINCT productType, productupdateID, partNo, status, model, year, model_preventive from productupdate_2022 WHERE vin = ? ".$embargocomp." order by productupdateID;";
        $stmt2 = $conn->prepare($sql2) or die(mysqli_error($conn));
        $stmt2->bind_param("s", $vin) ;
        $stmt2->bind_result($productType,$id, $partNo,$status,$model,$year,$model_preventive);
        $stmt2->execute();*/
       // $result2 = $stmt2->get_result();

        // //if(mysqli_num_rows($result) > 0){
        $tempProductType = "";
        // $new_array[] = "";
        if(count($result) > 0 ) { // || $result2->num_rows > 0){
            $new_array = array();
            foreach($result as $id => $val)
            {
                // $tempProductType .= "|".$val["productType"];
                
                if (strpos($val["productType"], "_cash") !== false) {
                   $splitvar = explode("-", $val["productType"]);
                   addKeyValueToProductTypeArray($new_array, $splitvar[1], "cash", "yes"); // Inside while loop
                }
            }
            foreach($result as $id => $val)
            {
                // $tempProductType .= "|".$val["productType"];
                if (strpos($val["productType"], "_cash") === false) {
                   addKeyValueToProductTypeArray($new_array, $val["productType"], $val["partNo"], $val["status"], $val["model"], $val["year"], $val["model_preventive"], "cash", "no"); // Inside while loop
                }
            }
            /*foreach ($result2 as $id => $val) {
                if (strpos($val["productType"], "_cash") === false) {
                    addKeyValueToProductTypeArray($new_array, $val["productType"], $val["partNo"], $val["status"], $val["model"], $val["year"], $val["model_preventive"], "cash", "no"); // Inside while loop
                }
            }*/
            $update = array();
            $update["status"] = "yes";
            $update["items"] = $new_array;
            /*
            $sql = "SELECT DISTINCT vin FROM `productupdatemail` where vin = ? and createdDateTime BETWEEN '2016-10-01 00:00:00' AND '2017-01-16 23:59:59'";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $vin);
            // $stmt->bind_result($productType,$partNo,$status,$model,$year);
            $stmt->execute();
            $result = $stmt->get_result();
            $update["inPeriod"] = $result->num_rows;
            */

            //echo $update;
            //echo "yes|".$row[0]."|";
            // echo "yes".$tempProductType;
            echo json_encode($update);
        }else{
            echo '{"status":"no"}';
        }
    }

    function addKeyValueToProductTypeArray(&$array, $productType, $partNo, $status, $model, $year, $model_preventive, $key, $val) {
        $found = false;
        foreach ($array as $each) {
            if ($each["name"] === $productType) {
                $each[$key] = $val;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $new_array = array("name" => $productType, "partNo" => $partNo, "status" => $status, "model" => $model, "year" => $year, "model_preventive" => $model_preventive, $key => $val);
            $array[] = $new_array;
        }
    }


