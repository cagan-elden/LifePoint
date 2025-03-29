<?php
$query = 'SELECT friendOutro FROM friend WHERE friendIntro=:friend';
$friendCount = $conn->prepare($query);
$friendCount->bindParam(':friend', $_SESSION['userId'], PDO::PARAM_INT);
$friendCount->execute();
$friendNum = $friendCount->rowCount();

// Check if user has friends or not
if ($friendNum) {
    $friends = $friendCount->fetchAll(PDO::FETCH_ASSOC);
    
    // Fetch all friends
    foreach ($friends as $friend) {
        $query = 'SELECT profilePic, displayName, username FROM user WHERE userId=:friendOutro';
        $getFriend = $conn->prepare($query);
        $getFriend->bindParam(':friendOutro', $friend['friendOutro'], PDO::PARAM_INT);
        $getFriend->execute();
        $friend = $getFriend->fetch(PDO::FETCH_ASSOC);

        ?>
        <div class="friend">
            <img src="<?php echo $friend['profilePic'] ?>" id="pfp">
            <span id="displayName"><?php echo $friend['displayName']; ?></span>
            <span id="username"><?php echo $friend['username'] ?></span>
        </div>
        <?php
    }

} else {
    ?>
    <b id="detail">You don't have any friends...</b>
    <?php
}
?>