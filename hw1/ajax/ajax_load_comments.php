<?php
require_once '../dbconfig.php';

$finalResult = array();
$finalResult["items"] = 0;

if(isset($_GET["anime"])){
  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

  $animeID = mysqli_real_escape_string($conn,$_GET["anime"]);
  $query = "SELECT u.username,c.content,c.created_at,a.comments FROM (users u JOIN comment c ON u.userID=c.userID) join anime a on c.animeID=a.animeID where c.animeID=$animeID ORDER BY c.created_at DESC LIMIT 15";

  $res = mysqli_query($conn, $query);

  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $finalResult["data"][] = $row;
    }
    $finalResult["items"] = $finalResult["data"][0]["comments"];
  }

  mysqli_free_result($res);
  mysqli_close($conn);
}

echo json_encode($finalResult);
