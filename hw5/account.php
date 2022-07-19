<?php
session_start();
if (!isset($_SESSION['login'])) header('Location: index.php');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
</head>
<body>
    <h4><?= $_SESSION['login'] ?>, добро пожаловать в ЛК </h4>
    <a href="logout.php">Выход</a>
</body>
</html>
