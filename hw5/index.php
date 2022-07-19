<?php
session_start();
if (isset($_SESSION['login'])) header ('Location: account.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизуйтесь</title>
</head>
<body>
    <p id="errors"></p>
    <h3>Добро пожаловать, пожалуйста авторизуйтесь!</h3>
    <form id="auth">
        <input type="text" name="login" placeholder="Введите логин"><br>
        <input type="password" name="pass" placeholder="Введите пароль">
        <button type="submit">Авторизоваться</button>
    </form>
    <p>Нет учетной записи ?</p><a href="registr.php">Зарегистрируйтесь!</a>
</body>
<script src="auth.js"></script>
</html>
