<?php
session_start();

if (!isset($_SESSION["username"]) && !isset($_SESSION["user_id"])) {
  header("Location: login.php");
  exit();
}

require_once 'dbconfig.php';
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

$id = mysqli_real_escape_string($conn,$_SESSION["user_id"]);
$query = "DELETE FROM users where userID=$id";
if(mysqli_query($conn,$query)){
  mysqli_close($conn);
  session_destroy();
  header("Location: signup.php");
}else{
  header("Location: profile.php");
}
exit();