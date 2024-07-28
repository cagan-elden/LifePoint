<?php

include '../databaseConn.php';

session_start();
$monthArray = array(
    '01' => 'January',
    '02' => 'Febuary',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December');

function isLeapYear($year) {
    return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
}

$monthDay = array(
    '01' => 31,
    '02' => isLeapYear(date('y')) ? 29 : 28,
    '03' => 31,
    '04' => 30,
    '05' => 31,
    '06' => 30,
    '07' => 31,
    '08' => 31,
    '09' => 30,
    '10' => 31,
    '11' => 30,
    '12' => 31
);

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