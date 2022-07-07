<?php
if (isset($_GET)) {
    $data = http_build_query($_GET);
    $url = "https://api.jikan.moe/v4/anime?" . $data;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    echo ($result);
    curl_close($curl);
}