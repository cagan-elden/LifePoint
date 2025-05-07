<?php

// create table connection
function executeQuery($query, $data, $fetchMode)
{
    /*

    To define $data use this format:

        $d = [
            [
                "bind" => ":bind",
                "value" => data
            ],
            [
                "bind" => ":bind",
                "value" => data
            ]
        ];

    fetchMode takes three values:
        *fetch
        *fetchNone
        *fetchAll

    */

    include 'databaseConn.php';

    $statement = $conn->prepare($query);
    for ($i=0; $i < count($data); $i++)
    {
        $statement->bindParam($data[$i]["bind"], $data[$i]["value"]);
    }
    $execute = $statement->execute();

    if ($fetchMode == "fetch")
    {
        $val = $execute->fetch(PDO::FETCH_ASSOC);
    } else if ($fetchMode == "fetchNone")
    {
        $val = $execute->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $val = $execute;
    }

    return $val;
}

?>