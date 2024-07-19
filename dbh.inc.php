<?php

$host = 'localhost';
$dbusername = 'NightMare';
$dbpassword = 'brayk17';
$dbname = 'online university election';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
         