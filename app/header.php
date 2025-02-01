<div class="header">
    <div class="left">
        <a href="dashboard.php">
            <img src="../source/logo/logo.png" id="logo">

            <div class="text">
                <h2 id="title">LifePoint</h2>
                <span id="detail">Make a point to your life</span>
            </div>
        </a>
    </div>

    <div class="searchbarDiv">
        <form action="#" method="post">
            <input type="text" name="query" id="searchbar" placeholder="Search ...">
            <button type="submit" id="searchButton">Search</button>
        </form>

        <?php include 'script/php/checkFriendReq.php'; ?>
    </div>

    <div class="right">
        <?php
            // Check user daystreaks
            if ($_SESSION['daystreak']) {
                ?>
                <img src="../source/image/mainApp/streakBlue.svg" id="streak" draggable="false">
                <span id="detail"><?php echo $_SESSION['lifePoint']; ?> pts</span>
                <?php
            } else {
                ?>
                <img src="../source/image/mainApp/streakGray.svg" id="streak" draggable="false">
                <span class="detail">Have you forgotten?</span>
                <?php
            }
        ?>

        <div class="user">
            <img src="<?php echo $_SESSION['profilePic'] ?>" id="profilePicDp">

            <!-- Dropdown Menu -->
             <div class="headerDropdown" id="headerDropdown">
                <ul>
                    <li id="dropdownItem" style="border-top-left-radius: 0.75em; border-top-right-radius: 0.75em;">
                        <a href="profile.php?page=profile&id=<?php echo $_SESSION['userId'] ?>">
                            <img src="<?php echo $_SESSION['profilePic'] ?>" alt="" id="pfp">
                            <b>Profile</b>
                            <br>
                            <span><?php echo $_SESSION['username'] ?></span>
                        </a>
                    </li>
                    <li id="dropdownItem"><a href="#">Plan</a></li>
                    <li id="dropdownItem"><a href="#">Diary</a></li>
                    <li id="dropdownItem">
                        <a href="#">
                            <img src="../source/image/mainApp/themeBlack.svg" alt="" id="miniIcon">
                            <span>Change Theme</span>
                        </a>
                    </li>
                    <li id="dropdownItem"><a href="#">Settings</a></li>
                    <li id="dropdownItem" style="border-bottom-left-radius: 0.75em; border-bottom-right-radius: 0.75em;"><a href="script/php/exit.php">Exit</a></li>
                </ul>
             </div>
        </div>
    </div>
</div>