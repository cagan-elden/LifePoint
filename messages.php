<?php

session_start();

function setErrorMessage($message) {
    $_SESSION['error_message'] = $message;
}

function displayErrorMessage() {
    if (isset($_SESSION['error_message'])) {
        echo '<div class="warning">' . htmlspecialchars($_SESSION['error_message'], ENT_QUOTES, 'UTF-8') . '</div>';
        unset($_SESSION['error_message']);
    }
}

?>