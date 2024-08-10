<?php

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

?>

<div class="container">
    <div class="center">
        <div class="dashContainer">
            <div class="dashes">
                <div class="dashboard">
                    <div class="dashHeader">
                        <h2 id="dashTitle"><?php echo $date; ?></h2>
                    </div>
                    <div class="dashBody">
                        <ul>
                            <input type="hidden" name="date" value="<?php echo $date; ?>">
                            <input type="hidden" name="amount" value="<?php echo $amount; ?>"> <!-- While working with Ajax work about amount too. It represents the amount of elements in a dash. -->
                            <li id="element"><input type="text" class="time" name="time" placeholder="Enter time"><input type="text" class="detail" name="chore" placeholder="Enter detail"></li>

                            <!-- Honeypot Elements -->
                            <input type="hidden" name="joeMama">
                            <input type="hidden" name="upperClassman">
                            <input type="hidden" name="impostorSyndrome">
                            <input type="hidden" name="janePapa">
                            <input type="hidden" name="frenchBall">
                        </ul>
                        <button id="addNewElement" class="button">+ Add new task</button>
                        <button id="removeElement" class="button">- Remove a task</button>
                    </div>
                </div>
            </div>

            <div class="dashboard" id="newDashDash">
                <button id="createNewDash" class="button">+ Plan Another Day</button>
                <button id="submit" type="submit" class="button">Submit</button> <!-- Come Here Later! -->
            </div>
        </div>
    </div>
</div>