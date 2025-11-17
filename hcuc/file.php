<?php
session_start();
if( !isset($_SESSION['member']) ) {
    exit('Session Expired');
}
if(isset($_GET['file'])) {
    $file = $_GET['file'];
    $extension = explode('.',$file);
    $extension = end($extension);
    $path = "zata_da/src/doc/private/$file";
    
    if( $extension=='pdf' ){ 
        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename='.$path);
        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');

        readfile($path);
    }elseif( $extension=='zip' ){ 
        header("Content-type: application/zip"); 
        header("Content-Disposition: attachment; filename=$path");
        header("Content-length: " . filesize($path));
        header("Pragma: no-cache"); 
        header("Expires: 0"); 
        
        readfile("$path");
    } 
}
