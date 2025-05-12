<?php

session_start();

include '../config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifePoint - Search</title>

    <link rel="stylesheet" href="../source/frontend/css/style.css">
</head>
<body>
    <?php
    
    include '../databaseConn.php';
    include 'header.php';
    include 'search/searchMain.php';
    
    ?>

    <script src="../source/library/jquery.js"></script>
    <script src="../source/frontend/jquery/getUserDetFriendReq.js"></script>
</body>
</html>