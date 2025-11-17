<?php

// landing TITLE

$landing_title = 'At Honda, your safety is<br>always our top priority';
//$landing_title = 'IS YOUR VEHICLE INVOLVED IN A PRODUCT UPDATE?';

// landing copy
$landing_copy = 'As a precautionary measure, Honda Malaysia is offering FREE replacements on recalls for<br>Front Airbags, Continuous Variable Transmissions (CVT), 12V Batteries, Engine Components, Undercarriage Parts and Door Mirror Switch.';
$landing_copy = 'As a precautionary measure, Honda Malaysia is offering FREE replacements on front airbags and other selected affected components.';

// textcode for part which meant to be hidden/blocked from display when user key in their VIN
$embargo_list= array('');

// ------------------------------------------------------------------------------------------------------------------------
$affected_parts = array();
$affected_parts[0] = array('textcode' => 'airbagD',		'name'=> 'Driver\'s Airbag',			'icon'=>'img/airbag.png');
$affected_parts[1] = array('textcode' => 'preventiveD',			'name'=> 'Preventive Driver\'s Airbag',	'icon'=>'img/airbag.png');
$affected_parts[2] = array('textcode' => 'airbagP',		'name'=> 'Passenger\'s Airbag',			'icon'=>'img/airbag.png');
$affected_parts[3] = array('textcode' => 'preventiveP',			'name'=> 'Preventive Passenger\'s Airbag',	'icon'=>'img/airbag.png');
$affected_parts[4] = array('textcode' => 'battery',		'name'=> '12V Battery',					'icon'=>'img/12V-battery.png');
$affected_parts[5] = array('textcode' => 'cvt',			'name'=> 'CVT',							'icon'=>'img/CVT.png');
$affected_parts[6] = array('textcode' => 'threeWay',		'name'=> '3 Way Joint Hose',			'icon'=>'img/engine.png');
$affected_parts[7] = array('textcode' => 'batteryS',		'name'=> 'Battery Sensor',				'icon'=>'img/engine.png');
$affected_parts[8] = array('textcode' => 'StabBarFr',		'name'=> 'Front Stabiliser Bar',		'icon'=>'img/Undercarriage_icon.png');
$affected_parts[9] = array('textcode' => 'doorMirrorSw',	'name'=> 'Door Mirror Switch',			'icon'=>'img/DoorMirror.png');
$affected_parts[10] = array('textcode' => 'eps',			'name'=> 'Electronic Power Steering',	'icon'=>'img/DoorMirror.png');
$affected_parts[11] = array('textcode' => 'ownerM',			'name'=> 'Replacement of Owner’s Manual',	'icon'=>'img/ownerManual.png');
$affected_parts[12] = array('textcode' => 'gpknob',			'name'=> 'Gear Pish Knob Button',	'icon'=>'img/pud_interior.png');
$affected_parts[13] = array('textcode' => 'fuelP', 'name'=> 'Fuel Pump', 'icon'=>'img/fuel_pump.png');
$affected_parts[14] = array('textcode' => 'engineBoltEarth', 'name'=> 'Engine Earth Bolt', 'icon'=>'img/earth_bolt_icon.png');
$affected_parts[15] = array('textcode' => 'acgTerminalNut', 'name'=> 'ACG Terminal Nut', 'icon'=>'img/ACG_terminal_nut_icon.png');

//$affected_parts[] = array('textcode' => 'batteryS',		'name'=> 'Battery Sensor');
//$affected_parts[] = array('textcode' => '',		'name'=> '');

$inspect_parts = array();

$affected_parts = array();
$result = $conn->query("SELECT * FROM affected_parts WHERE is_show=1 ORDER BY id DESC");
while($row = $result->fetch()) {
	$affected_parts[] = $row;
	if(@$row['todo']=='inspect'){
		$inspect_parts[] = $row['textcode'];
	}
}




// ------------------------------------------------------------------------------------------------------------------------

//code = car status sequence, very sensitive. do not change sequence or length of code.
//0 = not affected
//1 = affected
//sequence = airbag - battery - cvt - 3 way hose - battery sensor - stabiliser bar - door mirror switch - eps
//class is for css purposes


