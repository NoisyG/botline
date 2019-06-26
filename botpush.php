<?php



require "vendor/autoload.php";

$access_token = 'DQff85p/0oUKZVLZc2B8feDO80rnDE8vla1qebHxpVwURr/bYZhUg6MzOtM96EEgy2DjAetWVXiiwK/tDM5O7Yh2RvcV9mjVmhxXHn/ZeblTK5Jt+u6efaFc7EhuDGqqTxB+eWjcKYbvNMDErh9KbQdB04t89/1O/w1cDnyilFU=';

$channelSecret = '36142cbdc3ed56232d423cb0bf6efb4f';

$pushID = 'U89ea1a1e0e9225abbb54f3f53e8ff812';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();







