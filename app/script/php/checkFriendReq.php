<?php

$query = 'SELECT * FROM notification WHERE notificationTo=:client';
$prepareReq = $conn->prepare($query);
$prepareReq->bindParam(':client', $_SESSION['userId'], PDO::PARAM_INT);
$prepareReq->execute();

$numReq = $prepareReq->rowCount();

if ($numReq > 0) {
    $getReq = $prepareReq->fetchAll(PDO::FETCH_ASSOC);

    foreach ($getReq as $req) {
        $query = 'SELECT profilePic, userId, username FROM user WHERE userId=:id';
        $prepareDataQuery = $conn->prepare($query);
        $prepareDataQuery->bindParam(':id', $req['notificationFrom']);
        $prepareDataQuery->execute();
        $userData = $prepareDataQuery->fetch(PDO::FETCH_ASSOC);

        ?>
        <div class="friendNotify">
            <img src="<?php echo $userData['profilePic']; ?>" id="profilePicture">
            <span id="notificationNum"><?php echo $numReq; ?></span>
        </div>
        <?php
    }
}

?>