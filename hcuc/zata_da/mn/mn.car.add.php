<?php 
session_start(); 
if( !isset($_SESSION['user']) ) exit();

function referer($file) {
    if(isset($_SERVER['HTTP_REFERER'])){
        $refer = $_SERVER['HTTP_REFERER'];
        $arr = explode('/', $refer);
        $count = count($arr);
        if($arr[$count - 2] == $file){
            exit('Alert: Hacker log recorded.');
        }
    }else{
        exit('Hacker log recorded.');
    }
}referer('mn');

include '../config.php';
include '../class/addcar.class.php';

$DATA = [];

$mainImg = !empty($_FILES['mainImg']['name']) ? $_FILES['mainImg'] : '' ;
$gallery = !empty($_FILES['gallery']['name'][0]) ? $_FILES['gallery'] : [] ;

$title = isset($_POST['title']) ? $_POST['title'] : '' ;
$model = isset($_POST['model']) ? $_POST['model'] : '' ;
$price = isset($_POST['price']) ? $_POST['price'] : '' ;
$manufacturingYr = isset($_POST['manufacturingYr']) ? $_POST['manufacturingYr'] : '' ;
$registrationDate = isset($_POST['registrationDate']) ? $_POST['registrationDate'] : '' ;
$bodyType = isset($_POST['bodyType']) ? $_POST['bodyType'] : '' ;
$drivenWheel = isset($_POST['drivenWheel']) ? $_POST['drivenWheel'] : '' ;
$engineCapacity = isset($_POST['engineCapacity']) ? $_POST['engineCapacity'] : '' ;
$transmission = isset($_POST['transmission']) ? $_POST['transmission'] : '' ;
$mileage = isset($_POST['mileage']) ? $_POST['mileage'] : '' ;
$color = isset($_POST['color']) ? $_POST['color'] : '' ;
$warranty = isset($_POST['warranty']) ? $_POST['warranty'] : '' ;
$location = isset($_POST['location']) ? $_POST['location'] : '' ;
$regno = isset($_POST['regno']) ? $_POST['regno'] : '' ;
$spec = isset($_POST['spec']) ? $_POST['spec'] : '' ;
$hist = isset($_POST['hist']) ? $_POST['hist'] : '' ;

$status = $_POST['status'] == 0 ? 0 : 1 ;
$featured = $_POST['featured'] == 1 ? 1 : 0 ;
$recent = $_POST['recent'] == 1 ? 1 : 0 ;
$lmileage = $_POST['lmileage'] == 1 ? 1 : 0 ;
$lprice = $_POST['lprice'] == 1 ? 1 : 0 ;

$LOC = "../src/car";

if( !empty($mainImg) ){
    $mainImg = $ADDCAR->uploadimg($mainImg, $LOC); 
}
if( !empty($gallery) ){
    $gal = [];
    foreach($gallery['name'] as $k => $v){
         array_push($gal, $ADDCAR->uploadimgBulk($gallery, $LOC, $k));
    }  
    $gallery = $gal;
}
$gallery = json_encode($gallery, true);
$stmt = $CON->stmt_init();
$stmt -> prepare(
    "INSERT INTO car 
    ( _spec, _hist, _mainImg, _gallery, _title, _model, _price, _manufacturingYr, _registrationDate, _bodyType, _drivenWheel, _engineCapacity, _transmission, _mileage, _color, _warranty, _location, _regno, _status, _featured, _recent, _lmileage, _lprice, _date)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW());"
);
$stmt -> bind_param(
    'ssssssssssssssssssiiiii',  
    $spec, $hist, $mainImg, $gallery, $title, $model, $price, $manufacturingYr, $registrationDate, $bodyType, $drivenWheel, $engineCapacity, $transmission, $mileage, $color, $warranty, $location, $regno, $status, $featured, $recent, $lmileage, $lprice
);

if( !$stmt -> execute() ){ 
    printf("Error: %s.\n", $stmt->error);
    exit('Data not saved.');
} else {
    $NID = $stmt->insert_id;
    $res = $CON->query("SELECT * FROM car WHERE id='$NID';");

    while( $info = $res->fetch_assoc() ){
        array_push($DATA, $info);
    }
}

 echo json_encode($DATA, true);