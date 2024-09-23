<?php

include '../databaseConn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $diaryId = $_POST['id'];

    $query = 'SELECT diary, date FROM diary WHERE diaryId=:diaryId AND userId=:userId';
    $getEntry = $conn->prepare($query);
    $getEntry->bindParam(':diaryId', $diaryId, PDO::PARAM_INT);
    $getEntry->bindParam(':userId', $_SESSION['userId'], PDO::PARAM_INT);
    $getEntry->execute();
    $entry = $getEntry->fetch(PDO::FETCH_ASSOC);

    if ($entry) {
        echo "<span id='dateHelix'><b>".$entry['date']."</b></span>";
        echo "<span id='textLune'>".$entry['diary']."</span>";
    } else {
        echo 'No entry found for this ID.';
    }
    exit;
}

$query = 'SELECT date, diaryId FROM diary WHERE userId=:userId';
$getEntry = $conn->prepare($query);
$getEntry->bindParam(':userId', $_SESSION['userId'], PDO::PARAM_INT);
$getEntry->execute();
$entrySQL = $getEntry->fetchAll(PDO::FETCH_ASSOC);
$entryNum = $getEntry->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lifePoint - Diary</title>

    <!-- CSS Imports -->
    <link rel="stylesheet" href="../source/frontend/css/style.css">

    <!-- Library Imports -->
    <script src="../source/library/jquery.js"></script>
    
</head>
<body>
    <div class="container">
        <?php

        include 'header.php';
        include 'diary/main.php';
        
        ?>
    </div>

    <!-- Javascript Imports -->
    <script src="../source/frontend/javascript/headerDropdownMenu.js"></script>
    <script src="../source/frontend/javascript/diaryDialog.js"></script>

    <!-- JQuery/Ajax --> 
    <script src="../source/frontend/jquery/getDiaryAjaxScript.js"></script>

</body>
</html>