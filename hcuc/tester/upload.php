<?php
if (!file_exists('src')) {
    mkdir('src', 0777, true);
}

$DATA = [];
$file = $_FILES['file'];

$fileN = $file['name'];
$fileTmp = $file['tmp_name'];
$fileS = $file['size'];
$fileE = $file['error'];
$fileTyp = $file['type'];

$getExt = explode('.', $fileN);
$fileExt = strtolower(end($getExt));
$loc = "src/";

//$newN = date("ymdhis").'.'.base_convert(uniqid('', true),10,30).'.'.$fileExt;
$newN = date("ymd").'.'.base_convert(uniqid('', true),10,30).'.'.$fileExt;
$dest = $loc . $newN;
move_uploaded_file($fileTmp, $dest);

$DATA['filename'] = $newN;

echo json_encode($DATA,true);