<div class="profileHeader">
    <img src="<?php echo $_SESSION['profilePic'] ?>" alt="" id="pfp">
    <div class="headerDetailContainer">
        <div class="left">
            <h2 id="displayName"><?php echo $isPrivate['displayName'] ?></h2>
            <span id="username"><?php echo $isPrivate['username'] ?></span>
            <span id="point"><?php echo $isPrivate['lifePoint'] ?> pts</span>
        </div>
        <div class="sendFriend">
            <button href="#" id="beFriend">Send Request</button>
        </div>
    </div>
</div>

<div class="profileMenu">
    <ul>
        <li id="profileMenuItem">
            <a href="#">
                <img src="../source/image/mainApp/homeBlack.svg" alt="" id="miniIcon">
                <span> Homepage</span>
                <canvas id="menuSelector"></canvas>
            </a>
        </li>
        <li id="profileMenuItem">
            <a href="#">
                <img src="../source/image/mainApp/diaryBlack.svg" alt="" id="miniIcon" style="margin-left: 1.25em;">
                <span> Diary</span>
                <canvas id="menuSelector"></canvas>
            </a>
        </li>
        <li id="profileMenuItem">
            <a href="#">
                <img src="../source/image/mainApp/albumBlack.svg" alt="" id="miniIcon" style="margin-left: 1em;">
                <span> Album</span>
                <canvas id="menuSelector"></canvas>
            </a>
        </li>
        <li id="profileMenuItem">
            <a href="#">
                <img src="../source/image/mainApp/calendarBlack.svg" alt="" id="miniIcon">
                <span> Calendar</span>
                <canvas id="menuSelector"></canvas>
            </a>
        </li>
    </ul>
</div>