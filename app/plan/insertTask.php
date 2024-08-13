<?php

session_start();

$date = new DateTime();
$date = $date->format('d.m.Y');

function isValidTimeFormat($time, $format = 'H.i') {
    $dateTime = DateTime::createFromFormat($format, $time);
    return $dateTime && $dateTime->format($format) === $time;
}

if ($_SESSION['userId']) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Cybersecurity
        $honeypotArr = ['joeMama', 'upperClassman', 'impostorSyndrome', 'janePapa', 'frenchBall'];
        foreach ($honeypotArr as $pot) {
            if (!empty($_POST[$pot])) {
                exit;
            }
        }

        if (!empty($_POST)) {
            $timeArr = isset($_POST['time']) ? (array)$_POST['time'] : [];
            $choreArr = isset($_POST['chore']) ? (array)$_POST['chore'] : [];
            
            $itemNum = count($timeArr);

            for ($i=0; $i < $itemNum; $i++) {
                if ($_POST['time'][$i] == '' && $_POST['chore'][$i] == '') {
                    continue;
                }

                if ($_POST['time'][$i] == '' && $_POST['chore'][$i] != '' || $_POST['time'][$i] != '' && $_POST['chore'][$i] == '') {
                    echo 'Chore or time cannot be left blank ...';
                } else {
                    $times = explode(' - ', $_POST['time'][$i]);

                    for ($j=0; $j < 2; $j++) { 
                        if (!isValidTimeFormat($times[$j])) {
                            exit('Invalid time format ...');
                        }
                    }

                    $stripChore = strip_tags($_POST['chore'][$i]);
                    $stripTime = strip_tags($_POST['time'][$i]);

                    $query = 'INSERT INTO chore (chore, status, time, date, userId) VALUES (:chore, "not", :time, :date, :userId)';
                    $insertItem = $conn->prepare($query);
                    $insertItem->bindParam(':chore', $stripChore, PDO::PARAM_STR);
                    $insertItem->bindParam(':time', $stripTime, PDO::PARAM_STR);
                    $insertItem->bindParam(':date', $date, PDO::PARAM_STR);
                    $insertItem->bindParam(':userId', $_SESSION['userId'], PDO::PARAM_INT);
                    $insertItem->execute();
                }
            }

        } else {
            echo "You can't leave all blank ...";
        }

    } else {
        echo 'Server request method must be POST ...';
    }
} else {
    echo 'User login required ...';
}

?>