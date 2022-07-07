<?php
require_once '../dbconfig.php';

$finalResult = array();
$finalResult["result"] = false;

if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['username'])){
  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

  $username = mysqli_real_escape_string($conn,$_GET['username']);
  $query = "SELECT username FROM users WHERE username='$username'";
  $res = mysqli_query($conn, $query);
  if(mysqli_num_rows($res)>0){
    $finalResult["result"] = false;
  }else{
    $finalResult["result"] = true;
  }
  mysqli_close($conn);
}

echo json_encode($finalResult);
