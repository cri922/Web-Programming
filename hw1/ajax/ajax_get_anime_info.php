<?php
if(isset($_GET['anime'])){
  $url = "https://api.jikan.moe/v4/anime/".$_GET['anime'];
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  echo ($result);
  curl_close($curl);
}