<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.twitch.tv/kraken/channels/test_user1");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
echo $result;

