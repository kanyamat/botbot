<?php
$word = $_GET["$word"];
echo $word;
 require_once "GoogleTranslate.php";
 //$word = $_REQUEST['word'];
$GT = NEW GoogleTranslate();
$response = $GT->translate('en','th',$word);
//echo "<pre>";
echo $word."   =   ".$response;
?>
