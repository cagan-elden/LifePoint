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

            $query = "UPDATE chore SET status=".$status." WHERE choreId=:id";
            $updateChore = $conn->prepare($query);
            $updateChore->bindParam(':id', $idArr[$i], PDO::PARAM_INT);
            $updateChore->execute();
        }

        $conn->commit();
    } catch (\Throwable $th) {
        $conn->rollBack();
    }

    try {
        $journal = $_POST['entry'];
        $journalText = explode(" ", $journal);
    
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
} else {
    exit("You must post before you can submit.");
}

?>