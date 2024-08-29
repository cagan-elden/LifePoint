<?php

$userId      = $_COOKIE['user_id'];
$tokenCookie = $_COOKIE['remember_token'];

$query = "SELECT * FROM user WHERE userId=:id AND rememberTokenExpire>NOW()";
$getUser = $conn->prepare($query);
$getUser->bindParam(':id', $userId, PDO::PARAM_INT);
$getUser->execute();

$user = $getUser->fetch(PDO::FETCH_ASSOC);
$tokenSQL = $user['rememberToken'];

if (password_verify($tokenSQL, $tokenCookie)) {
    session_start();
    session_regenerate_id(true);

    $_SESSION['userId']      = $user['userId'];
    $_SESSION['displayName'] = $user['displayName'];
    $_SESSION['profilePic']  = $user['profilePic'];
    $_SESSION['username']    = $user['username'];
    $_SESSION['email']       = $user['Email'];
    $_SESSION['lifePoint']   = $user['lifePoint'];
    $_SESSION['daystreak']   = $user['daystreak'];
    $_SESSION['type']        = $user['type'];

    header('location: ../app/dashboard.php');
    exit;
} else {
    exit("There is a problem with auto login");
}

?>