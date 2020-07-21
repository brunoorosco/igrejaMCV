<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?= asset('img/Favicon.ico') ?>" type="image/x-icon">
    <title><?= $title; ?></title>
  
    <link href="<?= asset('bootstrap/css/bootstrap.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= asset('css/style.css')?>"/>
    <?= $v->section("css"); ?>
</head>

<body class="login">
  
    <main class="main_content">
        <?= $v->section("content"); ?>
    </main>

    <footer class="main_footer">
        <?= SITE['name'] ?> - Todos os Direitos Reservados
    </footer>

    <script src="<?= asset('js/jquery-3.4.1.js')?>"></script>
    <script src="<?= asset('js/jquery-ui.min.js')?>"></script>
    <script scr="<?= asset('bootstrap/js/bootstrap.min.js')?>"></script>
    <?= $v->section("scripts"); ?>
</body>

</html>