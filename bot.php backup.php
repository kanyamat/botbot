<?php

######## DATABASE ########
$conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
$dbconn = pg_pconnect($conn_string);

##########################

$access_token = 'bgcpus2P5KwACpu1UXUqwCaTmNG98QXQXzx7kNvG2mnr4LKQpDo3DHKRwK/ShDBN8DuOTST/+8C5VhzObnEEF2OTSY3vEtnrOrL65QwHqjOfpm9R8HjlInUDtPf4J6hvMqsq7LZ4DdU4rW1MrvVI5AdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
$data = json_decode($json,true);

// Parse JSON
$events = json_decode($content, true);
$_msg = $events['events'][0]['message']['text'];
// Validate parsed JSON data
if (!is_null($events['events'])) {
 // Loop through each event
 foreach ($events['events'] as $event) {
  // Reply only when message sent is in 'text' format
  if ($event['type'] == 'message' && $event['message']['type'] == 'sticker'){
//       || $event['type'] == 'message' && $event['message']['type'] == 'text') {
   
   $stick1 = $events['events'][0]['message']['packageId'];
   $stick2 = $events['events'][0]['message']['stickerId'];
   // Get replyToken
   $replyToken = $event['replyToken'];
   // Build message to reply back
   $messages = [
    'type'=> 'sticker',
    'packageId'=> $stick1,
    'stickerId'=> $stick2
   ];
   
//    // Get replyToken
//    $replyToken = $event['replyToken'];
//    // Build message to reply back
//    $messages = [
//     'type'=> 'sticker',
//     'packageId'=> '2',
//     'stickerId'=> '24'
//    ];
  
  }else if (strpos($_msg, 'สวัสดี') !== false) {
      $replyToken = $event['replyToken'];
      $text = "สวัสดีจ้า";
	 
      $messages = [
        'type' => 'text',
        'text' => $text
      ]; 

  }else if ($event['type'] == 'message' && $event['message']['text'] == "ชื่ออะไร"){
    $replyToken = $event['replyToken'];   
   $messages = [
     'type' => 'text',
     'text' => "เราชื่อ botbot นะ"
     ];
   
  }else if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "ok"){
   $replyToken = $event['replyToken']; 
//    $event = strtolower('text');
    
    $messages = [ 
  'type'=> 'template',
  'altText'=> 'this is a confirm template',
  'template'=> [
      'type'=> 'confirm',
      'text'=> 'Are you sure?',
      'actions'=> [
          [
            'type'=> 'message',
            'label'=> 'Yes',
            'text'=> 'yes'
          ],
          [
            'type'=> 'message',
            'label'=> 'No',
            'text'=> 'no'
          ]
      ]
  ]
];  
   
  }else if (strpos($_msg, 'หา') !== false) {
    $replyToken = $event['replyToken'];
    $x_tra = str_replace("หา","", $_msg);
    $url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
    //$url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyCdlIPgeHwexorxeKsVvjrW1fwh4SOjOjI&q='.$x_tra;
    //$url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyAzNh-0u0rojtkaQvmBlCg44f7oGIvFWdw&q='.$x_tra;
    //$url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyAACKRpkX5IcqTtZeQAY0i4MGM8Gx2_Xrk&q='.$x_tra;
    $json= file_get_contents($url);
    $events = json_decode($json, true);
    $title= $events['items'][0]['title'];
    $link = $events['items'][0]['link'];
    $link2 = $events['items'][1]['link'];

   $messages = [
        'type' => 'template',
        'altText' => 'template',
        'template' => [
            'type' => 'buttons',
            'title' =>  $x_tra,
            'text' =>   $title,
            'actions' => [
                [
                    'type' => 'postback',
                    'label' => 'good',
                    'data' => 'value'
                ],
                [
                    'type' => 'uri',
                    'label' => 'ไปยังลิงค์',
                    'uri' => $link
                ],
		[
                    'type' => 'uri',
                    'label' => 'ไปยังลิงค์2',
                    'uri' => $link2
                ]
            ]
        ]
    ];

   }else if (strpos($_msg, 'อยากได้') !== false) {
    $replyToken = $event['replyToken'];
    $x_tra = str_replace("อยากได้","", $_msg);
    //$url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
$url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
    $json= file_get_contents($url);
    $events = json_decode($json, true);
   	for ($i = 0 ; $i < 5 ; $i++){ 
		$title[$i] = $events['items'][$i]['title'];
		$link[$i] = $events['items'][$i]['link'];
				
    $messages[$i] = [ 

	  'type'=> 'template',
	  'altText'=> 'this is a carousel template',
	  'template'=> [
	      'type'=> 'carousel',
	      'columns'=> [ 
	
			[

		  //count($events['item']
		    //'thumbnailImageUrl'=> 'https://botbot1234.herokuapp.com/images/luffy.jpg',
		    'title' =>  $x_tra,
		    'text' =>   $title,
		    'actions'=> [

			[
			    'type'=> 'postback',
			    'label'=> 'OK',
			    'data'=> 'action=buy&itemid=111'
			],
			[
			    'type'=> 'uri',
			    'label'=> 'ไปยังลิงค์',
			    'uri'=> $link
			]
		
		    ]
		]
		    ]
		  ]
		];
}

	  
// } elseif (strpos($_msg, 'ต้องการ') !== false) {
//     $replyToken = $event['replyToken'];
//     $x_tra = str_replace("ต้องการ","", $_msg);
//     $url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
//     $json= file_get_contents($url);
//     $events = json_decode($json, true);
//       $title= $events['items'][0]['title'];
//       $link = $events['items'][0]['link'];
//      //$items = $events['items'];
   
// // foreach ($array as $item) {
// //   echo "$item\n";
// //   $array[] = $item;
// // }
	  

         
 
// // $me = array();

// // for ($i = 1; $i <5; $i++) { 
// //   $me[] = $i;
// // }
	  
//         for ($i = 0 ; $i<5 ; $i++){
//             $me = array([[
//                                 'title' => $events['items'][$i]['title'],
//                                 'text' => 'description',
//                                 'actions' => [
//                                     [
//                                         'type' => 'postback',
//                                         'label' => 'buy',
//                                         'data' => 'value'
//                                     ],
//                                     [
//                                         'type' => 'uri',
//                                         'label' => 'add to catrt',
//                                         'uri' => $events['items'][$i]['link']
//                                     ]
//                                 ]
//                              ]]);
  
//            } 
	   
//                $messages = [
//                     'type' => 'template',
//                     'altText' => 'this is a carousel template',
//                     'template' => [
//                         'type' => 'carousel',
//                         'columns' =>$me
//                     ]
//                 ];	  
	   
} else if (strpos($_msg, 'คำนวณ') !== false) {
 $replyToken = $event['replyToken'];
//********คำวณBMI********//
    $x_tra =  str_replace("คำนวณ","", $_msg);
    $pieces = explode(":", $x_tra);
    $height = str_replace("","",$pieces[0]);
    $width  = str_replace("","",$pieces[1]);
//********ใส่ 5 ค่าลง array********//	 
   
    $result = $width/($height*$height);
   
        $messages = [
        'type' => 'template',
        'altText' => 'BMI chart',
        'template' => [
            'type' => 'buttons',
            //'thumbnailImageUrl'=> 'https://bottest14.herokuapp.com/n_susu.png',
            'title' => 'BMI',
            'text' => $result ,
            'actions' => [
                [
                    'type' => 'uri',
                    'label' => 'chart',
                    'uri' => 'https://botbot1234.herokuapp.com/chart.php?data1='.$result.'&data2='.$width 
                ]
            ]
        ]
    ];
	  
//    } else if (strpos($_msg, 'แปล') !== false) {
// 	$replyToken = $event['replyToken'];
// 	$x_tra = str_replace("แปล","", $_msg);
// 	$result = 'https://botbot1234.herokuapp.com/trans.php?word='.$x_tra;	  
// 	  $messages = [
// 		'type' => 'template',
// 		'altText' => 'template',
// 		'template' => [
// 		    'type' => 'buttons',
// 		    'title' =>  "Google Translate",
// 		    'text' =>   "แปลคำว่า".$x_tra,
// 		    'actions' => [
// 			[
// 			    'type' => 'uri',
// 			    'label' => 'ไปยังลิงค์',
// 			    'uri' => $result
// 			]

// 		    ]
// 		]
// 	    ];
	  
   } else if (strpos($_msg, 'แปล') !== false) {
	$replyToken = $event['replyToken'];
	
	$x_tra = str_replace("แปล","", $_msg);
	  
	require_once 'GoogleTranslate.php';
	$word = $_REQUEST['word'].$x_tra;
	$GT = NEW GoogleTranslate();
	$response = $GT->translate('th','en',$word);  
	

	  $messages = [
		'type' => 'text',
		'text' => $word." = ".$response
	    ];	
	  
  } else if (strpos($_msg, 'บันทึก') !== false) {
    $replyToken = $event['replyToken'];
    $x_tra =  str_replace("บันทึก","", $_msg);
    $pieces = explode(":", $x_tra);
    $height = str_replace("","",$pieces[0]);
    $weight  = str_replace("","",$pieces[1]);
    $user = $events['events'][0]['source']['userId'];
//********ใส่ 5 ค่าลง array********//
#$result = serialize($user);




	  
$sql="INSERT INTO History(userid,date_history,weight,height) VALUES('Ub840b452d253f3db490dd59507ab78d1',NOW(),$weight,$height)";
pg_exec($dbconn, $sql) or die(pg_errormessage()); 	
	  
	  
  // }else if (strpos($_msg, 'test') !== false) {
  // $replyToken = $event['replyToken'];
	// $conn_string = "host=ec2-23-21-220-167.compute-1.amazonaws.com port=5432 dbname=dh3dj7jtq6jct user=kywyvkvocykcqg password=76902c76ba27fc88dbde51ca9c2e7d67af1ec06ffd14ba80853acf8e748c4a47 ";
	// $dbconn = pg_pconnect($conn_string);
 //  $sql =  "SELECT height FROM history WHERE weight='49' ";
	// $a = pg_exec($dbconn, $sql); 
	//$a = pg_query($dbconn, $sql); 
	//$a = pg_execute($dbconn, $sql); 

	//$ResId = pg_exec("SELECT weight FROM history", $dbconn);

	    // $messages = [
	    //  'type' => 'text',
	    //  'text' => $a
	    //  ]; 
	 
 }else if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "test"){
   $replyToken = $event['replyToken']; 
//    $event = strtolower('text');

$query = 'select weight from history ';
    $result = pg_query($query);
    while ($row = pg_fetch_row($result)) {
     $e =  "น้ำหนัก $row[0] ";
    }
   
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => $e 
                      ];  

$query = 'select weight from history ';
    $result = pg_query($query);
    while ($row = pg_fetch_row($result)) {
     $e =  "น้ำหนัก $row[0] ";
    }
   
                 $replyToken = $event['replyToken'];
                 $messages = [
                        'type' => 'text',
                        'text' => $e 
                      ];  



  }else{
	   $replyToken = $event['replyToken'];
	   $text = "พิมพ์ใหม่อีกทีนะ";
	    $messages = [
	     'type' => 'text',
	     'text' => $text
	     ]; 
  } 
}
}


// echo "OK"; 
 // Make a POST Request to Messaging API to reply to sender
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


      
