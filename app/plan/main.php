<?php

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

?>

<div class="container">
    <div class="center">
        <div class="dashContainer">
            <div class="dashboardContainer">
            <div class="dashes">
                <div class="dashboard">
                    <form action="plan/insertTask.php" method="post">
                            <div class="dashHeader">
                                <h2 id="dashTitle"><?php echo $date; ?></h2>
                            </div>
                            <div class="dashBody">
                                <ul>
                                    <li id="element"><input type="text" class="time" name="time[]" placeholder="Enter time" autocomplete="off"><input type="text" class="detail" name="chore[]" placeholder="Enter detail" autocomplete="off"></li>
                                </ul>
                                <button id="addNewElement" class="button">+ Add new task</button>
                                <button id="removeElement" class="button">- Remove a task</button>
                            </div>
                        </div>
                    </div>

                    <!-- Honeypot Elements -->
                    <input type="hidden" name="joeMama">
                    <input type="hidden" name="upperClassman">
                    <input type="hidden" name="impostorSyndrome">
                    <input type="hidden" name="janePapa">
                    <input type="hidden" name="frenchBall">

                    <button type="submit" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>