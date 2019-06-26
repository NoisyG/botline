<?php
    $accessToken = "DQff85p/0oUKZVLZc2B8feDO80rnDE8vla1qebHxpVwURr/bYZhUg6MzOtM96EEgy2DjAetWVXiiwK/tDM5O7Yh2RvcV9mjVmhxXHn/ZeblTK5Jt+u6efaFc7EhuDGqqTxB+eWjcKYbvNMDErh9KbQdB04t89/1O/w1cDnyilFU=";//copy Channel access token ตอนที่ตั้งค่ามาใส่
    
    $content = file_get_contents('php://input');
    $arrayJson = json_decode($content, true);
    
    $arrayHeader = array();
    $arrayHeader[] = "Content-Type: application/json";
    $arrayHeader[] = "Authorization: Bearer {$accessToken}";
    
    //รับข้อความจากผู้ใช้
    $message = $arrayJson['events'][0]['message']['text'];
  	if(isset($arrayJson['events'][0]['source']['userId'])){
     $id = $arrayJson['events'][0]['source']['userId'];
  }
  	else if(isset($arrayJson['events'][0]['source']['groupId'])){
     $id = $arrayJson['events'][0]['source']['groupId'];
  }
  	else if(isset($arrayJson['events'][0]['source']['room'])){
     $id = $arrayJson['events'][0]['source']['room'];
  }
    else if($message == "พ่อค้า"){
        $arrayPostData['events'] = $id;
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีครับติดต่อพ่อค้าเหรียญแมวโดยตรงได้ที่ Line Id : Slicksixter
		พิมพ์ HelpS เพื่อเรียกดูเมนูได้เลยครับ
		ถ้าหากต้องการให้ข้อความอัตโนมัตินี้หยุดทำงานให้พิมพ์ StopSell ได้เลยครับ";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "StopSell"){
        //$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
        $arrayPostData['events'] = $id;
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "คร๊าบผม...จะพยายามอยู่อย่างเงียบๆ นะครับ
		หากต้องการเรียกใช้ผมอีกครั้งให้พิมพ์ พ่อค้า นะครับ บ๊ายบาย...";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "HelpS"){
        //$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['events'] = $id;
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "สวัสดีครับติดต่อพ่อค้าเหรียญแมวโดยตรงได้ที่ Line Id : Slicksixter
		พิมพ์ข้อความดังต่อไปนี้เพื่อเลือกเมนูที่ต้องการ
		1.TP เพื่อตรวจเช็คเรทการเติมเงิน
		2.DT เพื่อตรวจสอบรายละเอียดเหรียญแมวที่ได้รับในแพ็คใหญ่
		3.Pro เพื่อตรวจสอบโปรโมชั่นประจำเดือน";
        replyMsg($arrayHeader,$arrayPostData);
    }
	else if($message == "Pro"){
        //$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['events'] = $id;
        $arrayPostData['messages'][0]['type'] = "text";
        $arrayPostData['messages'][0]['text'] = "📣📣 ประกาศ !! สำหรับผู้ที่เติมตรงกับวันเกิดของตัวเอง 📣📣.'<br>'

👉👉 ทางเราจัดราคาพิเศษให้ท่านทันทีไม่ต้องรอโปร

✔✔ แพ็คเกจ XL ราคาปกติ 3,500 บาท เมื่อเติมกับเราเหลือเพียง 2,900 บาทเท่านั้น ✔✔
 
✔✔ แพ็คเพจ XXXL (ไม่มีในเกม) ราคาปกติ 8,057 บาท เมื่อเติมกับเราเหลือเพียง 6,690 บาทเท่านั้น ✔✔

📍📍 โปรโมชั่นดังกล่าวไม่มีกำหนดวันหมดอายุ ไม่จำกัดจำนวนครั้ง เพียวแค่ท่านมีวันเกิดตรงกับวันที่ท่านเติม และมีหลักฐานแสดงกับทางเรารับส่วนลดตาทโปรโมชั่นดังกล่าวทันที 📍📍

▶️▶️ กรณีแพ็คภายในเกมยังมี x2 อยู่ ท่านจะได้รับในส่วนของ x2 ในแพ็คนั้นๆ ด้วย";
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "TP"){
        $image_url = "https://sv1.picz.in.th/images/2019/06/27/1C4Oqv.jpg";
        //$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['events'] = $id;
        $arrayPostData['messages'][0]['type'] = "image";
        $arrayPostData['messages'][0]['originalContentUrl'] = $image_url;
        $arrayPostData['messages'][0]['previewImageUrl'] = $image_url;
        replyMsg($arrayHeader,$arrayPostData);
    }
    else if($message == "DT"){
        //$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['events'] = $id;
        $arrayPostData['messages'][0]['type'] = "text";
	$arrayPostData['messages'][0]['text'] = "👉 แพ็ค 1,989 บาท ได้รับเหรียญแมว 298+30+30+30+12
		
		👉 แพ็ค 2,979 บาท ได้รับเหรียญแมว 598+2
		
		👉 แพ็ค 4,889 บาท ได้รับเหรียญแมว 598+298+30+30+30+14
		
		👉 แพ็ค 6,740 บาท ได้รับเหรียญแมว 598+598+298+30+30+30+14
		
		👉 👉 รายละเอียดแพ็คเกจดังกล่าวยังไม่รวมโบนัสพิเศษภายในเกม";
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
