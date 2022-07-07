<?php
require_once '../dbconfig.php';

session_start();

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$userID = mysqli_real_escape_string($conn,$_SESSION["user_id"]);
$query = "SELECT animeID FROM likes WHERE userID=$userID";
$res = mysqli_query($conn, $query);

$finalResult = array();

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $finalResult[] = $row;
    }
}

echo json_encode($finalResult);

mysqli_free_result($res);
mysqli_close($conn);