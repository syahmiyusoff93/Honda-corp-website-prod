<?php
	require_once('config.php');
	define('BASEPATH',realpath('.'));

	error_reporting(-1);
        ini_set("display_errors", 1);

    $GLOBAL_DATETIME = "Asia/Kuala_Lumpur";
	date_default_timezone_set($GLOBAL_DATETIME);
	

	$result = mysqli_query($connection,"SELECT vin FROM productrecall_staging.productupdate_new WHERE productType='preventiveP' AND status='Not Done' ");
    while($row = $result->fetch_assoc()) {
        $vin = $row['vin'];
    }

  	
?>

<table border="1" style="border-collapse: collapse" cellpadding="10">
	<tr>
		<th>VIN</th>
		

	</tr>

	<?php
		
				echo "
					<tr>
						<td>".$vin."</td>
					</tr>
				";
			
	?>
</table>

<!-- <td>".($id+1)."</td> -->