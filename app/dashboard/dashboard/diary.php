<?php

$query = "SELECT * FROM diary WHERE userId=:id";
$getJournal = $conn->prepare($query);
$getJournal->bindParam(':id', $_SESSION['userId'], PDO::PARAM_INT);
$getJournal->execute();
$journal = $getJournal->fetch(PDO::FETCH_ASSOC);

?>

<div class="dashboard">
    <div class="dashHeader">
        <h2 id="dashTitle">Diary</h2>
        <a href="diary.php" id="dashHref">
            <img src="../source/image/mainApp/diaryBlack.svg" id="dashIcon">
        </a>
    </div>
    <div class="dashBody" id="diaryBody">
        <span id="date"><?php echo $journal['date'] ?></span>
        <p id="diaryText">
        <?php
            echo substr($journal['diary'], 0, 100)
        ?>
        ...
        </p>
    </div>
</div>