<?php
if (! function_exists('curlcall')) {
function curlcall($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,5);
    $curlout = curl_exec($ch);
    curl_close($ch);
    return $curlout;
  }
  }




