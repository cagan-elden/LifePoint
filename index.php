<?php

session_start();

$redirectUrl = isset($_SESSION['userId']) ? 'app/dashboard.php' : 'login/login.php';
header('location: ' . $redirectUrl);
exit;

?>