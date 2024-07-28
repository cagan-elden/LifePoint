<div class="diaryLeftContainer">
    <div class="diaryHeader">
        <h2 id="title">Entries</h2>
        <button id="newEntry">
            <img src="../source/image/mainApp/diaryBlack.svg" alt="" id="miniIcon">
            <b> New Entry</b>
        </button>
    </div>
    <div class="diaryBody">
        <?php
        
        // List entries
        if ($entryNum) {
            foreach ($entrySQL as $entry) {
                $diaryId = $entry['diaryId'];
                echo '<li id="date"><button id="'.$diaryId.'" class="diaryButton" data-id="'.$diaryId.'">'.strval(date($entry['date'])).'</button></li>';
            }
        } else {
            echo "<span id='center'>You don't have any diary entries, <button>create one</button> ...</span>";
        }

        ?>
        </div>
</div>
<div class="diaryRightContainer">
    <div class="textHere">
        <span id="textHere">Your entry will be written here...</span>
    </div>
    
    <div class="dashboardDay">
        <div class="dashboardDayHeader">
            <h2 id="dashTitle">Day</h2>
        </div>
        <div class="dashboardDayBody">
            <ul>
                <li id="element" data-id="choreId"><span id="time">08:00</span><span id="detail">Wake Up</span></li>
            </ul>
        </div>
    </div>
</div>