<?php
	include_once "config.php";
    $formVin = filter_input(INPUT_POST, "formVin");
    $formDealer = filter_input(INPUT_POST, "formDealer");
    header("Location: index.php");
	exit;
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

		<link rel="stylesheet" href="css/default.css">
		<link rel="stylesheet" href="css/service_maintenance.css">
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<style>
			input, textarea, select {width: 300px;position: absolute;left: 110px;}
			h2 {color: black;}
		</style>
	</head>
	<body>
        <? include "include/gtm.inc"; ?>
		<div class="header">
			<a href="http://www.honda.com.my"><div class="logo"></div></a>
		</div>
		<section style="top: 90px;position: relative;width: 900px;left: 0;right: 0;margin: auto;">
			<h1>PUD Loss of Use Registration</h1>
			<form style="margin-top:20px;" enctype="multipart/form-data" method="post" action="ajax/submitPUDform.php" target="_parent">
				<div class="left-form">
					<p style="margin-top:10px;"><span id="mand_ownerName" class="mandatory">*</span><span>Owner Name: </span><input type="text" name="ownerName" class="ownerName"></p>
					<p style="margin-top:10px;"><span id="mand_ownerIC" class="mandatory">*</span><span>IC No: </span><input type="text" name="ownerIC" class="ownerIC"></p>
					<p style="margin-top:10px;"><span id="mand_driverName" class="mandatory" style="display:none;">*</span><span>Driver Name<br>(If different from<br>owner): </span><input type="text" name="driverName" class="driverName"></p>
					<p style="margin-top:10px;"><span id="mand_driverIC" class="mandatory" style="display:none;">*</span><span>IC No: </span><input type="text" name="driverIC" class="driverIC"></p>
					<p style="margin-top:10px;"><span id="mand_address" class="mandatory">*</span><span>Mailing Address: </span><textarea type="text" rows="4" name="address" class="address" style="height:80px;"></textarea></p>
					<p style="margin-top:70px;"><span id="mand_carNo" class="mandatory">*</span><span>Car No: </span><input type="text" name="carNo" class="carNo"></p>
					<p style="margin-top:10px;"><span id="mand_vinNo" class="mandatory">*</span><span>VIN No: </span><input type="text" name="vinNo" class="vinNo" value="<?=$formVin?>"></p>
					<p style="margin-top:10px;"><span id="mand_mobileNo" class="mandatory">*</span><span>Mobile No: </span><input type="text" name="mobileNo" class="mobileNo"></p>
					<p style="margin-top:10px;"><span id="mand_email" class="mandatory">*</span><span>Email Address: </span><input type="text" name="email" class="email"></p>
					<p style="margin-top:10px;"><span class="mandatory">*</span><span>Bank Name: </span>
                    <select type="text" name="bankName" class="bankName">
	              		<option value="0">Select Bank</option>
                        <option value="AFFIN BANK BERHAD">AFFIN BANK BERHAD</option>
                        <option value="AL-RAJHI BANKING & INVESTMENT CORP (M) BERHAD">AL-RAJHI BANKING & INVESTMENT CORP (M) BERHAD</option>
                        <option value="ALLIANCE BANK MALAYSIA BERHAD">ALLIANCE BANK MALAYSIA BERHAD</option>
                        <option value="AMBANK (M) BERHAD">AMBANK (M) BERHAD</option>
                        <option value="BANK ISLAM MALAYSIA">BANK ISLAM MALAYSIA</option>
                        <option value="BANK KERJASAMA RAKYAT MALAYSIA BERHAD">BANK KERJASAMA RAKYAT MALAYSIA BERHAD</option>
                        <option value="BANK MUAMALAT">BANK MUAMALAT</option>
                        <option value="BANK OF AMERICA">BANK OF AMERICA</option>
                        <option value="BANK OF CHINA (MALAYSIA) BERHAD">BANK OF CHINA (MALAYSIA) BERHAD</option>
                        <option value="BANK OF TOKYO-MITSUBISHI UFJ (MALAYSIA) BERHAD">BANK OF TOKYO-MITSUBISHI UFJ (MALAYSIA) BERHAD</option>
                        <option value="BANK SIMPANAN NASIONAL BERHAD">BANK SIMPANAN NASIONAL BERHAD</option>
                        <option value="BNP PARIBAS MALAYSIA BERHAD">BNP PARIBAS MALAYSIA BERHAD</option>
                        <option value="BANK PERTANIAN MALAYSIA BERHAD (AGROBANK)">BANK PERTANIAN MALAYSIA BERHAD (AGROBANK)</option>
                        <option value="CIMB BANK BERHAD">CIMB BANK BERHAD</option>
                        <option value="CITIBANK BERHAD">CITIBANK BERHAD</option>
                        <option value="DEUTSCHE BANK (MALAYSIA) BERHAD">DEUTSCHE BANK (MALAYSIA) BERHAD</option>
                        <option value="HONG LEONG BANK BERHAD">HONG LEONG BANK BERHAD</option>
                        <option value="HSBC BANK MALAYSIA BERHAD">HSBC BANK MALAYSIA BERHAD</option>
                        <option value="INDUSTRIAL AND COMMERCIAL BANK OF CHINA (MALAYSIA) BERHAD">INDUSTRIAL AND COMMERCIAL BANK OF CHINA (MALAYSIA) BERHAD</option>
                        <option value="J.P. MORGAN CHASE BANK BERHAD">J.P. MORGAN CHASE BANK BERHAD</option>
                        <option value="KUWAIT FINANCE HOUSE (MALAYSIA) BERHAD">KUWAIT FINANCE HOUSE (MALAYSIA) BERHAD</option>
                        <option value="MAYBANK">MAYBANK</option>
                        <option value="MIZUHO BANK (MALAYSIA) BERHAD">MIZUHO BANK (MALAYSIA) BERHAD</option>
                        <option value="OCBC BANK (MALAYSIA) BERHAD">OCBC BANK (MALAYSIA) BERHAD</option>
                        <option value="PUBLIC BANK BERHAD">PUBLIC BANK BERHAD</option>
                        <option value="RHB BANK BERHAD">RHB BANK BERHAD</option>
                        <option value="SUMITOMO MITSUI BANKING CORPORATION MALAYSIA BERHAD">SUMITOMO MITSUI BANKING CORPORATION MALAYSIA BERHAD</option>
                        <option value="STANDARD CHARTERED BANK MALAYSIA BERHAD">STANDARD CHARTERED BANK MALAYSIA BERHAD</option>
                        <option value="THE ROYAL BANK OF SCOTLAND BERHAD">THE ROYAL BANK OF SCOTLAND BERHAD</option>
                        <option value="UNITED OVERSEAS BANK (MALAYSIA) BHD">UNITED OVERSEAS BANK (MALAYSIA) BHD</option>
                    </select>
                    </p>
					<p style="margin-top:10px;"><span id="mand_bankNo" class="mandatory">*</span><span>Bank Account No: </span><input type="text" name="bankNo" class="bankNo"></p>
					<p style="margin-top:10px;"><span class="mandatory">*</span><span>Preferred Dealer: </span>
		              	<select id="select_dealer_form" name="dealerName" style="width:300px;">
		              		<option value="0">Select Dealer</option>
