<?php

session_start();

include '../../databaseConn.php';

$date = new DateTime();
$date = $date->format('d.m.Y');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pots = array('hakanCalhanoglu', 'ardaGuler', 'yusufDikec', 'fatihTerim', 'joseMourinho');

    foreach ($pots as $pot) {
        if (isset($_POST[$pot]) && !empty($_POST[$pot])) {
            exit("Bot detected.");
        }
    }

    $check = $_POST['done'];

    // Get chore ID's
    $query = "SELECT choreId FROM chore WHERE userId=:user AND date=:date";
    $selectChore = $conn->prepare($query);
    $selectChore->bindParam(':user', $_SESSION['userId'], PDO::PARAM_INT);
    $selectChore->bindParam(':date', $date, PDO::PARAM_STR);
    $selectChore->execute();
    $choreArr = $selectChore->fetchAll(PDO::FETCH_ASSOC);

    $idArr = array();

    foreach ($choreArr as $chore) {
        array_push($idArr, $chore['choreId']);
    }

    try {
        $conn->beginTransaction();

        $point = 0;

        for ($i=0; $i < count($check); $i++) {
            if ($check[$i] == 'on') { $status = 'done'; $point+=5; } else { $status = 'not'; }

            $query = "UPDATE chore SET status=:status WHERE choreId=:id";
            $updateChore = $conn->prepare($query);
            $updateChore->bindParam(':status', $status, PDO::PARAM_STR);
            $updateChore->bindParam(':id', $idArr[$i], PDO::PARAM_INT);
            $updateChore->execute();
        }

        $conn->commit();
    } catch (\Throwable $th) {
        $conn->rollBack();
    }

    $journal = $_POST['entry'];
    $journalText = explode(" ", $journal);

    try {
        if (count($journalText) >= 60) {
            $point+=25;
        }
    
        $query = "INSERT INTO diary SET diary=:journal, date=:date, userId=:user";
        $insertEntry = $conn->prepare($query);
        $insertEntry->bindParam(':journal', $journal, PDO::PARAM_STR);
        $insertEntry->bindParam(':date', $date, PDO::PARAM_STR);
        $insertEntry->bindParam(':user', $_SESSION['userId'], PDO::PARAM_STR);
        $insertEntry->execute();
    } catch (\Throwable $th) {
        exit('error: '.$th);
    }

    try {
        include "delimiter.php";
        $pattern = "/".implode("|", array_map('preg_quote', $arrayToDelimiter))."/i";
        $result = preg_split($pattern, $journal);

        $keywordCandidate = array_count_values($result);
        arsort($keywordCandidate);
        $keywords = array_slice($keywordCandidate, 0, 3, true);

        $query = "INSERT INTO keyword (keyword, keywordLen, userId) VALUES (:keyword, :len, :id)";
        foreach ($keywords as $keyword) {
            $i++;

            $insertKeyword = $conn->prepare($query);
            $insertKeyword->bindParam(':keyword', $keyword, PDO::PARAM_STR);
            $insertKeyword->bindParam(':len', $i, PDO::PARAM_INT);
            $insertKeyword->bindParam(':id', $_SESSION['userId'], PDO::PARAM_INT);
            $insertKeyword->execute();
        }

        $query = "SELECT keyword, COUNT(*) as count FROM keyword WHERE userId=:user GROUP BY keyword ORDER BY count DESC LIMIT 1";
        $getKeyword = $conn->prepare($query);
        $getKeyword->bindParam(':user', $_SESSION['userId'], PDO::PARAM_INT);
        $getKeyword->execute();
        $keywordArr = $getKeyword->fetch(PDO::FETCH_ASSOC);

        $amount = array_count_values($keywordArr);
        $sliced = array_slice($keywordArr, 0, 3);

        $storeKeyOrder = array();

        if ($keywordArr) {
            $bestKeyword = $keywordArr['keyword'];
        } else {
            $bestKeyword = '';
        }

        arsort($storeKeyOrder);

        $bestKeyword = $storeKeyOrder[0];

        $query = "UPDATE user SET daystreak=daystreak+1, lifePoint=lifePoint+:point, keyword=:keyword WHERE userId=:userId";
        $updateUser = $conn->prepare($query);
        $updateUser->bindParam(':point', $point, PDO::PARAM_INT);
        $updateUser->bindParam(':keyword', $bestKeyword, PDO::PARAM_STR);
        $updateUser->bindParam(':userId', $_SESSION['userId'], PDO::PARAM_INT);
        $updateUser->execute();

        header('location: ../../dashboard.php');
        exit;
    } catch (\Throwable $th) {
        //throw $th;
    }
} else {
    exit("You must post before you can submit.");
}

?>