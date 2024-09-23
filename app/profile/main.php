<div class="center">
    <div class="profileContainer">
        <div class="profile">
            <?php
            
            include "profileHeader.php";

            if ($isPrivate['type'] == 'private' && $_SESSION['userId'] != $user && !$friend) {
                ?>
                
                <div class="containerMessage">
                    <img src="../source/image/mainApp/eyeDisabledBlack.svg" alt="" id="icon" draggable="false">
                    <span id="message">This account is private. Be friends to access the profile.</span>
                </div>
                
                <?php
            } else {
                include "profileBody.php";
            }

            ?>
        </div>
    </div>
</div>