<?php

require 'myFun/testAuthorization.php';
$title = "Adminka";

// если не зарегистрированный пользователь  перенаправляем на вход
if (!testAuthorization()) {
    header("Location: login.php");
    exit();
}

$colors = ['white', 'whitesmoke', 'wheat', 'lightyellow', 'lightskyblue', 'burlywood'];

if (!empty($_POST['color'])===true) {
    $_SESSION['Authorization']['color']=$_POST['color'];
}
if ((!empty($_POST['oldPassword'])===true)and(!empty($_POST['newPassword'])===true)) {
    $oldPassword = strip_tags($_POST['oldPassword']);
    $newPassword = strip_tags($_POST['newPassword']);

    $uppercase = preg_match('@[A-Z]@', $newPassword);
    $lowercase = preg_match('@[a-z]@', $newPassword);
    $number    = preg_match('@[0-9]@', $newPassword);
    if (empty($oldPassword) === true || empty($newPassword) === true ) {
        $message[] = "Каждое поле должно быть заполненно";
    }elseif (!$uppercase || !$lowercase || !$number || strlen($newPassword) < 8){
        $message[] = "Новый пароль должен содержать cтрочные и прописные латинские буквы, цифры, спецсимволы. Минимум 8 символов";
    }else {
        $yourfile = "register.txt";
        $oldstr = "Старый текст";
        $newstr = "Новый текст";
        $file = file($yourfile);
        if (is_array($file))
        {
            foreach($file as  &$item)
            {$item = unserialize($item);
                if (($item['name']==$_SESSION['Authorization']['name'])and($item['password']==$oldPassword) and ($item['email']==$_SESSION['Authorization']['email'])){
                    $item['password']= $newPassword;
                }
                $item = serialize($item).PHP_EOL;
            }
        }
        else
        {
            exit ("Ошибка");
        }
       // перезаписываем наш файл с регистрацией
        if (file_put_contents ($yourfile,implode("",$file))!==false){
            $message[] = "Смена пароля успешно произведена.";
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
            <h4 align="left">Поменять цвет фона</h4>
            <form class="form-inline" action="" method="POST">

                <div class="form-group">
                    <label for="color" class="control-label">Выбрать </label>
                        <select  name="color" id="color" class="form-control">
                            <?php foreach ($colors as $color): ?>
                            <option value="<?php echo $color;?>"
                                <?php if (isset($_SESSION['Authorization']['color']) && ($color == $_SESSION['Authorization']['color'])) {
                                    echo 'selected';
                                } ?>>
                                <?php echo $color;?>
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
                    <input type="password" class="form-control" name="oldPassword" placeholder="Старый пароль" required >
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="newPassword" placeholder="Новый пароль" required >
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