$model_list = array();
$result = $conn->query("SELECT * FROM model_list WHERE is_show=1 ORDER BY name");
while($row = $result->fetch()) {
	$model_list[] = $row;
}

$affected_list = array();
$result = $conn->query("SELECT * FROM affected_list ORDER BY model_id, year, part_id");
while($row = $result->fetch()) {
	
	$affected_list[$row['model_id']][$row['year']][] = $row['part_id'];
}


/*
$yearmodels = array(
	//accord
	array('model' => 'accord', 'year' => '2003', 'code' => '10000000', 'class' => ''),
	array('model' => 'accord', 'year' => '2004', 'code' => '10000000', 'class' => ''),
	array('model' => 'accord', 'year' => '2005', 'code' => '10000000', 'class' => ''),
	array('model' => 'accord', 'year' => '2006', 'code' => '10000000', 'class' => ''),
	array('model' => 'accord', 'year' => '2007', 'code' => '10000000', 'class' => ''),
	array('model' => 'accord', 'year' => '2008', 'code' => '10000000', 'class' => ''),
	array('model' => 'accord', 'year' => '2009', 'code' => '10000000', 'class' => ''),
	array('model' => 'accord', 'year' => '2010', 'code' => '10000000', 'class' => ''),
	array('model' => 'accord', 'year' => '2011', 'code' => '10000000', 'class' => ''),
	array('model' => 'accord', 'year' => '2012', 'code' => '10000000', 'class' => ''),
	array('model' => 'accord', 'year' => '2013', 'code' => '00010001', 'class' => ''),
	array('model' => 'accord', 'year' => '2014', 'code' => '00010001', 'class' => ''),
	array('model' => 'accord', 'year' => '2015', 'code' => '00010001', 'class' => ''),
	array('model' => 'accord', 'year' => '2016', 'code' => '00010001', 'class' => 'last'),
	//city
	array('model' => 'city', 'year' => '2003', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2004', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2005', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2006', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2007', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2008', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2009', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2010', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2011', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2012', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2013', 'code' => '11000000', 'class' => ''),
	array('model' => 'city', 'year' => '2014', 'code' => '01000000', 'class' => ''),
	array('model' => 'city', 'year' => '2015', 'code' => '01100000', 'class' => ''),
	array('model' => 'city', 'year' => '2016', 'code' => '01000000', 'class' => 'last'),
	//civic
	array('model' => 'civic', 'year' => '2001', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2002', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2003', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2004', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2005', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2006', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2007', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2008', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2009', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2010', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2011', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2012', 'code' => '01000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2013', 'code' => '01000000', 'class' => ''),
	array('model' => 'civic', 'year' => '2016', 'code' => '00010000', 'class' => 'last'),
	//crv
	array('model' => 'crv', 'year' => '2002', 'code' => '10000000', 'class' => ''),
	array('model' => 'crv', 'year' => '2003', 'code' => '10000000', 'class' => ''),
	array('model' => 'crv', 'year' => '2004', 'code' => '10000000', 'class' => ''),
	array('model' => 'crv', 'year' => '2005', 'code' => '10000000', 'class' => ''),
	array('model' => 'crv', 'year' => '2006', 'code' => '10000000', 'class' => ''),
	array('model' => 'crv', 'year' => '2007', 'code' => '10000000', 'class' => ''),
	array('model' => 'crv', 'year' => '2008', 'code' => '10000000', 'class' => ''),
	array('model' => 'crv', 'year' => '2009', 'code' => '10000000', 'class' => ''),
	array('model' => 'crv', 'year' => '2010', 'code' => '10000000', 'class' => ''),
	array('model' => 'crv', 'year' => '2011', 'code' => '10000000', 'class' => ''),
	array('model' => 'crv', 'year' => '2013', 'code' => '11000000', 'class' => 'last'),
	//crz
	array('model' => 'crz', 'year' => '2012', 'code' => '01000000', 'class' => ''),
	array('model' => 'crz', 'year' => '2013', 'code' => '01000000', 'class' => 'last'),
	//insight
	array('model' => 'insight', 'year' => '2011', 'code' => '11000000', 'class' => ''),
	array('model' => 'insight', 'year' => '2012', 'code' => '11000000', 'class' => ''),
	array('model' => 'insight', 'year' => '2013', 'code' => '11000000', 'class' => 'last'),
	//stream
	array('model' => 'stream', 'year' => '2003', 'code' => '10000000', 'class' => ''),
	array('model' => 'stream', 'year' => '2004', 'code' => '10000000', 'class' => ''),
	array('model' => 'stream', 'year' => '2005', 'code' => '10000000', 'class' => ''),
	array('model' => 'stream', 'year' => '2007', 'code' => '10000000', 'class' => ''),
	array('model' => 'stream', 'year' => '2008', 'code' => '10000000', 'class' => ''),
	array('model' => 'stream', 'year' => '2009', 'code' => '10000000', 'class' => ''),
	array('model' => 'stream', 'year' => '2010', 'code' => '10000000', 'class' => ''),
	array('model' => 'stream', 'year' => '2011', 'code' => '10000000', 'class' => ''),
	array('model' => 'stream', 'year' => '2012', 'code' => '10000000', 'class' => ''),
	array('model' => 'stream', 'year' => '2013', 'code' => '10000000', 'class' => 'last'),
	//jazz
	array('model' => 'jazz', 'year' => '2003', 'code' => '10000000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2004', 'code' => '10000000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2005', 'code' => '11000000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2006', 'code' => '10000000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2007', 'code' => '10000000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2009', 'code' => '11000000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2010', 'code' => '10000000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2011', 'code' => '10000000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2012', 'code' => '11000000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2013', 'code' => '11000000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2015', 'code' => '01100000', 'class' => ''),
	array('model' => 'jazz', 'year' => '2016', 'code' => '01000000', 'class' => 'last'),
	//odyssey
	array('model' => 'odyssey', 'year' => '2004', 'code' => '10000000', 'class' => ''),
	array('model' => 'odyssey', 'year' => '2005', 'code' => '10000000', 'class' => ''),
	array('model' => 'odyssey', 'year' => '2006', 'code' => '10000000', 'class' => ''),
	array('model' => 'odyssey', 'year' => '2007', 'code' => '10000000', 'class' => ''),
	array('model' => 'odyssey', 'year' => '2008', 'code' => '10000000', 'class' => ''),
	array('model' => 'odyssey', 'year' => '2014', 'code' => '00000001', 'class' => ''),
	array('model' => 'odyssey', 'year' => '2015', 'code' => '00000001', 'class' => ''),
	array('model' => 'odyssey', 'year' => '2016', 'code' => '00000001', 'class' => ''),
	array('model' => 'odyssey', 'year' => '2017', 'code' => '00000001', 'class' => 'last'),
	//freed
	array('model' => 'freed', 'year' => '2009', 'code' => '10000000', 'class' => ''),
	array('model' => 'freed', 'year' => '2010', 'code' => '11000000', 'class' => ''),
	array('model' => 'freed', 'year' => '2011', 'code' => '11000000', 'class' => ''),
	array('model' => 'freed', 'year' => '2012', 'code' => '11000000', 'class' => 'last'),
	//civic-r
	array('model' => 'civic-r', 'year' => '2007', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic-r', 'year' => '2008', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic-r', 'year' => '2010', 'code' => '10000000', 'class' => 'last'),
	//civic hybrid
	array('model' => 'civic-hybrid', 'year' => '2003', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic-hybrid', 'year' => '2007', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic-hybrid', 'year' => '2008', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic-hybrid', 'year' => '2009', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic-hybrid', 'year' => '2010', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic-hybrid', 'year' => '2011', 'code' => '10000000', 'class' => ''),
	array('model' => 'civic-hybrid', 'year' => '2012', 'code' => '10000000', 'class' => 'last'),
	//jazz hybrid
	array('model' => 'jazz-hybrid', 'year' => '2012', 'code' => '10000000', 'class' => ''),
	array('model' => 'jazz-hybrid', 'year' => '2013', 'code' => '10000000', 'class' => 'last'),
	// hrv
	array('model' => 'hrv', 'year' => '2016', 'code' => '00000100', 'class' => ''),
	array('model' => 'hrv', 'year' => '2018', 'code' => '00000001', 'class' => 'last')
);
*/