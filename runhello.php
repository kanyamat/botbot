<?php
$json = file_get_contents('hello.json');
$data = json_decode($json,true);
$message = $data['events'][0]['message']['text'];
?>
<div>
<?php echo $message ?>
</div>