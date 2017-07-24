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

    <script src="../../style/header.css"></script>
    <script src="<?php echo $style; ?>"></script>
    <script src="../../style/footer.css"></script>

    <style>
        <?php if (testAuthorization()):?>
        body{
            background-color: <?php echo $_SESSION['Authorization']['color']?>;
        }
       <?php endif; ?>
    </style>

</head>

<body>
<header>
    <div class="container">
    <h3>header</h3>
    </div>

</header>