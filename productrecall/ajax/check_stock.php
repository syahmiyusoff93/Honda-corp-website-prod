<?php
	header('Content-Type: application/json');
	include_once "../config.php"; 

	$vin = filter_var($_POST["vin"], FILTER_SANITIZE_STRING);
	$dealerID = filter_var($_POST["dealerID"], FILTER_SANITIZE_STRING);
	$showEligible = false;
	$showStock = false;
	$requiredArray = array();
	$stockArray = array();

	$sql = "select a.vin, a.partNo, a.productType, b.dealer, b.dealerID, b.stock, case when a.productType = 'airbagD' and b.stock = 0 then 1 else 0 end as elligible, a.status  from productupdate_new a left join productupdatestock b on b.partNo = a.partNo where a.vin=? and (b.dealerID = ? or b.dealerID is null)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $vin, $dealerID);
    $stmt->execute();    
    $result = $stmt->get_result();

    $json_array = array();
    while ($row = $result->fetch_row()) {
    	$json_array[] = array( 
    		"vin" => $row[0] , 
    		"partNo" => $row[1] , 
    		"partType" => $row[2] , 
    		"dealer" => $row[3] , 
    		"dealerID" => $row[4] , 
    		"stock" => $row[5] , 
    		"elligible" => $row[6] ,
            "status" => $row[7] 
    	);
    }

    echo json_encode($json_array);
  /*  if($result->num_rows > 0){
    	$x = 0;
    	foreach($result as $id => $val){
    		$requiredArray[] =  array($val["partNo"],$val["productType"]);
    		
    		$sql2 = "SELECT stock,productType from productupdatestock WHERE partNo = ? AND dealerID = ?";
	    	$stmt = $conn->prepare($sql2);
	        $stmt->bind_param("si", $requiredArray[$x][0], $dealerID);
	        $stmt->execute();
	    	$result = $stmt->get_result();

	    	if($result->num_rows > 0){
	    		foreach($result as $id => $val){
		    		$stockArray[] =  array($val["stock"],$val["productType"]);
		    	}
	    		//set rules here
	    		if(in_array("battery", $requiredArray)){
	    			$showStock = true;
	    		} else if(in_array("cvt", $requiredArray)){
	    			$showStock = true;
	    		} else {
	    			for($y=0; $y < count($stockArray);$y++){
	    				if((in_array("airbagD", $stockArray)) && ($stockArray[$y][0]>0)){
		    				$showStock = true;
		    			}
	    			}
	    		}
	    		
	    	} else {
	    		//no part with dealer exist
	    	}
	    	$x++;
    	}
    	print_r($requiredArray);
    	print_r($stockArray);
    	print_r(count($stockArray));
    	echo $stockArray[0][0];
    	print_r($showStock);

    } else {
    	$showEligible = false;
    }

    if($showEligible == true){
    	echo "eligible";
    } else {
    	echo "not eligible";
    }

    if($showStock == true){
    	echo "show stock";
    } else {
    	echo "dont show stock";
    } */


