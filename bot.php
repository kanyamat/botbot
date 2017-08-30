<?php
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

  }else if (strpos($_msg, 'find') !==false){
	  
       $replyToken = $event['replyToken'];
       $url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
       $x_tra = str_replace("หา","", $_msg);
       $json= file_get_contents($url);
       $events = json_decode($json, true);
		  for ($x = 0; $x <= 4; $x++) {
		    $title= $events['items'][$x]['title'];
		    $link = $events['items'][$x]['link'];
		} 
	   $messages = [
	     'type' => 'text',
	     'text' => $title,
	     'uri' => $link

	     ];
	  

  }else if ($event['type'] == 'message' && $event['message']['text'] == "ชื่ออะไร"){
    $replyToken = $event['replyToken'];   
   $messages = [
     'type' => 'text',
     'text' => "เราชื่อ botbot นะ"
     ];
   
  }else if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "button"){
    $replyToken = $event['replyToken']; 
    $messages = [
   
  'type'=> 'template',
  'altText'=> 'this is a buttons template',
  'template'=> [
      'type'=> 'buttons',
      'thumbnailImageUrl'=> 'https://botbot1234.herokuapp.com/images/image.jpg',
      'title'=> 'Menu',
      'text'=> 'Please select',
      'actions'=> [
          [
            'type'=> 'postback',
            'label'=> 'Buy',
            'data'=> 'action=buy&itemid=123'
          ],
          [
            'type'=> 'postback',
            'label'=> 'Add to cart',
            'data'=> 'action=add&itemid=123'
          ],
          [
            'type'=> 'uri',
            'label'=> 'View detail',
            'uri'=> 'http://example.com/page/123'
          ]
      ]
  ]

];  
  
  }else if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "con"){
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
   
  }else if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] == "caro"){
    $replyToken = $event['replyToken']; 
    $messages = [ 
   
  'type'=> 'template',
  'altText'=> 'this is a carousel template',
  'template'=> [
      'type'=> 'carousel',
      'columns'=> [
          [
            'thumbnailImageUrl'=> 'https://botbot1234.herokuapp.com/images/luffy.jpg',
            'title'=> 'this is menu',
            'text'=> 'description',
            'actions'=> [
                [
                    'type'=> 'postback',
                    'label'=> 'Buy',
                    'data'=> 'action=buy&itemid=111'
                ],
                [
                    'type'=> 'postback',
                    'label'=> 'Add to cart',
                    'data'=> 'action=add&itemid=111'
                ],
                [
                    'type'=> 'uri',
                    'label'=> 'View detail',
                    'uri'=> 'http://example.com/page/111'
                ]
            ]
          ],
          [
            'thumbnailImageUrl'=> 'https://botbot1234.herokuapp.com/images/chin.png',
            'title'=> 'this is menu',
            'text'=> 'description',
            'actions'=> [
                [
                    'type'=> 'postback',
                    'label'=> 'Buy',
                    'data'=> 'action=buy&itemid=222'
                ],
                [
                    'type'=> 'postback',
                    'label'=> 'Add to cart',
                    'data'=> 'action=add&itemid=222'
                ],
                [
                    'type'=> 'uri',
                    'label'=> 'View detail',
                    'uri'=> 'http://example.com/page/222'
                ]
            ]
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

   }else if (strpos($_msg, 'ต้องการ') !== false) {
    $replyToken = $event['replyToken'];
    $x_tra = str_replace("ต้องการ","", $_msg);
    $url = 'https://www.googleapis.com/customsearch/v1?&cx=014388729015054466439:e_gyj6qnxr8&key=AIzaSyDmVU8aawr5mNpqbiUdYMph8r7K-siKn-0&q='.$x_tra;
    $json= file_get_contents($url);
    $events = json_decode($json, true);
    $title= $events['items'][0]['title'];
    $title2= $events['items'][1]['title'];
    $title3= $events['items'][2]['title'];
    $title4= $events['items'][3]['title'];
    
    $link = $events['items'][0]['link'];
    $link2 = $events['items'][1]['link'];
    $link3 = $events['items'][2]['link'];
    $link4 = $events['items'][3]['link'];
    $messages = [ 
   
  'type'=> 'template',
  'altText'=> 'this is a carousel template',
  'template'=> [
      'type'=> 'carousel',
      'columns'=> [
          [
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
          ],
          [
            //'thumbnailImageUrl'=> 'https://botbot1234.herokuapp.com/images/chin.png',
            'title' =>  $x_tra,
            'text' =>   $title2,
            'actions'=> [
                [
                    'type'=> 'postback',
                    'label'=> 'OK',
                    'data'=> 'action=buy&itemid=222'
                ],
                [
                    'type'=> 'uri',
                    'label'=> 'ไปยังลิงค์',
                    'uri'=> $link2
                ]
            ]
          ],
	  [
            //'thumbnailImageUrl'=> 'https://botbot1234.herokuapp.com/images/chin.png',
            'title' =>  $x_tra,
            'text' =>   $title3,
            'actions'=> [
                [
                    'type'=> 'postback',
                    'label'=> 'OK',
                    'data'=> 'action=buy&itemid=222'
                ],
                [
                    'type'=> 'uri',
                    'label'=> 'ไปยังลิงค์',
                    'uri'=> $link3
                ]
            ]
          ],
	  [
            //'thumbnailImageUrl'=> 'https://botbot1234.herokuapp.com/images/chin.png',
            'title' =>  $x_tra,
            'text' =>   $title4,
            'actions'=> [
                [
                    'type'=> 'postback',
                    'label'=> 'OK',
                    'data'=> 'action=buy&itemid=222'
                ],
                [
                    'type'=> 'uri',
                    'label'=> 'ไปยังลิงค์',
                    'uri'=> $link4
                ]
            ]
          ]
      ]
  
]
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


      
