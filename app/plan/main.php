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
                            <li id="element"><input type="text" class="time" name="" placeholder="Enter time"><input type="text" class="detail" placeholder="Enter detail"></li>
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