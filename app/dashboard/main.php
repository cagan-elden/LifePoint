<div class="center">
    <div class="upperDash">
        <span id="welcome">Good to see you <?php echo $_SESSION['displayName'] ?>!</span>
        <?php include "friendDash.php"; ?>
    </div>
    <div class="dashContainer">
        <?php
        
        include 'dashboard/dashboard/today.php';
        include 'dashboard/dashboard/tomorrow.php';
        include 'dashboard/dashboard/diary.php';
        include 'dashboard/dashboard/month.php';
        include 'dashboard/dashboard/yearAgo.php';
        include 'dashboard/dashboard/album.php';
        include 'dashboard/dashboard/ad.htm';
        
        ?>
    </div>

    <script src="../source/frontend/javascript/headerDropdownMenu.js"></script>
</div>