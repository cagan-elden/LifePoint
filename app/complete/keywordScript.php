<?php

include "delimiter.php";
$pattern = "/".implode("|", array_map('preg_quote', $arrayToDelimiter))."/i";
$result = preg_split($pattern, $journal);

echo $result;

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

?>