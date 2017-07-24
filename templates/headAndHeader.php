<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo (!empty($title)==true)? $title: 'Site'?></title>

    <!-- 1. Подключаем скомпилированный и минимизированный файл CSS Bootstrap 3 -->
    <link href="../../style/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- 2. Подключаем библиотеку jQuery, необходимую для работы скриптов Bootstrap 3 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- 3. Подключаем скомпилированный и минимизированный файл JavaScript платформы Bootstrap 3 -->
    <script src="../../style/bootstrap/js/bootstrap.min.js"></script>

    <link href="../../style/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="../../style/base.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo (isset($style))? $style:''; ?>">

    <style>
        <?php if (testAuthorization()):?>
        body{
            background-color: <?php echo $_SESSION['Authorization']['fontColor']?>;
        }
       <?php endif; ?>

    </style>

</head>

<body>
<header>
        <div class="navbar navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">My Site</a>
                </div>
                <div class="navbar-collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="home.php">Главная</a></li>
                        <li><a href="#about">Контакт</a></li>
                        <li><a href="articles.php">Статьи</a></li>
                        <li><a href="product.php">Продукция</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if ($authorization):?>
                            <li><a href="admin.php">Здравствуйте <?php echo $_COOKIE['name']?></a></li>
                            <li><a href="logout.php">Выйти</a></li>
                        <?php else:?>
                            <li><a href="register.php">Регистрация</a></li>
                            <li><a href="login.php">Войти</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
</header>