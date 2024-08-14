<?php

include '../databaseConn.php';

$date = new DateTime();
$date = $date->format('d.m.Y');

?>

<div class="dashboard">
    <div class="dashHeader">
        <h2 id="dashTitle">Today</h2>
        <a href="#" id="dashHref">
            <img src="../source/image/mainApp/check.svg" id="dashIcon">
        </a>
    </div>
    <div class="dashBody">
        <ul>
            <?php
                $query = 'SELECT * FROM chore WHERE userId=:userId AND date=:date';
                
                $getDay = $conn->prepare($query);
                $getDay->bindParam(':userId', $_SESSION['userId'], PDO::PARAM_STR);
                $getDay->bindParam(':date', $date, PDO::PARAM_STR);
                $getDay->execute();

                $choreExist = $getDay->rowCount();

                if ($choreExist) {
                    $chores = $getDay->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($chores as $chore) {
                        ?>
                        <li id="dashItem">
                            <span id="time"><?php echo $chore['time']; ?></span>
                            <?php echo $chore['chore']; ?>
                        </li>
                        <?php
                    }
                } else {
                    ?>
                    <span id="detail">You don't have any plan for today, <a href="plan.php">plan today</a>.</span>
                    <?php
                }
            ?>
        </ul>
    </div>
</div>