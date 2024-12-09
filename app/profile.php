<?php

session_start();

function sendReq() {
    include "../databaseConn.php";
    $accountOwner = intval($_GET['id']);

    $query = "SELECT friendOutro FROM friend WHERE friendIntro=:id";
    $getFr = $conn->prepare($query);
    $getFr->bindParam(":id", $accountOwner, PDO::PARAM_STR);
    $getFr->execute();

    $isFriend = $getFr->rowCount();

    // Checking if the user is already friend with this user.
    if ($isFriend == 0) {

        $query = "INSERT INTO notification SET notificationFrom=:from, notificationTo=:to, notificationType='friend'";
        $sendReq = $conn->prepare($query);
        $sendReq->bindParam(':from', intval($_SESSION['userId']), PDO::PARAM_INT);
        $sendReq->bindParam(':to', $accountOwner, PDO::PARAM_INT);
        $sendReq->execute();

        if ($sendReq) {
            echo "Request sent";
        } else {
            echo "Some error occured...";
        }
    }
}

sendReq();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$page = $_GET['page'];

switch ($page) {
    case 'profile':

        include "../databaseConn.php";

        $user = $_GET['id'];

        $query = "SELECT type,username,lifePoint,displayName FROM user WHERE userId=:id";
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

        $friend=false;
        if ($isFriend != 0) {
            $friend=true;
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

            if ($isPrivate['type'] == 'private' && $_SESSION['userId'] != $user || $isFriend != 1) {
                include "header.php";
                include "profile/main.php";
            } elseif ($isPrivate['type'] == 'ban') {
                include "header.php";
                include "profile/main.php";
            }

            ?>
            </div>
            
            <script src="../source/frontend/javascript/headerDropdownMenu.js"></script>
            <script src="../source/frontend/javascript/profilePicBigger.js"></script>
            
            <!-- Dialog to make profile photo bigger. -->
            <dialog id="pfpBigDialog">
                <img src="<?php echo $_SESSION['profilePic']; ?>" alt="" id="profilePic">
            </dialog>

            <!-- JavaScript Imports -->
            <!-- JQuery/Ajax -->
             <script src="../source/library/jquery.js"></script>

             <script>
                let user = <?php echo json_encode($user); ?>;
                console.log(user);
            </script>

             <script src="friend/sendReq.js"></script>
        </body>
        </html>
<?php

    }

?>