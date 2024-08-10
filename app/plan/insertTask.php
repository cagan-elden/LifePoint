<?php

session_start();

include '../../messages.php';

function checkIsset($values) {
    foreach ($values as $value) {
        if (!isset($value)) {
            setErrorMessage('Please fill out all required fields.');
            return false;
        }
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SESSION && $_SESSION['userId']) {
    // Protection
    $honeypots = array('joeMama','upperClassman','impostorSyndrome','janePapa','frenchBall');
    foreach ($honeypots as $pot) { if (isset($_POST[$pot])) { setErrorMessage('Bot detected...'); exit; } }

   $dates   = count($_POST['date']); 
   $chores  = count($_POST['chore']);
   $times   = count($_POST['time']);
   $amounts = count($_POST['amount']);

   if ($chores !== 0 && $times !== 0 && $dates !== 0 && $times === $chores && $amounts !== 0 && checkIsset($_POST) === true) {
        include '../../databaseConn.php';

        try {
            $conn->beginTransaction();

            for ($i = 0; $i < $dates; $i++) {
                $amount = $_POST['amount'][$i];
                for ($k = 0; $k < $amount; $k++) {
                    $date  = $_POST['date'][$i];
                    $chore = $_POST['chore'][$k];
                    $time  = $_POST['time'][$k];

                    $query = "INSERT INTO chore (date, chore, time, status, userId) VALUES (:date, :chore, :time, 'not', :user)";
                    $insertChore = $conn->prepare($query);
                    $insertChore->bindParam(':date', $date, PDO::PARAM_STR);
                    $insertChore->bindParam(':chore', $chore, PDO::PARAM_STR);
                    $insertChore->bindParam(':time', $time, PDO::PARAM_STR);
                    $insertChore->bindParam(':user', $_SESSION['userId'], PDO::PARAM_STR);
                    $insertChore->execute();
                }
            }

            $conn->commit();
            header ('location: ../../dashboard.php');
            exit;
        } catch (PDOException $e) { $conn->rollBack(); setErrorMessage('Error: There was an error occured during inserting data...'); }
   } else { setErrorMessage('There should be at least one chore, time and date.'); header ('location: '.$_SERVER['HTTP_REFERER']); exit; }
} else { header ('location: '.$_SERVER['HTTP_REFERER']); }

?>