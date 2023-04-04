<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT'].'/');
require_once (__ROOT__.'start.php');
/*
######
###### PHP 8.0
###### 
*/
$title = 'Тестовое задание 3: “симпатичная” форма';

?><!DOCTYPE html>
<html lang="ru">
<head>
	<title><?=$title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="<?=Config::DirCSS()?>main_3.css"/>
    <script type="text/javascript" src = "<?=Config::DirJS()?>jq_v3_6_4.js"></script>
    <script type="text/javascript" src = "<?=Config::DirJS()?>script_3.js"></script>
</head>
<body>
    <h1><?=$title?></h1>
    <?=Config::Home()?>
    <div class = "left">
        <h3>Цель задания</h3>
        <ol>
            <li>Оценить навыки соискателя в области верстки, работы со стилями, понимания событийной модели JS;</li>
            <li>Выяснить глубину погружения в задачу;</li>
            <li>Подтвердить следование стандартам оформления кода.</li>
        </ol>
        <h3>Ожидаемый результат</h3>
        <ol>
            <li>HTML файл с “приятной” формой обратной связи, тестирование которой можно провести в браузере Google Chrome;</li>
            <li>Решение необходимо выложить на каком-то ресурсе в сети (можно взять бесплатный тестовый на 15 дней, например, вот тут https://sprinthost.ru/). Необходимо будет предоставить доступ к решению по FTP.</li>
            <li>Файл стилей;</li>
            <li>Файл скриптов, если нужен;</li>
            <li>Опционально, код обработки формы на серверной стороне.</li>
        </ol>
        <h3>Краткое описание кейса</h3>
        <p>ДНа большинстве сайтов есть потребность получать обратную связь от посетителя. При этом для разных сайтов ценность той или иной информации разнится, хотя общие принципы ее получения остаются едиными.</p>
        <p>В рамках задачи необходимо создать форму обратной связи с полями: имя, телефон, email, комментарий. Внешний вид формы должен быть приятен и понятен пользователю. Если в форме будут какие-то события - их назначение тоже должно быть очевидно..</p>
    <?=Config::Home()?>
</div>
    <form class="form">
        <h2>Задать вопрос</h2>
        <p type="Имя:"><input placeholder="Напишите здесь Ваше имя.." ></input></p>
        <p type="Телефон:"><input placeholder="Укажите Ваш номер телефона.." ></input></p>
        <p type="Email:"><input placeholder="Укажите здесь вашу почту.." ></input></p>
        <p type="Вопрос:"><input placeholder="Что Вас интересует?" ></input></p>
        <button>Задать вопрос</button>
        <div>
            <span class="fa fa-phone"></span>+7 800 800-8000
            <span class="fa fa-envelope-o"></span>contact@my-website.com
        </div>
    </form>
</body>
</html>