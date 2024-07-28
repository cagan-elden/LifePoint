<div class="dashboard" id="month">
    <div class="dashHeader">
        <h2 id="dashTitle"><?php echo $monthArray[date('m')]; ?></h2>
        <a href="#" id="dashHref">
            <img src="../source/image/mainApp/calendarBlack.svg" alt="" id="dashIcon">
        </a>
    </div>

    <div class="dashBody">
        <?php

        for ($i=0; $i < $monthDay[date('m')]; $i++) {
            $date = $i + 1;
            $date = strval($date);

            if (strlen($date) === 1) {
                $date = "0".$date;
            }

            echo "<span id='date'>".$date."</span>";
        }

        ?>
    </div>
</div>