<?php
require_once '../dbconfig.php';

$finalResult = array();
$finalResult["result"] = false;

if($_SERVER['REQUEST_METHOD']=="GET" && isset($_GET['email'])){
  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

  $email = mysqli_real_escape_string($conn,$_GET['email']);
  $query = "SELECT email FROM users WHERE email='$email'";
  $res = mysqli_query($conn,$query);

  if(mysqli_num_rows($res)>0){
    $finalResult["result"] = false;
  }else{
    $finalResult["result"] = true;
  }
  mysqli_close($conn);
}

echo json_encode($finalResult);