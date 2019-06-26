<?php
    $accessToken = "DQff85p/0oUKZVLZc2B8feDO80rnDE8vla1qebHxpVwURr/bYZhUg6MzOtM96EEgy2DjAetWVXiiwK/tDM5O7Yh2RvcV9mjVmhxXHn/ZeblTK5Jt+u6efaFc7EhuDGqqTxB+eWjcKYbvNMDErh9KbQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
#ตัวอย่าง Message Type "Text"
    if($message == "พ่อค้าแมว"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีครับติดต่อพ่อค้าเหรียญแมวได้ที่ Line Id : Slicksixter ";
        replyMsg($arrayHeader,$arrayPostData);
    }
	if($message == "โปร"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "โปรโมชั่นประจำเดือนรอการอัพเดทจากพ่อค้านะครับ";
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Sticker"
    //else if($message == "ฝันดี"){
      //  $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        //$arrayPostData['messages'][0]['type'] = "sticker";
       // $arrayPostData['messages'][0]['packageId'] = "2";
       // $arrayPostData['messages'][0]['stickerId'] = "46";
        //replyMsg($arrayHeader,$arrayPostData);
    //}
    #ตัวอย่าง Message Type "Image"
    else if($message == "แพ็ค"){
        $image_url = "https://i.pinimg.com/originals/cc/22/d1/cc22d10d9096e70fe3dbe3be2630182b.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "รายละเอียด"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
		$arrayPostData['messages'][0]['text'] = "แพ็ค 1,989 บาท ได้รับเหรียญแมว 298+30+30+30+12";
        $arrayPostData['messages'][0]['text'] = "แพ็ค 2,979 บาท ได้รับเหรียญแมว 598+2";
		$arrayPostData['messages'][0]['text'] = "แพ็ค 4,889 บาท ได้รับเหรียญแมว 598+298+30+30+30+14";
		$arrayPostData['messages'][0]['text'] = "แพ็ค 6,740 บาท ได้รับเหรียญแมว 598+598+298+30+30+30+14";
		$arrayPostData['messages'][0]['text'] = "รายละเอียดแพ็คเกจดังกล่าวยังไม่รวมโบนัสพิเศษภายในเกม";
        replyMsg($arrayHeader,$arrayPostData);
    }
function replyMsg($arrayHeader,$arrayPostData){
        $strUrl = "https://api.line.me/v2/bot/message/reply";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$strUrl);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);    
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($arrayPostData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close ($ch);
    }
   exit;
?>
