<?php
require_once '../dbconfig.php';

session_start();
$finalResult = array();
$finalResult["result"] = false;

if($_SERVER['REQUEST_METHOD']=="POST" && isset($_SESSION["user_id"])){
  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
  $userID = mysqli_real_escape_string($conn,$_SESSION["user_id"]);;
  $animeID = mysqli_real_escape_string($conn,$_POST["animeID"]);
  $content = mysqli_real_escape_string($conn,$_POST["comment"]);
  $query = "INSERT INTO comment(userID,animeID,content,created_at) VALUES($userID,$animeID,'".$content."',now())";
  if (mysqli_query($conn, $query)) {
    $finalResult["result"] = true;
  }
  mysqli_close($conn);
}
echo json_encode($finalResult);