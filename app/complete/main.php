<div class="dashboard" style="background: #ddd; box-shadow: none;">
    <div class="doubleDashboard">

        <!-- dashLeft is for chores -->
        <div class="dashD" id="left">
            <div class="dashHeader">
                <h2 id="dashTitle"><img src="../source/image/mainApp/checkBlack.svg" id="miniIcon"> <span id="titleText">Day Review</span></h2>
            </div>

            <div class="dashBody">
                <ul>
                    <?php
                        foreach ($choreArr as $chore) {
                            ?>
                                <li id="dashItem">
                                    <input type="checkbox" name="done[]" id="checkChore">
                                    <span id="time"><?php echo $chore['time']; ?></span>
                                    <span id="detail"><?php echo $chore['chore']; ?></span>
                                </li>
                            <?php   
                        }
                    ?>
                </ul>
            </div>
        </div>

        <!-- dashRight is for diary -->
        <div class="dashD" id="right">
            <div class="dashHeader">
                <h2 id="dashTitle"><img src="../source/image/mainApp/diaryBlack.svg" id="miniIcon"> <span id="titleText">Diary</span></h2>
            </div>

            <div class="dashBody">
                <textarea name="entry" id="journal" placeholder="Write your day ..." rows=22 cols=50></textarea>
            </div>
        </div>
    </div>

    <button type="submit" id="submit" style="width: 70em;">Submit</button>
</div>