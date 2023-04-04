<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT'].'/');
require_once (__ROOT__.'start.php');
/*
######
###### PHP 8.0
###### 
*/
$title = 'Тестовое задание 4: точка входа для API';

?><!DOCTYPE html>
<html lang="ru">
<head>
	<title><?=$title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="<?=Config::DirCSS()?>main_4.css"/>
    <script type="text/javascript" src = "<?=Config::DirJS()?>jq_v3_6_4.js"></script>
    <script type="text/javascript" src = "<?=Config::DirJS()?>script_4.js"></script>
</head>
<body>
    <h1><?=$title?></h1>
    <?=Config::Home()?>
    <div>
        <h3>Цель задания</h3>
        <ol>
            <li>Оценить навыки соискателя в области работы с PHP;</li>
            <li>Выяснить глубину погружения в задачу;</li>
            <li>Подтвердить следование стандартам оформления кода.</li>
        </ol>
        <h3>Ожидаемый результат</h3>
        <ol>
            <li>Набор PHP-файлов для приема запросов к API и их обработки;</li>
            <li>Опционально, описание API в каком-либо подходящем инструменте.</li>
        </ol>
        <h3>Краткое описание кейса</h3>
        <p>Необходимо реализовать базовый функционал точки входа для API.</p>
        <p>Для получения данных требуется basic-авторизация через логин с паролем.</p>
        <p>Единственной функцией API должна стать функция получения списка записей в каком-то хранилище.</p>
        <p>Функционал API должен быть доступен для сторонних систем так, чтобы иметь возможность запросить данные и получить их, при успешной авторизации и правильном запросе, либо получить ошибку.</p>
    <?=Config::Home()?>
</div>

</body>
</html>