<?php
include_once __DIR__."/../../gen_cong.php";

$protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
$protocol = $protocol.'://'.$_SERVER['SERVER_NAME'].'/'.PROTOCOL;
// $protocol = $protocol.'://'.$_SERVER['SERVER_NAME'].'/demo/honda/';
//$protocol = $protocol.'://'.$_SERVER['SERVER_NAME'].'/';

// Use APP_URL from environment if available, otherwise fall back to dynamic server name
$appUrl = $_ENV['APP_URL'] ?? $protocol;
if (!empty($_ENV['APP_URL'])) {
    $protocol = rtrim($_ENV['APP_URL'], '/');
}

define('HEIMPATH', $protocol); 