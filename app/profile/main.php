<div class="center">
    <div class="profileContainer">
        <div class="profile">
            <?php
            
            include "profileHeader.php";

            if ($isPrivate['type'] == 'private' && $_SESSION['userId'] != $user && !$friend) {
                ?>
                
                <div class="containerMessage">
                    <span id="message">This account is private, unauthorized access ...</span>
                </div>
                
                <?php
            } else {
                include "profileBody.php";
            }

            ?>
        </div>
    </div>
</div>