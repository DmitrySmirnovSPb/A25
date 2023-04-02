<?php
/*
######
###### PHP 8.0
###### Установка кодировки UTF8
###### Вывод всех ошибок
###### Старт сессии
###### автозагрузка классов
###### 
*/
mb_internal_encoding('UTF-8');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
  
$link = PATH_SEPARATOR.$_SERVER['DOCUMENT_ROOT'].'/';
set_include_path(get_include_path().$link.'oop');
spl_autoload_extensions('_class.php');
spl_autoload_register();

?>