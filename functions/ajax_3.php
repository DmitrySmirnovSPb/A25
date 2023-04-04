<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT'].'/');
require_once (__ROOT__.'start.php');
/*
######
###### PHP 8.0
###### 
*/

$message = new Ajax($_POST);
if($message->answer == 'Ok')
    echo "Ваш вопрос зафиксирован! В ближайшее время с Вами свяжется наш специалист.";
else{
    $error = '';
    foreach($message->getError() as $value)
        $error .= $value."\n";
    echo $error;
}
?>