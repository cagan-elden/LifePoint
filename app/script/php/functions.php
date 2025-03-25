<?php

// database include
// include '../../../databaseConn.php';

// function to delete friend requests
function delFriendReq (int $notifId) {
    $query = 'DELETE FROM notification WHERE notificationId=:id';

    $deleteReq = $conn->prepare($query);
    $deleteReq->bindParam(':id', $notifId, PDO::PARAM_INT);
    $execReq = $deleteReq->execute();

    // test case
    if ($execReq) {
        echo "request successfully deleted...";
    } else {
        echo "request couldn't get deleted..."
    }
}

?>