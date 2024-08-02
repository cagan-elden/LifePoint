<?php

include '../databaseConn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['date'])) {
    $dateStr = $_GET['date'];
    $date = DateTime::createFromFormat('Y-m-d', $dateStr);

    if ($date) {
        echo $date->format('d.m.Y');
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
        let parseDate = (dateStr) => {
            var parts = dateStr.split(".");

            var day   = parseInt(parts[0], 10);
            var month = parseInt(parts[1], 10);
            var year  = parseInt(parts[2], 10);

            return new Date(year, month, day);
        }

        // Variables
        var date = <?php echo json_encode($date); ?>;
        date = parseDate(date);
        var updatedDate = new Date();
        updatedDate.setDate(date.getDate() + 1);
        var counter  = 5;
        var dashCounter = 1;
        const dataId = [0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F']; // Hexadecimals used (128 combinations total)
        var listId   = []; // Store id's

        // Functions
        var createId = () => {
            funcLoop = true;
            while (funcLoop === true) {
                var id = [];

                for (let i = 0; i <= 8; i++) {
                    var char = dataId[Math.floor(Math.random()*dataId.length)];
                    id.push(char);
                }

                var stringId = id.join('');
                if (listId.indexOf(stringId) === -1) {
                    listId.push(stringId);
                    return stringId;
                }
            }
        }

            $(document).ready(function(){
                $('#element').find('.time').attr('name',createId());
                $('#element').find('.detail').attr('name',createId());
                for (let i = 0; i < 4; i++) {
                    $('#element').first().clone().appendTo('ul');
                    $('#element').first().find('.time').attr('name', createId());
                    $('#element').find('.detail').attr('name', createId());
                }
                $('#addNewElement').click(function(event){
                    event.preventDefault();

                    $('#element').first().clone().appendTo($('ul'));
                    $('#element').find('.time').attr('name', createId());
                    $('#element').find('.detail').attr('name', createId());

                    // Stop new input fields
                    counter++;
                    if (counter === 10) {
                        $(this).prop('disabled', true);
                    }
                    $('#removeElement').prop('disabled', false);
                });
                $('#removeElement').click(function(event){
                    event.preventDefault();
                    $('ul li').not(':first').last().remove();

                    // Enable new input fields
                    if (counter > 1) {
                        counter--;
                        $('#addNewElement').prop('disabled', false);
                    } else if (counter === 1) {
                        $(this).prop('disabled', true);
                    }
                });

                $('#createNewDash').click(function(event){
                    event.preventDefault();
                    if (dashCounter === 5) {
                        return false;
                    } else {
                        $('.dashboard').first().clone().appendTo('.dashes');
                        dashCounter++;
                    }
                });
            });
        </script>
</body>
</html>