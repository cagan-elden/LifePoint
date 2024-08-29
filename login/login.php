<?php

include '../databaseConn.php';

if (isset($_COOKIE['remember_token']) && isset($_COOKIE['user_id'])) {
    include 'autoLogin.php';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lifePoint - Login</title>

    <link rel="stylesheet" href="login.css">

</head>
<body>
    <div class="container">
        <?php
        include "header.htm";
        include '../messages.php';
        displayErrorMessage();
        include 'loginScript.php';
        include "loginForm.php";
        include "footer.htm";
        ?>
    </div>
</body>
</html>