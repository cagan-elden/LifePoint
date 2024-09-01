<?php

session_start();
session_destroy();

setcookie('user_id', "", time() - 3600, "/", "", true, true);
setcookie('remember_token', "", time() - 3600, "/", "", true, true);

header('location: ../../../login/login.php');
exit;

?>