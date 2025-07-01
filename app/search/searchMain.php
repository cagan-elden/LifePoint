<div class="container">
    <?php
    
    $searchQuery = @$_GET['search_query'];
    $isQueryEmpty = empty($searchQuery);
    
    if ($isQueryEmpty) {
        header('dashboard.php');
        exit();
    }

    $query = 'SELECT userId, displayName, username, profilePic FROM user WHERE username OR displayName LIKE :searchQuery';
    $search = $conn->prepare($query);
    $search->bindParam(':searchQuery', $searchQuery, PDO::PARAM_STR);
    $search->execute();
    $users = $search->fetchAll(PDO::FETCH_ASSOC);

    foreach ($users as $user) {
        ?>
        <div class="account">
            <div class="account-header">
                <img src="<?php echo $user['profilePic'] ?>" id="profilePic">

                <div class="header-right">
                    <h2 id="displayName"><?php echo $user['displayName'] ?></h2>
                    <span id="username"><?php echo $user['username'] ?></span>
                </div>
            </div>
        </div>
        <?php
    }

    ?>
</div>