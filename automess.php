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
    if($message == "Help"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีครับติดต่อพ่อค้าเหรียญแมวโดยตรงได้ที่ Line Id : Slicksixter.'<br>'พิมพ์สัญญาลักษณ์ดังต่อไปนี้เพื่อเลือกเมนู.'<br>'1.TP เพื่อตรวจเช็คเรทการเติมเงิน.'<br>'2.DT เพื่อตรวจสอบรายละเอียดเหรียญแมวที่ได้รับในแพ็คใหญ่.'<br>'3.Pro เพื่อตรวจสอบโปรโมชั่นประจำเดือน";
        replyMsg($arrayHeader,$arrayPostData);
    }
	if($message == "Pro"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "📣📣 ประกาศ !! สำหรับผู้ที่เติมตรงกับวันเกิดของตัวเอง 📣📣.'<br>'

👉👉 ทางเราจัดราคาพิเศษให้ท่านทันทีไม่ต้องรอโปร.'<br>'

✔✔ แพ็คเกจ XL ราคาปกติ 3,500 บาท เมื่อเติมกับเราเหลือเพียง 2,900 บาทเท่านั้น ✔✔.'<br>'
 
✔✔ แพ็คเพจ XXXL (ไม่มีในเกม) ราคาปกติ 8,057 บาท เมื่อเติมกับเราเหลือเพียง 6,690 บาทเท่านั้น ✔✔.'<br>'

📍📍 โปรโมชั่นดังกล่าวไม่มีกำหนดวันหมดอายุ ไม่จำกัดจำนวนครั้ง เพียวแค่ท่านมีวันเกิดตรงกับวันที่ท่านเติม และมีหลักฐานแสดงกับทางเรารับส่วนลดตาทโปรโมชั่นดังกล่าวทันที 📍📍.'<br>'

▶️▶️ กรณีแพ็คภายในเกมยังมี x2 อยู่ ท่านจะได้รับในส่วนของ x2 ในแพ็คนั้นๆ ด้วย";
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
    else if($message == "TP"){
        $image_url = "http://image.free.in.th/v/2013/id/190626113939.jpg";
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    #ตัวอย่าง Message Type "Location"
    else if($message == "DT"){
        $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['messages'][0]['type'] = "text";
		$arrayPostData['messages'][0]['text'] = "แพ็ค 1,989 บาท ได้รับเหรียญแมว 298+30+30+30+12";
		$arrayPostData['messages'][1]['type'] = "text";
        $arrayPostData['messages'][1]['text'] = "แพ็ค 2,979 บาท ได้รับเหรียญแมว 598+2";
		$arrayPostData['messages'][2]['type'] = "text";
		$arrayPostData['messages'][2]['text'] = "แพ็ค 4,889 บาท ได้รับเหรียญแมว 598+298+30+30+30+14";
		$arrayPostData['messages'][3]['type'] = "text";
		$arrayPostData['messages'][3]['text'] = "แพ็ค 6,740 บาท ได้รับเหรียญแมว 598+598+298+30+30+30+14";
		$arrayPostData['messages'][4]['type'] = "text";
		$arrayPostData['messages'][4]['text'] = "รายละเอียดแพ็คเกจดังกล่าวยังไม่รวมโบนัสพิเศษภายในเกม";
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
