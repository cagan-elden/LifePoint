<?php

include '../databaseConn.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lifePoint - Dashboard</title>

    <!-- CSS Imports -->
    <link rel="stylesheet" href="../source/frontend/css/style.css">
</head>
<body>
    <div class="container">
    <?php

        include "header.php";
        include "dashboard/main.php";

    ?>
    </div>
</body>
</html>