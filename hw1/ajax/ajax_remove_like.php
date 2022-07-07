<?php
require_once '../dbconfig.php';

session_start();

if (isset($_SESSION["user_id"])) {
    if (isset($_GET["anime"])) {
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

        $userID = mysqli_real_escape_string($conn,$_SESSION["user_id"]);
        $animeID = mysqli_real_escape_string($conn,$_GET["anime"]);
        $query = "DELETE FROM likes WHERE userID=$userID AND animeID=$animeID";
        $res = mysqli_query($conn, $query);

        $finalResult = array();
        $finalResult["animeID"] = $animeID;

        if (mysqli_affected_rows($conn) == 1) {
            $finalResult["result"] = "true";
        } else {
            $finalResult["result"] = "false";
        }

        echo json_encode($finalResult);

        mysqli_close($conn);
    }
}