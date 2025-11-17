<?php
	include_once "../config.php"; 

	$productType = "";
    $stateID = "";

	$ownerName = htmlspecialchars(strip_tags($_POST["ownerName"]), ENT_QUOTES, 'UTF-8');
    $ownerIC = htmlspecialchars(strip_tags($_POST["ownerIC"]), ENT_QUOTES, 'UTF-8');
    $driverName = htmlspecialchars(strip_tags($_POST["driverName"]), ENT_QUOTES, 'UTF-8');
    $driverIC = htmlspecialchars(strip_tags($_POST["driverIC"]), ENT_QUOTES, 'UTF-8');
    $address = htmlspecialchars(strip_tags($_POST["address"]), ENT_QUOTES, 'UTF-8');
    $carNo = htmlspecialchars(strip_tags($_POST["carNo"]), ENT_QUOTES, 'UTF-8');
    $vinNo = htmlspecialchars(strip_tags($_POST["vinNo"]), ENT_QUOTES, 'UTF-8');
    $mobileNo = htmlspecialchars(strip_tags($_POST["mobileNo"]), ENT_QUOTES, 'UTF-8');
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $bankName = htmlspecialchars(strip_tags($_POST["bankName"]), ENT_QUOTES, 'UTF-8');
    $bankNo = htmlspecialchars(strip_tags($_POST["bankNo"]), ENT_QUOTES, 'UTF-8');
    $dealerName = htmlspecialchars(strip_tags($_POST["dealerName"]), ENT_QUOTES, 'UTF-8');
    $finalName = htmlspecialchars(strip_tags($_POST["finalName"]), ENT_QUOTES, 'UTF-8');
    $person = htmlspecialchars(strip_tags($_POST["person"]), ENT_QUOTES, 'UTF-8');
    $finalCarNo = htmlspecialchars(strip_tags($_POST["finalCarNo"]), ENT_QUOTES, 'UTF-8');

    if ($ownerName == "" || $ownerName == null){
    	$ownerName = "";
    }
    if ($ownerIC == "" || $ownerIC == null){
    	$ownerIC = "";
    }
    if ($driverName == "" || $driverName == null){
    	$driverName = "";
    }
    if ($driverIC == "" || $driverIC == null){
    	$driverIC = "";
    }

    $upload_ownerIC_size = $_FILES["upload_ownerIC"]["size"];
    $upload_driverIC_size = $_FILES["upload_driverIC"]["size"];
    $upload_authLetter_size = $_FILES["upload_authLetter"]["size"];

    $upload_ownerIC_name = $_FILES["upload_ownerIC"]["name"];
    $upload_driverIC_name = $_FILES["upload_driverIC"]["name"];
    $upload_vehicleGrant_name = $_FILES["upload_vehicleGrant"]["name"];
    $upload_authLetter_name = $_FILES["upload_authLetter"]["name"];
    $upload_bankProof_name = $_FILES["upload_bankProof"]["name"];

    $createdDateTime = date("Y-m-d H:i:s");

    //upload_ownerIC, upload_ownerIC_name, upload_driverIC, upload_driverIC_name, upload_vehicleGrant, upload_vehicleGrant_name, upload_authLetter, upload_authLetter_name, upload_bankProof, upload_bankProof_name, 
    $sql = "INSERT INTO reimbursementform (ownerName, ownerIC, driverName, driverIC, address, carNo, vin, mobileNo, email, bankName, bankNo, dealerName, finalName, person, finalCarNo, createdDateTime) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    // bsbsbsbsbs
    //$upload_ownerIC, $upload_ownerIC_name, $upload_driverIC, $upload_driverIC_name, $upload_vehicleGrant, $upload_vehicleGrant_name, $upload_authLetter, $upload_authLetter_name, $upload_bankProof, $upload_bankProof_name,
    $stmt->execute([$ownerName, $ownerIC, $driverName, $driverIC, $address, $carNo, $vinNo, $mobileNo, $email, $bankName, $bankNo, $dealerName, $finalName, $person, $finalCarNo, $createdDateTime]);

    $id = $conn->lastInsertId();
    // echo $id;

    if ($upload_ownerIC_size > 0){
	    $sql2 = "UPDATE `reimbursementform` SET upload_ownerIC = ?, upload_ownerIC_name = ? WHERE id = ?";
	    $stmt = $conn->prepare($sql2);
	    $upload_ownerIC = file_get_contents($_FILES["upload_ownerIC"]["tmp_name"]);
		$stmt->execute([$upload_ownerIC, $upload_ownerIC_name, $id]);
	}

	if ($upload_driverIC_size > 0){
		$sql2 = "UPDATE `reimbursementform` SET upload_driverIC = ?, upload_driverIC_name = ? WHERE id = ?";
	    $stmt = $conn->prepare($sql2);
	    $upload_driverIC = file_get_contents($_FILES["upload_driverIC"]["tmp_name"]);
		$stmt->execute([$upload_driverIC, $upload_driverIC_name, $id]);
	}

	$sql2 = "UPDATE `reimbursementform` SET upload_vehicleGrant = ?, upload_vehicleGrant_name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql2);
    $upload_vehicleGrant = file_get_contents($_FILES["upload_vehicleGrant"]["tmp_name"]);
	$stmt->execute([$upload_vehicleGrant, $upload_vehicleGrant_name, $id]);

	if ($upload_authLetter_size > 0){
		$sql2 = "UPDATE `reimbursementform` SET upload_authLetter = ?, upload_authLetter_name = ? WHERE id = ?";
	    $stmt = $conn->prepare($sql2);
	    $upload_authLetter = file_get_contents($_FILES["upload_authLetter"]["tmp_name"]);
		$stmt->execute([$upload_authLetter, $upload_authLetter_name, $id]);
	}

    $sql2 = "UPDATE `reimbursementform` SET upload_bankProof = ?, upload_bankProof_name = ? WHERE id = ?";
    $stmt = $conn->prepare($sql2);
    $upload_bankProof = file_get_contents($_FILES["upload_bankProof"]["tmp_name"]);
	$stmt->execute([$upload_bankProof, $upload_bankProof_name, $id]);
	// echo "end line";
	// print_r($_FILES);

	// $sql3 = "select productType from productupdate_new a left join productupdatestock b on b.partNo = a.partNo where a.vin=? and b.dealerID=? and (b.stock = 0 or b.stock is null) and a.productType <> 'airbagD'";
	$sql3 = "select a.productType from productupdate_new a left join productupdatestock b on b.partNo = a.partNo where a.vin=? and (b.dealerID = ? or b.dealerID is null) and (b.stock = 0 or b.stock is null) and a.productType <> 'airbagD'";
	$stmt = $conn->prepare($sql3);
	$stmt->execute([$vinNo, $dealerName]);
	$result = $stmt->fetchAll();

	$tempProductType = "";

	// echo $vinNo." ".$dealerName." ";
	// print_r($result);
	if(count($result) > 0){
		foreach($result as $id => $val)
            {
            	$tempProductType .= "|".$val["productType"];
            }
            //upload to old form
            // echo $tempProductType;
    	    $sql = "INSERT INTO productupdatemail (name, ic, driverName, driverIc, hpno, carregno, email, productType, vin, stateID, dealerID, createdDateTime, updatedDateTime) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
	        $stmt = $conn->prepare($sql);
	        $stmt->execute([$ownerName, $ownerIC, $driverName, $driverIC, $mobileNo, $carNo, $email, $tempProductType, $vinNo, $stateID, $dealerName, $createdDateTime, $createdDateTime]);
	        // print_r($conn->error);
	        // echo "end";
	} else {
		// echo "no upload to old form";
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="theme-color" content="#000" />

		<title><?php echo $meta_title?></title>
		<meta name="description" content="<?php echo $meta_desc; ?>" />
		<meta name="keywords" content="<?php echo $meta_keywords; ?>" />
		<meta name="author" content="<?php echo $meta_author ?>">

		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
						
		<meta property="og:url" content="<?php echo $meta_url; ?>" />		
		<meta property="og:image" content="<?php echo $meta_image; ?>" />
		<meta property="og:description" content="<?php echo $meta_desc; ?>"/>
		<meta property="og:title" content="<?php echo $meta_title; ?>"/>

		<link rel="stylesheet" href="../css/default.css">
		<link rel="stylesheet" href="../css/service_maintenance.css">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	</head>
	<body>
        <? include "../include/gtm.inc"; ?>
		<div class="header">
			<a href="http://www.honda.com.my"><div class="logo"></div></a>
		</div>
		<div class="thankyou" style="top: 80px;position: relative;width: 900px;left: 0;right: 0;margin: auto;">
			<h2>Thank you for your submission. You will be notified via sms upon validation approval within 48 working hours.</h2>
			<a href="../index.php" class="check-stock" style="width: 102px;height: 36px;float: left;margin-top: 20px;margin-left: 0px;">Back to homepage</a>
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
		<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
	</body>
</html>