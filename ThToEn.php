<?php
 require_once "https://botbot1234.herokuapp.com/GoogleTrans.php";
 $word = $_REQUEST['word'];
$GT = NEW GoogleTranslate();
$response = $GT->translate('th','en',$word);  
//echo "<pre>";
echo $word."   =   ".$response;
?>
