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
    <title>Document</title>

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
    <script>
        var dashes = [0];
        var dashElementHandler = [5];

        $(document).ready(function(){
            // Need the code below for creating 5 elements
            for (var createElement=0; createElement < 4; createElement++) {
                var element = $('#element').first().clone();
                $(element).appendTo('.dashBody ul');
            }

            $('#addNewElement').click(function(event){
                event.preventDefault();

                var parentDash = $(this).parent();
                var parentIndex = parentDash.index();

                if (dashElementHandler[parentIndex-1] === 10) {
                    var newElementButton = $(parentDash).eq(parentIndex-1).find(this);
                    $(newElementButton).prop('disabled', true);

                } else {
                    var cloneElement = $('.dashBody ul').eq(parentIndex-1).find('#element').first().clone();
                    $(cloneElement).appendTo('.dashBody ul').eq(parentIndex-1);

                    dashElementHandler[parentIndex-1]++;
                }
            });
        });

    </script>
</body>
</html>