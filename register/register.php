<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lifePoint - Register</title>

    <link rel="stylesheet" href="register.css">

</head>
<body>
    <div class="container">
        <?php
        include "header.htm";
        include '../databaseConn.php';
        include '../messages.php';
        displayErrorMessage();
        include 'registerScript.php';
        include "registerForm.php";
        include "footer.htm";
        ?>
    </div>
</body>
</html>