<?php
ob_start();
require_once 'myFun/testAuthorization.php';

$title = 'Продукция';
// если не зарегистрированный пользователь перенаправляем на регистрацию
if (($authorization = testAuthorization()) == false) {
    header("Location: login.php");
    exit();
}

$header = "Content-Type:text/html; charset=utf-8\r\n";
$header .= "From: ";

if (!empty($_POST) === true) {
    $errors = [];

    $name = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']);
    $subject = strip_tags($_POST['subject']);
    // На случай если какая-то строка письма длиннее 70 символов мы используем wordwrap()
    $message = wordwrap((strip_tags($_POST['message'])), 70, "\r\n");

    if (empty($name) === true || empty($email) === true || empty($subject) === true || empty($message) === true) {
        $errors[] = "Каждое поле должно быть заполненно";
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Введите дейстительный email.";
        }

        if (preg_match('/[^(\w) | (\x7F-\xFF) | (\s)]/', $name)) {
            $errors[] = "Имя может содержать только буквенные символы, знаки подчеркивания и пробелы.";
        }

        if (empty($errors) === true) {
            // отправляем почту
            mail('factodessa@gmail.com', $subject, $message, $header . $email . PHP_EOL);
            header("Location: contact.php?sent");
            exit();
        }

    }

}

//$style = '../../style/home.css';

include '../headAndHeader.php';
ob_end_flush();
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2 fix">
                <h3 align="center">Обратная связь</h3>
                <?php if (isset($_GET['sent'])): ?>
                    <div class="alert alert-success" role="alert">
                        <p align="center">Спасибо! Письмо отправленно.</p>
                    </div>
                <?php else: ?>
                    <?php if (empty($errors) === false): ?>
                        <div class="alert alert-danger" role="alert">
                            <p align="center">Ошибка!</p>
                            <?php foreach ($errors as $error): ?>
                                <p><?php echo $error; ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endif ?>
                <form class="form-horizontal" action="contact.php" method="POST" novalidate>
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Name :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                   value="<?php echo $_SESSION['Authorization']['name']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-4  control-label">Email :</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                   value="<?php echo $_SESSION['Authorization']['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="col-md-4  control-label">Тема :</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="subject" id="subject"
                                   placeholder="Тема" <?php if (isset($_POST['subject'])) echo 'value="', $_POST['subject'], '"'; ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message" class="col-md-4  control-label">Сообщение :</label>
                        <div class="col-md-8">
                            <textarea rows="5" class="form-control" name="message" id="message"
                                      placeholder="Сообщение"> <?php if (isset($_POST['message'])) echo $_POST['message']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" text-center ">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

<?php
include '../footer.php';
?>