<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username    = strip_tags(trim($_POST['username']));
    $password    = strip_tags($_POST['password']);
    $passwordRep = strip_tags($_POST['passwordRep']);
    $remember    = isset($_POST['remember']) ? $_POST['remember'] : false;

    // Honeypot Protection
    $honeypots = ['superPopcorn', 'deadMeat', 'fatHat', 'grandGoo', 'infiniteCard'];

    // Honeypot Control
    foreach ($honeypots as $field) {
        if (!empty($_POST[$field])) { setErrorMessage('Bot detected'); exit; }
    }

    // User fields control
    if (empty($username)) { setErrorMessage('Username cannot be empty'); exit; }
    if (empty($password)) { setErrorMessage('Password cannot be empty'); exit; }
    if ($password < 8) { setErrorMessage('Password must be minimum 8 characters long'); exit; }
    if (empty($passwordRep)) { setErrorMessage('Password repetition cannot be empty'); exit; }
    if ($password !== $passwordRep) { setErrorMessage('Passwords do not match'); exit; }

    // Username control
    $query = "SELECT username FROM user WHERE username=:username";
    $usernameDB = $conn->prepare($query);
    $usernameDB->bindParam(':username', $username, PDO::PARAM_STR);
    $usernameDB->execute();
    $usernameCheck = $usernameDB->rowCount();

    if ($usernameCheck) {
        // Password Control
        $query = "SELECT password FROM user WHERE username=:username";
        $passwordDB = $conn->prepare($query);
        $passwordDB->bindParam(':username', $username, PDO::PARAM_STR);
        $passwordDB->execute();
        $passwordHash = $passwordDB->fetch(PDO::FETCH_ASSOC);

        if (password_verify($password, $passwordHash['password'])) {
            // Start Login Process & Get User Deatils
            $query = "SELECT * FROM user WHERE username=:username";
            $userDB = $conn->prepare($query);
            $userDB->bindParam(':username', $username, PDO::PARAM_STR);
            $userDB->execute();
            $user = $userDB->fetch(PDO::FETCH_ASSOC);

            // Create Session Tokens
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

            if ($remember) {
                // Create Remember Tokens
                $token = bin2hex(random_bytes(16));
                $tokenHash = password_hash($token, PASSWORD_DEFAULT);
                $expire = date("Y-m-d H:i:s", strtotime("+30 days"));
    
                $query = "UPDATE user SET rememberToken=:token, rememberTokenExpire=:expire WHERE userId=:id";
                $insertToken = $conn->prepare($query);
                $insertToken->bindParam(':token', $token, PDO::PARAM_STR);
                $insertToken->bindParam(':expire', $expire, PDO::PARAM_STR);
                $insertToken->bindParam(':id', $user['userId'], PDO::PARAM_INT);
                $insertToken->execute();
    
                setcookie('remember_token', $tokenHash, time() + (86400 * 30), "/", "", true, true);
                setcookie('user_id', $_SESSION['userId'], time() + (86400 * 30), "/", "", true, true);
            }

            header('location: ../app/dashboard.php');
            exit;

        }else{ setErrorMessage('Your password is wrong.'); exit; }
    } else { setErrorMessage('There is no user with the username of '.htmlspecialchars($username)); exit; }
}

?>