<?
	$sql = "select a.id, a.region, a.dealer_name from productupdatedealers a order by a.region, a.dealer_name";
    $stmt = $conn->prepare($sql);
    $stmt->execute();    
    $prevregion = "";
    while ($row = $stmt->fetch()) 
    {
?>
<?
        if ($prevregion != $row['region'])
        {
?>
<?
            if ($prevregion != "")
            {
?>
                            </optgroup>
<?
            }
?>
						  	<optgroup label="<?=$row['region']?>">
<?
            $prevregion = $row['region'];
        }
?>
                                <option value="<?=$row['id']?>" <?=($row['id'] == $formDealer)?"selected" : ""?>><?=$row['dealer_name']?></option>
<?
    }
?>
                            </optgroup>
						</select></p>
						<p style="margin-top:10px;"><span class="mandatory">*</span>Denotes mandatory fields</p>
						<div class="right-form" style="position: absolute;top: 52px;left: 500px;">
							<p style="margin-top:10px;"><span id="mand_upload_ownerIC" class="mandatory">*</span><span>Upload MyKad Copy of Owner: </span><br><input type="file" name="upload_ownerIC" class="fileUpload" id="f1"><br>
							<p style="margin-top:10px;"><span id="mand_upload_driverIC" class="mandatory" style="display:none;">*</span><span>Upload MyKad Copy of Driver: </span><br><input type="file" name="upload_driverIC" class="fileUpload" id="f2"><br>
							<p style="margin-top:10px;"><span id="mand_upload_vehicleGrant" class="mandatory">*</span><span>Upload Vehicle Grant: </span><br><input type="file" name="upload_vehicleGrant" class="fileUpload" id="f3"><br>
							<p style="margin-top:10px;"><span id="mand_upload_authLetter" class="mandatory" style="display:none;">*</span><span>Authorization Letter by Owner: </span><br><input type="file" name="upload_authLetter" class="fileUpload" id="f4"><br>
							<p style="margin-top:10px;"><span id="mand_upload_bankProof" class="mandatory">*</span><span>Account Book Copy / Header of Online Banking: </span><br><input type="file" name="upload_bankProof" class="fileUpload" id="f5"><br>
							<p style="margin-top:10px;">Max file upload size per upload is 800kB.</p>
							<!-- <p style="margin-top:10px;"><span>Attached wrong documents? </span><button type="button" class="reset_attachments">Reset Attachments</button><br> -->
						</div>
					</div>
			<div class="tnc" style="margin-top:50px;border-bottom: 2px solid black;">
				<h2>'LOSS OF USE REIMBURSEMENT PLAN': </h2>
				<ol style="list-style-type: lower-alpha;">
					<li>Affected customer is strongly advised not to use and/or drive his/her vehicle until a new airbag inflator is replaced. Subject to Terms & Conditions below, Honda Malaysia Sdn. Bhd. (HMSB) shall reimburse the affected customer <b>RM50 per day for loss of use of the affected vehicle provided that</b> the customer agrees and undertakes not to use and/or drive his/her affected vehicle until the faulty driver-side airbag in the vehicle has been completely replaced by HMSB.</li>
					<li>By agreeing to this Loss of Use Reimbursement Plan, the affected customer acknowledges that he/she fully understands and is bound by the Terms & Conditions of this plan as explained by both HMSB’s representative and as mentioned in this Form.</li>
				</ol>
				<h2>Terms and Conditions: </h2>
				<ol style="list-style-type: decimal;">
					<li>The Loss of Use Reimbursement Plan (hereinafter shall be referred to as the “Plan”) applies to customer owning the Honda vehicle affected by faulty driver-side airbag (hereinafter shall be referred to as the “customer”) which includes (Civic (FD) 2006, CRV (RE) 2007, CIVIC (FD) 2006~2011, STREAM 2007~2012, CRV (RE) 2007~2011, INSIGHT 2011~2012, JAZZ (GE) 2009~2012, CITY (GM) 2009~2012, CITY 2011~2013, CIVIC 2011	, CR-V 2011, JAZZ 2012~2013, JAZZ Hybrid 2013, INSIGHT 2012~2013, STREAM 2012~2013, CITY (GD) 2004~2006, CITY (GD) 2006~2008, CRV (RE) 2013, Civic (FB) 2012, City (GD) 2003~2004, Jazz (GD) 2004, Accord (CM) 2003~2007, JAZZ HYBRID 2012) only. Further, the Plan shall apply to the customer that had sent his/her vehicle or check thru website and there is no stock currently available for replacing the said airbag.</li>
					<li>The customer who agrees to the Plan must personally complete <b>and submit</b> this form <b>online</b>.</li>
					<li>Under this Plan, the customer agrees not to use and/or drive the vehicle <b><u>starting from the date of this Form being validated by HMSB until the date of new airbag replacement upon the said vehicle has been made </u>(“Waiting Period”)</b>. During this Waiting Period, HMSB will reimburse the customer a fixed amount of RM50 per day for daily loss of vehicle usage.</li>
					<li>HMSB and/or any Honda Authorized Service Centre (“Service Centre”) in Malaysia will notify the customer, using contact details provided in this Form, for airbag replacement process upon availability and readiness of the new airbag at the Service Centre premises (“Notification”). During this Notification, HMSB and/or the Service Centre must set-up a date for the replacement process which shall be made within two (2) days from the date of the said Notification. The customers shall not be entitled for further reimbursement under the Plan if the replacement date is booked after the given two (2) days period.</li>
					<li>Upon the completion of filling in this application Form and the said application being submitted by a representative of the owner, an authorization letter with the customer’s identification proof must be presented by attaching the said letter. Failure in doing so would prevent further payment of the reimbursement to the customer.</li>
					<li>The payment of the reimbursement shall be made directly to the customer’s bank account as per details provided in this Form within <b>2 months from the date of replacement</b>. Should the replacement date be re-scheduled to a later date, the payment of the reimbursement shall be made within 2 months from the said later date.</li>
					<li>This Plan is solely for the purpose of compensating the loss of use of the affected Honda vehicle.</li>
					<li>Reimbursement period is from <b>28th July 2016 till 31st August 2016</b>.</li>
					<li>HMSB and the Service Centre reserve its rights provided under the law.</li>
					<li>The eligibility of having the benefits/privileges as enumerated in this Loss of Use claim is solely based on HMSB discretion.</li>
					<li>By agreeing to submit this form, the customer is hereby authorizing HMSB to collect and process the customer’s personal data and HMSB will use its best endeavors to protect the customer’s personal data and comply with the laws as provided in the Personal Data Protection Act 2010.</li>
				</ol>
			</div>
			<div class="confirmation" style="margin-top:20px;">
				<h2><u>Signature</u></h2>
				<p style="margin-top:20px;">I, <input type="text" name="finalName" class="finalName" style="position:relative;left:0;text-align:center;">, <input style="left:0;width:15px;position:relative;" type="radio" name="person" value="owner" id="radio_owner"> owner/<input style="left:0;width:15px;position:relative;" type="radio" name="person" value="representative" id="radio_rep"> representative of the owner* of the vehicle with registration number <input type="text" name="finalCarNo" class="finalCarNo" style="position:relative;width:100px;left:0;text-align:center;">, hereby understand on the explanation provided by HMSB about the Loss of Use Reimbursement Plan together with its Terms and Conditions as contained in this Form, and I hereby AGREE to be bound with the Loss of Use Reimbursement Plan for the vehicle as per mentioned above. In the event that I use and/or drive my affected vehicle, I shall bear any risks that happened during my usage of the affected vehicle.</p>
			</div>
			<input style="position:relative;left:0;width:15px;" type="checkbox" name="verify" id="ok_ownerIC" value="ok_ownerIC">Attachment (MyKad IC of owner)<br>
			<input style="position:relative;left:0;width:15px;" type="checkbox" name="verify" id="ok_driverIC" value="ok_driverIC">Attachment (MyKad IC of driver)<br>
			<input style="position:relative;left:0;width:15px;" type="checkbox" name="verify" id="ok_grant" value="ok_grant">Attachment (Grant of Vehicle)<br>
			<input style="position:relative;left:0;width:15px;" type="checkbox" name="verify" id="ok_authLetter" value="ok_authLetter">Attachment (Authorization Letter-only required if form is submitted by representative of the owner)<br>
			<input style="position:relative;left:0;width:15px;" type="checkbox" name="verify" id="ok_bankProof" value="ok_bankProof">Attachment (Account Book Copy / Header of Online Banking)<br><br>
			<input style="position:relative;left:0;width:15px;" type="checkbox" name="verify" id="ok_tnc" value="ok_tnc">I have read and accept the Terms & Conditions<br>
			<input id="formSubmit" type="submit" value="Submit" style="display:none;">
			</form>
			<a href="javascript:;" class="check-stock" id="checkPUDform" style="width: 38px;height: 36px;float:right;margin-bottom:50px;">Submit</a>
		</section>
		<div class="check_popup" style="display:none;">
			<div class="popup_border">
				<h2>Confirm Submission:</h2>
				<div style="display:inline-block;width:49%;vertical-align:top;">
					<p style="margin-top:10px;"><span style="color:#cc0000">Owner Name: </span><span id="confirm_1" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Owner IC No: </span><span id="confirm_2" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Driver Name: </span><span id="confirm_3" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Driver IC No: </span><span id="confirm_4" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Mailing Address: </span><span id="confirm_5" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Car No: </span><span id="confirm_6" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">VIN No: </span><span id="confirm_7" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Mobile No: </span><span id="confirm_8" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Email Address: </span><span id="confirm_9" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Bank Name: </span><span id="confirm_10" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Bank Account No: </span><span id="confirm_11" style="text-transform: uppercase;"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Preferred Dealer: </span><span id="confirm_12" style="text-transform: uppercase;"></span></p>
				</div>
				<div style="display:inline-block;width:49%;vertical-align:top;">
					<p style="margin-top:10px;"><span style="color:#cc0000">Owner MyKad Attachment: </span><span id="confirm_13"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Driver MyKad Attachment: </span><span id="confirm_14"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Vehicle Grant Attachment: </span><span id="confirm_15"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Authorization Letter Attachment: </span><span id="confirm_16"></span></p>
					<p style="margin-top:10px;"><span style="color:#cc0000">Account Book Copy / Header of Online Banking Attachment: </span><span id="confirm_17"></span></p>
				</div>
				<p style="margin-top:20px;color:#cc0000; text-align: justify;">I, <u><span style="color:black;text-transform: uppercase;" id="confirm_18"></span></u>, <u><span style="color:black;text-transform: uppercase;" id="confirm_19"></span></u> of the vehicle with registration number <u><span style="color:black;text-transform: uppercase;" id="confirm_20"></span></u>, hereby understand on the explanation provided by HMSB about the Loss of Use Reimbursement Plan together with its Terms and Conditions as contained in this Form, and I hereby AGREE to be bound with the Loss of Use Reimbursement Plan for the vehicle as per mentioned above. In the event that I use and/or drive my affected vehicle, I shall bear any risks that happened during my usage of the affected vehicle.</p>
				<div style="float:right">
					<a href="javascript:;" class="check-stock" id="closeCheckPUDform" style="width: 26px;height: 36px;display:inline-block;margin-bottom:50px;background:black">Back</a>
					<a href="javascript:;" class="check-stock" id="submitPUDform" style="width: 41px;height: 36px;display:inline-block;margin-bottom:50px;">Confirm</a>
				</div>
			</div>
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	</body>
</html>