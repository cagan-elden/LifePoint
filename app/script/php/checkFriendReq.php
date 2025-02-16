<?php

$query = 'SELECT * FROM notification WHERE notificationTo=:client';
$prepareReq = $conn->prepare($query);
$prepareReq->bindParam(':client', $_SESSION['userId'], PDO::PARAM_INT);
$prepareReq->execute();

$numReq = $prepareReq->rowCount();

if ($numReq > 0) {
    $getReq = $prepareReq->fetchAll(PDO::FETCH_ASSOC);

    $reqOrder = array(); // Stores the requests by request id and decides which to show

    foreach ($getReq as $req) {
        array_push($reqOrder, $req['notificationId']);
    }
}

?>

<!--

            <div class="friendNotify">
                <img src="" id="profilePicture">
                <span id="notificationNum"></span>
            </div>

            <div class="friendDetail">
                <a href="#">
                    <img src="../source/image/profile/default.jpg" id="profilePic" draggable="false">
                    <h2 id="displayName">John Doe</h2>
                    <span id="username">johndoe</span>
                </a>

                <button id="acceptReq">Accept</button>
                <button id="rejectReq">Reject</button>
            </div>

-->