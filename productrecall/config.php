<?php

$envFile = __DIR__ . '/.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && !str_starts_with(trim($line), '#')) {
            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

if (!session_id()) {
    ini_set('session.use_cookies', 1);
    ini_set('session.cookie_httponly', 1);
    ini_set('session.cookie_secure', 1);
}
session_start();
$GLOBAL_DATETIME = "Asia/Kuala_Lumpur";
date_default_timezone_set($GLOBAL_DATETIME);

try {
    $conn = new PDO('mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME_PUD'] . ';charset=utf8mb4', $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]); 
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$meta_name = "";
$meta_url = rtrim($_ENV['APP_URL'] ?? 'https://localhost', '/') . "/productrecall";
$meta_keywords = "product, update, honda, safety";
$meta_desc = "Your safety is always our top priority at Honda. If your car is affected, please get it repaired at an authorized dealer as soon as possible.";
$meta_author = "Honda Malaysia";
$meta_image = rtrim($_ENV['APP_URL'] ?? 'https://localhost', '/') . "/productrecall/img/fb_thumbnail.jpg";
$meta_title = "Product Recall | Honda Malaysia";
