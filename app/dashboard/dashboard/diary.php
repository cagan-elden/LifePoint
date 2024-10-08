<?php

function journalType($type) {
    include '../databaseConn.php';

    if ($type == 'dashboard') { $user=$_SESSION['userId']; } else if ($type == 'profile') { $user=$user; }

    $query = "SELECT * FROM diary WHERE userId=:id";
    $getJournal = $conn->prepare($query);
    $getJournal->bindParam(':id', $user, PDO::PARAM_INT);
    $getJournal->execute();
    $journal = $getJournal->fetch(PDO::FETCH_ASSOC);

    ?>

    <div class="dashboard">
        <div class="dashHeader">
            <h2 id="dashTitle">Diary</h2>
            <?php
                
                if ($user = $_SESSION['userId']) {
                    echo '<a href="diary.php" id="dashHref"> <img src="../source/image/mainApp/diaryBlack.svg" id="dashIcon"> </a>';
                }

            ?>
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

    <?php
}

?>