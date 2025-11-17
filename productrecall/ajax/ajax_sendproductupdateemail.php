<?php
    define('BASEPATH',realpath('.'));
    include_once "../config.php"; 

    
	if(isset($_POST)){
        $name = filter_var(@$_POST["name"], FILTER_SANITIZE_STRING);
        $ic = filter_var(@$_POST["ic"], FILTER_SANITIZE_STRING);
        // $driverName = filter_var($_POST["driverName"], FILTER_SANITIZE_STRING);
        // $driverIc = filter_var($_POST["driverIc"], FILTER_SANITIZE_STRING);
        $driverName = "";
        $driverIc = "";
        $hpno = filter_var(@$_POST["hpno"], FILTER_SANITIZE_STRING);
        $carregno = filter_var(@$_POST["carregno"], FILTER_SANITIZE_STRING);
        $email = filter_var(@$_POST["email"], FILTER_SANITIZE_STRING);
        $product_type = filter_var(@$_POST["product_type"], FILTER_SANITIZE_STRING);
        $vin = filter_var(@$_POST["vin"], FILTER_SANITIZE_STRING);

        $dealerName = filter_var(@$_POST["dealerName"], FILTER_SANITIZE_STRING);
        $dealerID = filter_var(@$_POST["dealerID"], FILTER_SANITIZE_STRING);
        $stateID = filter_var(@$_POST["stateID"], FILTER_SANITIZE_STRING);

        $DateOfRequest = date("Y-m-d H:i:s");

        // $BAcc = filter_var($_POST["BAcc"], FILTER_SANITIZE_STRING);

        $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
        srand((double)microtime()*1000000); 
        $i = 0; 
        $ticketID = '' ; 
        while ($i <= 3) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $ticketID = $ticketID . $tmp ;
        $i++; 
        }
        $ticketID = "#" . date("ymd") . "_" . substr($email, 0, 5) . uniqid();
        

        
        // mysqli_query($connection,"INSERT INTO productupdatemail (name, ic, hpno, carregno, email, productType, vin, stateID, dealerID, createdDateTime, updatedDateTime)
        // VALUES ('".$name."', '".$ic."', '".$hpno."', '".$carregno."','".$email."', '".$product_type."', '".$vin."', '".$stateID."','".$dealerID."','".$DateOfRequest."', '".$DateOfRequest."')"); 

        $sql = "INSERT INTO productupdatemail (name, ic, ticketID, driverName, driverIc, hpno, carregno, email, productType, vin, stateID, dealerID, dealerName, createdDateTime, updatedDateTime) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssiisss",$name, $ic, $ticketID, $driverName, $driverIc, $hpno, $carregno, $email, $product_type, $vin, $stateID, $dealerID, $dealerName, $DateOfRequest, $DateOfRequest);
        $stmt->execute();

        echo $ticketID ;
        //echo ' / '.$stmt->error;
    }else{
        echo 'error';
    }

	
?>