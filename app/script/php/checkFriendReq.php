<?php

$query = 'SELECT notificationFrom FROM notification WHERE notificationTo=:to and notificationType="friend"';

$getNotif = $conn->prepare($query);
$getNotif->bindParam(':to', $_SESSION['userId'], PDO::PARAM_INT);
$getNotif->execute();

$notifIds = $getNotif->fetchAll();
$notifNum = $getNotif->rowCount();

foreach ($notifIds as $notif) {

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        $query = 'SELECT username, displayName, userId, profilePic FROM user WHERE userId=:id';

        $getUser = $conn->prepare($query);
        $getUser->bindParam(':id', $notif['notificationFrom'], PDO::PARAM_INT);
        $getUser->execute();

        $user = $getUser->fetch(PDO::FETCH_ASSOC);

        if ($notifNum > 0) {
            ?>

                <div class="friendNotify">
                    <img src="<?php echo $user['profilePic'] ?>" id="profilePicture">
                    <span id="notificationNum"><?php echo $notifNum; ?></span>
                </div>

                <div class="friendDetail">
                    <a href="#">
                        <img src="../source/image/profile/default.jpg" id="profilePic" draggable="false">
                        <h2 id="displayName">John Doe</h2>
                        <span id="username">johndoe</span>
                    </a>

                    <input type="hidden" name="userId" id="userId" value="<?php echo $user['userId']; ?>">
                    <input type="hidden" name="notificationId" id="notificationId" value="<?php echo $notif['notificationId']; ?>">

                    <button id="acceptReq">Accept</button>
                    <button id="rejectReq">Decline</button>
                </div>

            <?php
        }
    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $notificationId = $_POST['notifId'];
        $userId         = $_POST['id'];
        $req            = $_POST['req'];

        if ($req == 1) {
            $query = 'INSERT INTO friend SET friendIntro=:client, friendOutro=:sender';

            $createFriendship = $conn->prepare($query);
            $createFriendship->bindParam(':client', $_SESSION['userId'], PDO::PARAM_INT);
            $createFriendship->bindParam(':sender', $userId, PDO::PARAM_INT);
            $executeQuery = $createFriendship->execute();

            if ($executeQuery) {
                echo "Friend request successfully created";
            } else {
                echo "There is a problem with the system";
            }
        } else if ($req == 0) {
        }
    }
}

?>