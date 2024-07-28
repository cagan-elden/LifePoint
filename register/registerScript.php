<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $superPopcorn = strip_tags($_POST['superPopcorn']);
    $displayName  = strip_tags($_POST['displayname']);
    $username     = strip_tags(trim($_POST['username']));
    $email        = strip_tags($_POST['email']);
    $password     = strip_tags($_POST['password']);
    $passwordRep  = strip_tags($_POST['passwordrep']);
    $remember     = isset($_POST['remember']) ? 1 : 0;

    if ($superPopcorn) {
        setErrorMessage('Honeypot protection active...');
    }

    if (empty($username)) { setErrorMessage("Username cannot be empty."); header('location: register.php'); exit; }
    if (empty($email)) { setErrorMessage("Email cannot be empty."); header('location: register.php'); exit; }
    if (empty($password)) { setErrorMessage("Password cannot be empty."); header('location: register.php'); exit; }
    if (empty($passwordRep)) { setErrorMessage("You must repeat your password."); header('location: register.php'); exit; }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { setErrorMessage("Your email is not valid."); header('location: register.php'); exit; }
    if (strlen($password) < 8) { setErrorMessage("Password must at least contain 8 characters."); header('location: register.php'); exit; }
    if ($password != $passwordRep) { setErrorMessage("You have repeated your password false."); header('location: register.php'); exit; }

    $query = "SELECT username FROM user WHERE username=:username";
    $searchSameUser = $conn->prepare($query);
    $searchSameUser->bindParam(':username', $username, PDO::PARAM_STR);
    $searchSameUser->execute();
    $sameUser = $searchSameUser->fetchColumn();

    if (!$sameUser) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (displayName, username, profilePic, Email, password, type) VALUES (:displayName, :username, '../source/image/profile/default.jpg', :email, :password, 'private')";
        $createUser = $conn->prepare($query);
        $createUser->bindParam(':displayName', $displayName, PDO::PARAM_STR);
        $createUser->bindParam(':username', $username, PDO::PARAM_STR);
        $createUser->bindParam(':email', $email, PDO::PARAM_STR);
        $createUser->bindParam(':password', $passwordHash, PDO::PARAM_STR);
        $createUser->execute();

        $query = "SELECT userId FROM user WHERE username=:username";
        $getId = $conn->prepare($query);
        $getId->bindParam(':username', $username, PDO::PARAM_STR);
        $getId->execute();
        $id = $getId->fetch(PDO::FETCH_ASSOC);

        if ($remember) {
            $token = bin2hex(random_bytes(16));
            $tokenHash = password_hash($token, PASSWORD_DEFAULT);
            $expire = date("Y-m-d H:i:s", strtotime("+30 days"));

            $query = "UPDATE user SET rememberToken=:token, rememberTokenExpire=:expire WHERE userId=:id";
            $insertToken = $conn->prepare($query);
            $insertToken->bindParam(':token', $tokenHash, PDO::PARAM_STR);
            $insertToken->bindParam(':expire', $expire, PDO::PARAM_STR);
            $insertToken->bindParam(':id', $id['userId'], PDO::PARAM_INT);
            $insertToken->execute();

            setcookie('remember_token', $token, time() + (86400 * 30), "/", "", true, true);

            if (!$_COOKIE['remember_token']) {
                setErrorMessage('Successful register but not able to remember you, try logging manually.');
                exit;
            }
        }
        if ($createUser) {
            header('location: ../login/login.php');
        } else { setErrorMessage("Failed to register, try again."); }
    }
}

?>