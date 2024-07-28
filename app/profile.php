<?php

include "../databaseConn.php";
session_start();

$banners = [
    'banner1.jpg',
    'banner2.jpg',
    'banner3.jpg',
    'banner4.jpg',
    'banner5.jpg',
    'banner6.jpg',
    'banner7.jpg',
    'banner8.jpg',
    'banner9.jpg',
    'banner10.jpg',
    'banner11.jpg'
];

$bannerOnScreen = rand(0, 10);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lifePoint - Profile</title>

    <link rel="stylesheet" href="../source/frontend/css/style.css">
</head>
<body>
    <div class="container">
    <?php

        include "header.php";
        include "profile/main.php";

    ?>
    </div>

    <script src="../source/frontend/javascript/headerDropdownMenu.js"></script>
    <script src="../source/frontend/javascript/profilePicBigger.js"></script>

    <!-- Dialog to make profile photo bigger. -->
    <dialog id="pfpBigDialog">
        <img src="<?php echo $_SESSION['profilePic']; ?>" alt="" id="profilePic">
    </dialog>
</body>
</html>