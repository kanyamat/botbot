<?php
$access_token = 'bgcpus2P5KwACpu1UXUqwCaTmNG98QXQXzx7kNvG2mnr4LKQpDo3DHKRwK/ShDBN8DuOTST/+8C5VhzObnEEF2OTSY3vEtnrOrL65QwHqjOfpm9R8HjlInUDtPf4J6hvMqsq7LZ4DdU4rW1MrvVI5AdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
$data = json_decode($json,true);
// Parse JSON
$events = json_decode($content, true);
$_msg = $events['events'][0]['message']['text'];

$replyToken = $event['replyToken']; 

      'actions' => [
          [
              'type' => 'uri',
              'uri' => 'https://botbot1234.herokuapp.com/GoogleTrans.php'
          ]
       ];

 //require_once("https://botbot1234.herokuapp.com/GoogleTrans.php");
 $word = $_REQUEST['word'];
 $GT = NEW GoogleTranslate();
 $response = $GT->translate('th','en',$word);  
//echo "<pre>";
//echo $word."   =   ".$response;

   $messages = [
     'type' => 'text',
     'text' => $word. " = " .$response;
     ];



  $url = 'https://api.line.me/v2/bot/message/reply';
   $data = [
    'replyToken' => $replyToken,
    'messages' => [$messages],
   ];
   $post = json_encode($data);
   $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
   $result = curl_exec($ch);
   curl_close($ch);
   echo $result . "\r\n";


?>
