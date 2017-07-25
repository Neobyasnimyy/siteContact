<?php

require 'myFun/testAuthorization.php';
$title="LogIn";
$file = "register.txt";

if (!empty($_POST)===true) {

    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $text = [];

    if (empty($password) === true || empty($email) === true) {
        $message[] = "Каждое поле должно быть заполненно";
    } else {
        // проверка что такой пользователь у нас зарегестрирован по email и паролю
        if (file_exists($file)) {
            if ($handle = @fopen($file, "r")) {
                while (($buffer = fgets($handle)) !== false) {
                    $item = unserialize($buffer);
                    if (($item['email']===$email)and($item['password']===$password)){
                        // нашли запись необходимо активировать сессию и куки для него
                        session_start();
                        session_regenerate_id();// на всякий случай создаем новый id сессии
                        $_SESSION['Authorization'] = [];
                        $_SESSION['Authorization']['id'] = session_id();
                        $_SESSION['Authorization']['ip']=$_SERVER['REMOTE_ADDR'];
                        $_SESSION['Authorization']['name']=$item['name'];
                        $_SESSION['Authorization']['email']=$email;
                        $_SESSION['Authorization']['fontColor']=$item['fontColor'];
                        setcookie('name', $item['name'], time() + (60*60*24),'/');
                        header('Location: home.php'); // редирект, на главную страницу
                        exit();
                        break; // выходим из while но exit должен сработать=)
                    }
                }
                fclose($handle);
            } else {
                $message[] = "Ошибка входа. Повторите позже.";
            }
        }
        // если не нашли запись вывести сообщение
        $message[] = "Ошибка входа. Проверьте логин и пароль.";
    }
}

// если активный пользователь и попал на вход перенаправляем на главную
if ($authorization=testAuthorization()){
    header("Location: home.php");
    exit();
}


?>

<?php include '../headAndHeader.php'?>

    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-offset-3 col-xs-8 col-xs-offset-2">
                <h3 align="center">Вход</h3>
                <?php if (empty($message) === false): ?>
                    <div class="alert alert-info" role="alert">
                        <?php foreach ($message as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form class="form-horizontal" action="login.php" method="POST" novalidate>

                    <div class="form-group">
                        <label for="email" class="col-md-4 control-label">Ваша почта :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="email" id="email" placeholder="andrey@gmail.com" <?php if(isset($_POST['email'])) echo 'value="',$_POST['email'],'"';?>>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Пароль :</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="password" id="name" placeholder="Имя" >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class=" text-right ">
                            <a href="register.php" class="btn btn-primary">Регистрация</a>
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include '../footer.php' ?>