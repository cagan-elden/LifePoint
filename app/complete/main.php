<div class="doubleDashboard">

    <!-- dashLeft is for chores -->
    <div class="dash" id="left">
        <div class="dashHeader">
            <h2 id="dashTitle">Day Review</h2>
        </div>

        <div class="dashBody">
            <ul>
                <?php
                    foreach ($choreArr as $chore) {
                        ?>
                        <li id="element">
                            <input type="checkbox" name="done[]" id="checkElement">
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
     <div class="dash" id="right">
        <div class="dashHeader">
            <h2 id="dashTitle">Diary</h2>
        </div>

        <div class="dashBody">
            <textarea name="entry" id="journal" placeholder="Write your day..."></textarea>
        </div>
     </div>
</div>