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
    <script>
        var counter = 5;

        $(document).ready(function(){

            // Functions here
            var createFive = () => {
                for (var i=0; i < 4; i++) {
                    var newElement = $('#element').clone().first();
                    newElement.appendTo('.dashBody ul');
                    newElement.find('.time').val('');
                    newElement.find('.detail').val('');
                }
            }

            var btnSitControl = (paramBtn, paramSit) => {
                if ($(paramBtn).prop('disabled', paramSit)) {
                    $(paramBtn).prop('disabled', !paramSit);
                }
            }

            createFive();

            // Main here
            $('#addNewElement').click(function(event){
                event.preventDefault();

                if (counter <= 14) {
                    var element = $('#element').clone().first();
                    element.appendTo('.dashBody ul');
                    element.find('.time').val('');
                    element.find('.detail').val('');

                    btnSitControl('#removeElement', true);
                    counter++;
                } else {
                    btnSitControl('#addNewElement', false);
                }
            });

            $('#removeElement').click(function(event){
                event.preventDefault();

                if (counter > 1) {
                    var element = $('#element').remove().last();
                    btnSitControl('#addNewElement', true);
                    counter--;
                } else {
                    btnSitControl('#removeElement', false);
                }
            });

        });
    </script>
</body>
</html>