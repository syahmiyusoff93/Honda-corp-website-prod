<?php
    define('BASEPATH',realpath('.'));
    include_once "../config.php"; 

    
	if(isset($_POST)){
        $vinrequired = filter_var($_POST["vinrequired"], FILTER_SANITIZE_STRING);
        $product_type = filter_var($_POST["product_type"], FILTER_SANITIZE_STRING);
        $vin = filter_var($_POST["vin"], FILTER_SANITIZE_STRING);
        $DateOfRequest = date("Y-m-d H:i:s");

        echo $vinrequired."<br>";
        echo $product_type."<br>";
        echo $vin."<br>";
        
        // mysqli_query($connection,"INSERT INTO productupdatesubmit (productType, vinNo, requiredStatus, createdDateTime, updatedDateTime)
        // VALUES ('".$product_type."', '".$vin."', '".$vinrequired."', '".$DateOfRequest."', '".$DateOfRequest."')"); 
        $sql = "INSERT INTO productupdatesubmit (productType, vinNo, requiredStatus, createdDateTime, updatedDateTime) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss",$product_type, $vin, $vinrequired, $DateOfRequest, $DateOfRequest);
        $stmt->execute();
    }

	
?>