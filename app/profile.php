<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

$page = $_GET['page'];

switch ($page) {
    case 'profile':

        include "../databaseConn.php";

        $user = $_GET['id'];

        $query = "SELECT type FROM user WHERE userId=:id";
        $checkPrivate = $conn->prepare($query);
        $checkPrivate->bindParam(':id', $user, PDO::PARAM_INT);
        $checkPrivate->execute();
        $isPrivate = $checkPrivate->fetch(PDO::FETCH_ASSOC);

        $query = "SELECT * FROM friend WHERE friendOutro=:client AND friendIntro=:content OR friendOutro=:content AND friendIntro=:client";
        $checkFriend = $conn->prepare($query);
        $checkFriend->bindParam(':client', $_SESSION['userId'], PDO::PARAM_INT);
        $checkFriend->bindParam(':content', $user, PDO::PARAM_INT);
        $checkFriend->execute();
        $isFriend = $checkFriend->rowCount();

        if ($isPrivate['type'] == 'private' && $_SESSION['userId'] != $user && $isFriend != 1) {
            ?>
            <div class="serverMessage" id="warning">
                <span id="message">This account is private...</span>
            </div>
            <?php
        } elseif ($isPrivate['type'] == 'ban') {
            echo 'this acount is banned...';
        }

        ?>
            
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>lifePoint - Profile</title>
            
            <link rel="stylesheet" href="../source/frontend/css/style.css">
        </head>
        <body>
            <div class="container">
            <?php
            
                include "header.php";
                include "profile/main.php";
            
            ?>
            </div>
            
            <script src="../source/frontend/javascript/headerDropdownMenu.js"></script>
            <script src="../source/frontend/javascript/profilePicBigger.js"></script>
            
            <!-- Dialog to make profile photo bigger. -->
            <dialog id="pfpBigDialog">
                <img src="<?php echo $_SESSION['profilePic']; ?>" alt="" id="profilePic">
            </dialog>
        </body>
        </html>
<?php

    }

?>