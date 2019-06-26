<?php


$access_token = 'DQff85p/0oUKZVLZc2B8feDO80rnDE8vla1qebHxpVwURr/bYZhUg6MzOtM96EEgy2DjAetWVXiiwK/tDM5O7Yh2RvcV9mjVmhxXHn/ZeblTK5Jt+u6efaFc7EhuDGqqTxB+eWjcKYbvNMDErh9KbQdB04t89/1O/w1cDnyilFU=';

//$userId = 'Uffa138efe037e6e889d0b0f4a871c005';
$userId = 'U89ea1a1e0e9225abbb54f3f53e8ff812';

$url = 'https://api.line.me/v2/bot/profile/'.$userId;

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;

