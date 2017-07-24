<?php

require 'myFun/testAuthorization.php';

$title = "Adminka";
$yourfile = "register.txt";

// если не зарегистрированный пользователь  перенаправляем на вход
if (!($authorization=testAuthorization())) {
    header("Location: login.php");
    exit();
}

$colors = ['white', 'whitesmoke', 'wheat', 'lightyellow', 'lightskyblue', 'burlywood'];
// смена фона
if (!empty($_POST['fontColor']) === true) {
    $_SESSION['Authorization']['fontColor'] = $_POST['fontColor'];
    // проверяем доступен ли файл для записи и чтения
    if ((is_readable($yourfile)and (is_writable($yourfile)))){
        $file = file($yourfile);
        $find = false; // это будет проверка нашли ли мы запись
        foreach ($file as &$item) {
            $item = unserialize($item);
            if (($item['name'] === $_SESSION['Authorization']['name']) and ($item['email'] === $_SESSION['Authorization']['email'])) {
                $item['fontColor'] = $_POST['fontColor'];
                $find = true;
            }
            $item = serialize($item) . PHP_EOL;
        }
        if ($find==true){
            // перезаписываем наш файл с регистрацией
            if (file_put_contents($yourfile, implode("", $file),LOCK_EX) !== false) {
                $message[] = "Смена фона успешно произведена.";
                // как в этом случае очистить запрос, чтобы при обновлении страницы не повторялся?
            }else{
                $message[] = "Ошибка записи данных.";
            }
        }
    }else{
        $message[] = "Ошибка записи данных";
    }
}

// смена пароля
if ((!empty($_POST['oldPassword']) === true) and (!empty($_POST['newPassword']) === true)) {
    $oldPassword = strip_tags($_POST['oldPassword']);
    $newPassword = strip_tags($_POST['newPassword']);

    $uppercase = preg_match('@[A-Z]@', $newPassword);
    $lowercase = preg_match('@[a-z]@', $newPassword);
    $number = preg_match('@[0-9]@', $newPassword);
    if (empty($oldPassword) === true || empty($newPassword) === true) {
        $message[] = "Каждое поле должно быть заполненно";
    } elseif (!$uppercase || !$lowercase || !$number || strlen($newPassword) < 8) {
        $message[] = "Новый пароль должен содержать cтрочные и прописные латинские буквы, цифры, спецсимволы. Минимум 8 символов";
    } else {
        // проверяем доступен ли файл для записи и чтения
        if ((is_readable($yourfile)and (is_writable($yourfile)))){
            $file = file($yourfile);
            $find = false; // это будет проверка соответствия на старый пароль и на остальное
            foreach ($file as &$item) {
                $item = unserialize($item);
                if (($item['name'] === $_SESSION['Authorization']['name']) and ($item['password'] === $oldPassword) and ($item['email'] === $_SESSION['Authorization']['email'])) {
                    $item['password'] = $newPassword;
                    $find = true;
                }
                $item = serialize($item) . PHP_EOL;
            }
            if ($find==true){
                // перезаписываем наш файл с регистрацией
                if (file_put_contents($yourfile, implode("", $file),LOCK_EX) !== false) {
                    $message[] = "Смена пароля успешно произведена.";
                }else{
                    $message[] = "Ошибка записи данных.";
                }
            }else{
                $message[] = "Ошибка ввода действующего пароля.";
            }
        }else{
            $message[] = "Ошибка записи данных";
        }
    }
}

?>

<?php include '../headAndHeader.php' ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2">
            <?php if (empty($message) === false): ?>
                <div class="alert alert-info" role="alert">
                    <?php foreach ($message as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div><br>
            <?php endif; ?>
            <h4 align="left">Поменять цвет фона сайта</h4>
            <form class="form-inline" action="" method="POST">

                <div class="form-group">
                    <label for="color" class="control-label">Выбрать </label>
                    <select name="fontColor" id="color" class="form-control">
                        <?php foreach ($colors as $color): ?>
                            <option value="<?php echo $color; ?>"
                                <?php if (isset($_SESSION['Authorization']['fontColor']) && ($color == $_SESSION['Authorization']['fontColor'])) {
                                    echo 'selected';
                                } ?>>
                                <?php echo $color; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class=" form-group">
                    <div class=" text-right ">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-xs-10 col-xs-offset-1">
            <h4 align="left">Поменять пароль</h4>
            <form class="form-inline" action="" method="POST" novalidate>
                <div class="form-group">
                    <input type="password" class="form-control" name="oldPassword" placeholder="Старый пароль" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="newPassword" placeholder="Новый пароль" required>
                </div>
                <div class=" form-group">
                    <div class=" text-right ">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../footer.php' ?>

