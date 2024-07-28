<?php

include '../databaseConn.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS Imports -->
     <link rel="stylesheet" href="../source/frontend/css/style.css">

    <!-- Library Imports -->
     <script src="../source/library/jquery.js"></script>
</head>
<body>
    <?php
    
    include 'header.php';
    include 'plan/main.php';
    
    ?>

    <!-- Javascript Imports -->
     <script src="../source/frontend/javascript/headerDropdownMenu.js"></script>

    <!-- JQuery -->
    <script src="script/JQuery/planJquery.js">
    </script>
</body>
</html>