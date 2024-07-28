<?php

$monthArray = array(
    '01' => 'January',
    '02' => 'Febuary',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December');

function isLeapYear($year) {
    return ($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0);
}

$monthDay = array(
    '01' => 31,
    '02' => isLeapYear(date('y')) ? 29 : 28,
    '03' => 31,
    '04' => 30,
    '05' => 31,
    '06' => 30,
    '07' => 31,
    '08' => 31,
    '09' => 30,
    '10' => 31,
    '11' => 30,
    '12' => 31
);

?>

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