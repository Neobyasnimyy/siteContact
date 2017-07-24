<?php

require 'myFun/testAuthorization.php';

$title="Register";
$file = "register.txt";

if (!empty($_POST)===true) {

    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $text = [];

    if (empty($name) === true || empty($password) === true || empty($email) === true) {
        $message[] = "Каждое поле должно быть заполненно";
    } else {
        // проверка что такого пользователя у нас не зарегестрирован по email
        if (file_exists($file)) {
            if ($handle = @fopen($file, "r")) {
                while (($buffer = fgets($handle)) !== false) {
                    $item = unserialize($buffer);
                    if ($item['email']==$email){
                        $message[] = "Пользователь с такой почтой уже существует.";
                    }
                }
                fclose($handle);
            } else {
                $message[] = "Ошибка регистрации. Повторите позже.";
            }
        }

        if (preg_match('/[^(\w) | (\x7F-\xFF) | (\s)]/', $name)) {
            $message[] = "Имя может содержать только буквенные символы, знаки подчеркивания и пробелы.";
        }
        // почему то регулярка не захотела работать
/*        if (preg_match('/(?=^.{8,16}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password)) {
            $message[] = "Пароль должен содержать cтрочные и прописные латинские буквы, цифры, спецсимволы. Минимум 8 символов";
        }*/
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);

        if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
            $message[] = "Пароль должен содержать cтрочные и прописные латинские буквы, цифры, спецсимволы. Минимум 8 символов";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message[] = "Введите дейстительный email.";
        }

        if (empty($message) === true) {
            // записываем usera

            if ($handle = @fopen($file, 'a')) {
                $text['name'] = $name;
                $text['password'] = $password;
                $text['email'] = $email;
                flock($handle, LOCK_EX);//Блокировка файла,на запись другими процессами
                fwrite($handle, serialize($text) . PHP_EOL);
                flock($handle, LOCK_UN);//СНЯТИЕ БЛОКИРОВКИ
                fclose($handle);
                session_start();
                session_regenerate_id();// на всякий случай создаем новый id сессии
                $_SESSION['Authorization'] = [];
                $_SESSION['Authorization']['id'] = session_id();
                $_SESSION['Authorization']['ip']=$_SERVER['REMOTE_ADDR'];
                $_SESSION['Authorization']['name']=$name;
                $_SESSION['Authorization']['email']=$email;
                setcookie('name', $name, time() + (60*60*24),'/');
                header('Content-Type: text/html; charset=utf-8');
                header('Location: home.php'); // редирект, на главную страницу
                exit();
            } else {
                $message[] = "Ошибка регистрации. Повторите позже";
            }
        }
    }
}
// если активный пользователь и попал на регистрацию перенаправляем на главную
if (testAuthorization()){
    header("Location: home.php");
    exit();
}

?>
<?php include '../headAndHeader.php'?>

<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 col-xs-8 col-xs-offset-2">
            <h3 align="center">Регистрация</h3>
            <?php if (empty($message) === false): ?>
                <div class="alert alert-info" role="alert">
                    <?php foreach ($message as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form class="form-horizontal" action="register.php" method="POST" novalidate>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Ваше имя :</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Имя"  <?php if(isset($_POST['name'])) echo 'value="',$_POST['name'],'"';?>>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Пароль :</label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" name="password" id="name" placeholder="Имя" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-4 control-label">Ваша почта :</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="email" id="email" placeholder="andrey@gmail.com" <?php if(isset($_POST['email'])) echo 'value="',$_POST['email'],'"';?>>
                    </div>
                </div>

                <div class="form-group">
                    <div class=" text-right ">
                        <button type="submit" class="btn btn-primary">Зарегистрировать</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../footer.php'?>
