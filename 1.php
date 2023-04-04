<?php
define('__ROOT__', $_SERVER['DOCUMENT_ROOT'].'/');
require_once (__ROOT__.'start.php');
/*
######
###### PHP 8.0
###### 
*/
	$title = 'Тестовое задание 1: ловец лидов для сайта';
	$home = '<p><a href = "/">Главная</a></p>'."\n";
    $flag = 'none';
    if(isset($_POST['submit']) && $_POST['submit'] == 'Свяжитесь со мной'){
        $data = new NewLead($_POST);
        $flag = $data->answer;
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<title><?=$title?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" type="text/css" href="<?=Config::DirCSS()?>main_1.css"/>
    <script type="text/javascript" src = "<?=Config::DirJS()?>jq_v3_6_4.js"></script>
    <script type="text/javascript" src = "<?=Config::DirJS()?>script_1.js"></script>
<?php if(isset($data->answer) && $data->answer == 'none') {
    $strError = '';
    foreach($data->getError() as $value)
        $strError .= $value.'\n';
    ?>
    <script type="text/javascript">
        alert('<?=$strError?>');
    </script>
<?php } ?>
</head>
<body>
    <div id = "top" flag = "<?=$flag?>"></div>
    <h1><?=$title?></h1>
    <?=$home?>
    <article>
        <h3>Цель задания</h3>
        <ol>
            <li>Оценить навыки соискателя в области верстки, работы со стилями, понимания событийной модели JS;</li>
            <li>Выяснить глубину проработки задачи и осознание тонких моментов;</li>
            <li>Подтвердить следование стандартам оформления кода.</li>
        </ol>
        <h3>Ожидаемый результат</h3>
        <ol>
            <li>Сверстанная форма со стилизацией и событиями;</li>
            <li>Деплой формы на тестовом проекте в веб: Решение необходимо выложить на каком-то ресурсе в сети (можно взять бесплатный тестовый на 15 дней, например, вот тут https://sprinthost.ru/). Необходимо будет предоставить доступ к решению по FTP.</li>
            <li>Опционально: код обработки формы на серверной стороне.</li>
        </ol>
        <h3>Краткое описание кейса</h3>
        <p>Необходимо реализовать форму ловца лидов, реагирующую на событие пересечения мышью верхней линии страницы.</p>
        <p>Пользователь, проведя некоторое время на сайте может не найти ответа на свой вопрос и просто закрыть страницу. Чтобы не потерять пользователя, интернет-маркетологи используют ловца лидов – это форма, которая появляется на экране при попытке закрыть страницу и предлагает посетителю оставить свои контактные данные, чтобы получить обратный звонок.</p>
        <p>Важное требование: форма не должна препятствовать закрытию страницы.</p>
    </article>
	<div id="form">
        <div class="close"><span>&#215;</span></div>
        <h2>Не нашли интерисующую Вас информацию?</h2>
        <h3>Оставьте Ваш номер телефона, мы обязательно перезвоним.</h3>
		<form name="MyForm" action = "/1.php" method="post">
			<p><input type="text" name="name" placeholder="Имя" ></p>
            <p><input type="tel" name="phone" placeholder="Номер телефона" ></p>
            <p><input type="email" name="email" placeholder="E-mail" ></p>
            <p><input type="submit" name="submit" value="Свяжитесь со мной" ></p>
		</form>
	</div>
    <?=$home?>
</body>
</html>