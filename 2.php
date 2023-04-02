<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT'].'/');
require_once (__ROOT__.'start.php');
/*
######
###### PHP 8.0
###### 
*/
$title = 'Тестовое задание 2: XSLT-трансформация';
$home = '<p><a href = "/">Главная</a></p>'."\n";

$link = __ROOT__.'test_task_2.xml';
$classXML = new ParsXML($link);

?><!DOCTYPE html>
<html lang="ru">
<head>
	<title><?=$title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="<?=Config::DirCSS()?>main.css"/>
</head>
<body>
    <h1><?=$title?></h1>
    <?=$home?>
    <article>
        <h3>Цель задания</h3>
        <ol>
            <li>Оценить навыки соискателя в работе со структурированными данными;</li>
            <li>Выяснить степень владения технологиями XSLT и XPath;</li>
            <li>Подтвердить следование стандартам оформления кода.</li>
        </ol>
        <h3>Ожидаемый результат</h3>
        <ol>
            <li>XSLT-трансформация, представляющая исходный код в виде таблицы HTML, тестирование которой можно провести в браузере Google Chrome;</li>
            <li>Выяснить степень владения технологиями XSLT и XPath;</li>
            <li>Подтвердить следование стандартам оформления кода.</li>
        </ol>
        <h3>Краткое описание кейса</h3>
        <p>Достаточно часто данные, передаваемые между системами, формируются в виде XML-файлов. Преобразование одного XML в другой без использования сложных инструментов – важный навык, позволяющий работать со сложными системами.</p>
        <p>Нужно взять XML данные (ссылка) и преобразовать их с помощью XSL-трансформации в таблицу с полями.</p>
        <p>Формат таблицы результата:</p>
    </article>
    <div class="div-table">
        <?=$classXML?>
    </div>
    <?=$home?>
</body>
</html>