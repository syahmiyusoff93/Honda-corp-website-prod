<?php
    include "config.php";
    include "include/affectedlist.php";

    $partNoParam = $_GET["partNo"];
    if ($partNoParam == "" || $partNoParam == " "){
        $partNoParam = "Installation CD";
    }
    $partsRequired = array();
    $partNoSQLParam = array();
    foreach ($partNoParam as $partNo) {
        $partsRequired[] = ["type" => "{TODO}", "partNo" => $partNo];
        $partNoSQLParam[] = ["s", $partNo];
    }

    // print_r($partsRequired);

    $sql = "select subsel_0.dealer, subsel_0.dealerID, d.region, d.dealer_name, subsel_0.productType, subsel_0.dateTitle ";
// build the main select columns
    for ($i = 0; $i < count($partsRequired); $i++) {
        $sql .= ", subsel_" . $i;
        $sql .= ".stock as stock_" . $i;
        $sql .= ", subsel_" . $i;
        $sql .= ".productType as productType_" .$i;
    }
    $sql .= " from ";
// build the subselects
    for ($i = 0; $i < count($partsRequired); $i++) {
        if ($i > 0) {
            $sql .= " join ";
        }
        $sql .= "(SELECT id, dealer, dealerID, stock, productType, dateTitle  FROM productupdatestock WHERE partno = ?) subsel_";
        $sql .= $i;
        if ($i > 0) {
            $sql .= " on subsel_" . ($i - 1);
            $sql .= ".dealerID = ";
            $sql .= " subsel_" . $i;
            $sql .= ".dealerID ";
        }
    }

    $sql .= " join productupdatedealers d on d.id = subsel_0.dealerID where d.showDealer = 'yes' order by d.position, d.region, d.dealer_name";
    $stmt = $conn->prepare($sql);
    bindVars($stmt, $partNoSQLParam);
    $stmt->execute();
    $result = $stmt->get_result();
    $prevregion = "";
    $rowCount = 0;

	$output = "";
	if(!$result || $result->num_rows==0){
		die('<pre>Stock data for the requested part(s) currently not available.</pre>');
    }
    
    
    
    function bindVars($stmt, $params) {
        if ($params != null) {
            $types = '';

            foreach ($params as $param) {
                $types .= $param[0];
            }

            $bind_names[] = $types;

            for ($i = 0; $i < count($params); $i++) {
                $bind_name = 'bind' . $i;

                $$bind_name = $params[$i][1];
                $bind_names[] = &$$bind_name;
            }


            call_user_func_array(array($stmt, 'bind_param'), $bind_names);
        }
        return $stmt;
    }
    ?>
    <html>
        <head>
            <title>Stock Listing by Product Type and Region</title>
            <link rel="shortcut icon" type="image/x-icon" href="https://www.honda.com.my/img/icon/honda-favicon.ico?ser=dc55d9be651f1be8f49aaaffde61808957a3fbdb" />
            <link rel="stylesheet" href="css/stockstyle.css">
        <style>
            
                html, body {font-family:'Conv_ProximaNova-Regular';font-size:14px;}
                /*table {display:inline-block;}*/
                .table-container {}
                table td {border:solid 1px black;padding: 3px 10px;}
        </style>
    </head>
    <body>
        <?php 
            while ($row = $result->fetch_assoc()){
                $rowCount++;
                if ($rowCount == 1) {
                    echo "<h1>".$row["dateTitle"]."</h1>";
                    echo "<div class='table-container'>";
                }
                // echo "<td>".print_r($row, true)."</td>";
                if ($prevregion != $row["region"]){
                    if ($prevregion != ""){
                        echo "</table>";
                        echo "</div>";
                    }           
                    echo "<div class='tables'>";
                    echo "<table>";
                    echo "<h2>".$row["region"]."</h2>";
                    echo "<tr style='background: #cc0000;color:white;'>";
                        echo "<td align='left' width='250px'>Dealer</td>";
                        for ($x=0;$x<count($partsRequired);$x++){
        
                            foreach ($affected_parts as $key => $value) {
                                if($row["productType_$x"] == $value['textcode']){
                                    $label = $value['name'];
                                }
                            }
                            
                            echo "<td align='center'>".$label."</td>";
                        }
                    echo "</tr>";
                }
                echo "<tr>";
                // echo "<td>".print_r($row, true)."</td>";
                
                echo "<td align='left' width='250px'>".$row["dealer_name"]."</td>";
                
                for ($x=0;$x<count($partsRequired);$x++){
        
                    $cellcolor = '#92D050'; // green kot
                    $stockcount = $row["stock_$x"];
        
                    if ($row["productType_$x"] != "cvt"){
                        if($stockcount<=50) $cellcolor = 'yellow';
                        if($stockcount<=10) $cellcolor = 'orange';
                        if($stockcount<=0) $cellcolor = 'red';  
                    } 
                    
                    echo "<td align='center' style='background:$cellcolor;'>$stockcount</td>";
                }
                echo "</tr>";
                $prevregion = $row["region"];
                
            }
            echo "</table>";
            echo "</div>";
        ?>
    </body>
</html>