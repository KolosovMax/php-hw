<?php
session_start();
if (isset($_SESSION['message'])) $message = $_SESSION['message'];
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">

    <title>Регистрация</title>
</head>
<body>
    <form name="reg-form" method="post" action="record_bd.php">
        <input name="reg-login" type="text" placeholder="Введите логин">
        <input name="reg-pass" type="password" placeholder="Введите пароль">
        <button type="submit">Зарегестрироваться</button>
    </form>
    <?php if(isset($message)): ?>
    <?php if($message === 'error'): ?>
    <p>Логин и пароль должны быть больше 2х знаков</p>
    <?php elseif($message === 'success'): ?>
    <p>Вы удачно зарегестрировались</p>
    <a href="index.php">Страница авторизации</a>
    <?php else: ?>
    <p>Такой логин уже существует, попробуйте другой логин</p>
    <?php endif;?>
    <?php endif; unset($_SESSION['error'])?>
</body>
</html>