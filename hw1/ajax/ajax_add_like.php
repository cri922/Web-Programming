<?php
require_once '../dbconfig.php';

session_start();

if (isset($_SESSION["user_id"])) {
    if (isset($_GET["anime"])) {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        $userID = mysqli_real_escape_string($conn,$_SESSION["user_id"]);
        $animeID = mysqli_real_escape_string($conn,$_GET["anime"]);
        $query = "INSERT INTO likes(userID,animeID) VALUES($userID,$animeID)";

        $finalResult = array();
        $finalResult["animeID"] = $animeID;

        if (mysqli_query($conn, $query)) {
            $finalResult["result"] = "true";
        } else {
            $finalResult["result"] = "false";
        }

        echo json_encode($finalResult);

        mysqli_close($conn);
    }
}