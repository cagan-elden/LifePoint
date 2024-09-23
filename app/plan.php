<?php

include '../databaseConn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['date']) && isset($_GET['amount'])) {
    $dateStr = $_GET['date'];
    $dateUpd = DateTime::createFromFormat('Y-m-d', $dateStr);

    if ($dateUpd) {
        echo $dateUpd->format('d.m.Y');
    } else {
        echo 'Invalid Date';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifePoint - Plan</title>

    <!-- CSS Imports -->
     <link rel="stylesheet" href="../source/frontend/css/style.css">

    <!-- Library Imports -->
     <script src="../source/library/jquery.js"></script>
</head>
<body>
    <?php
    
    $date = date('d.m.Y');

    include 'header.php';
    include 'plan/main.php';

    ?>

    <!-- Javascript Imports -->
     <script src="../source/frontend/javascript/headerDropdownMenu.js"></script>

    <!-- JQuery -->
    <script src="../source/frontend/jquery/dayPlanningScript.js"></script>
</body>
</html>