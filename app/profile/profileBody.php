<div class="profileBody">
    <div class="left">
        <div class="dashContainer" style="width: 100em;">
            <?php

            // Including dashboard functions such as today, diary, album and calendar.
            include_once 'dashboard/today.php';
            include 'dashboard/diary.php';
            include 'dashboard/album.php';
            include 'dashboard/calendar.php';
            
            ?>
        </div>
    </div>
</div>