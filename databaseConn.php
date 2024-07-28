<?php

$db_name = 'lifepoint';
$db_type = 'mysql';

$host = 'localhost';
$user = 'root';
$pass = '';

$dsn = "$db_type:host=$host;dbname=$db_name";

try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>