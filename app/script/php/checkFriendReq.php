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

                    <button id="acceptReq">Accept</button>
                    <button id="rejectReq">Reject</button>
                </div>

            <?php
        }
        ?>

        <?php
    }
}

?>