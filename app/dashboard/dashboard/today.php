<?php

include '../databaseConn.php';

function todayType($type) {
    include '../databaseConn.php';

    if ($type == 'dashboard') { $user = $_SESSION['userId']; } else if($type == 'profile') { $user = $user; }

    $date = new DateTime();
    $date = $date->format('d.m.Y');

    $query = 'SELECT * FROM chore WHERE userId=:userId AND date=:date';
                        
    $getDay = $conn->prepare($query);
    $getDay->bindParam(':userId', $user, PDO::PARAM_STR);
    $getDay->bindParam(':date', $date, PDO::PARAM_STR);
    $getDay->execute();

    $choreExist = $getDay->rowCount();

    ?>

    <div class="dashboard">
        <div class="dashHeader">
            <h2 id="dashTitle">Today</h2>
            <?php
            
            if ($choreExist) {
                ?>
                    <a href="complete.php" id="dashHref">
                        <img src="../source/image/mainApp/check.svg" id="dashIcon">
                    </a>  
                <?php
            } else {
                ?>
                    <a href="plan.php" id="dashHref">
                        <img src="../source/image/mainApp/editBlack.svg" id="dashIcon">
                    </a>
                <?php
            }
            
            ?>
        </div>
        <div class="dashBody" <?php echo !$choreExist ? 'id="dashAlignItemsCenter"' : ''; ?>>
                <?php
                    if ($choreExist) {
                        $chores = $getDay->fetchAll(PDO::FETCH_ASSOC);

                        ?>
                        <ul>
                        <?php
                            foreach ($chores as $chore) {
                                ?>
                                <li id="dashItem">
                                    <?php

                                        if ($chore['status'] == "done") {
                                            ?>
                                            <span id="time" style="background-color: lightgreen;"><?php echo $chore['time']; ?></span>
                                            <?php 
                                        } else { 
                                            ?>
                                            <span id="time"><?php echo $chore['time']; ?></span>
                                            <?php
                                        }
                                        
                                        echo $chore['chore'];

                                    ?>
                                </li>
                                <?php
                            }
                        ?>
                        </ul>
                        <?php
                    } else if ($user = $_SESSION['userId']){
                        ?>
                        <span id="detail">You don't have any plan for today, <a href="plan.php" id="spanHref">plan today</a>.</span>
                        <?php
                    } else {
                        ?>
                        <span id="detail">Looks like user doesn't have any plan.</span>   
                        <?php
                    }
                ?>
        </div>
    </div>

<?php
}

todayType('dashboard');
?>