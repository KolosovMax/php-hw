<?php
require_once 'login_check.php';
session_start();
$server = '127.0.0.1';
$port = '3306';
$username = 'hw5';
$password = 'password';
$db_name = 'sql_lessons';

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];
$connection = new PDO("mysql:host=$server;port=$port;dbname=$db_name",
    $username, $password, $options);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') header('Location: index.php');
$login = $_POST['reg-login'];
$pass = $_POST['reg-pass'];
$connection->exec('CREATE TABLE IF NOT EXISTS tb_auth(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(50) NOT NULL UNIQUE ,
    password VARCHAR(255) NOT NULL 
)');
if (strlen(trim($login)) > 2 && strlen(trim($pass)) > 2) {
    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);
    $data =
        [
            'login_value' => $login,
            'pass_value' => $hash_pass,
        ];

    if (loginCheck($login,$connection)) {
        $_SESSION['message'] = 'success';
        header('Location: registr.php');
        $sql = "INSERT INTO tb_auth (login, password)
        VALUES (:login_value, :pass_value)";
        $statement = $connection->prepare($sql);
        $result = $statement->execute($data);
    } else {
        $_SESSION['message'] = 'log-error';
        header('Location: registr.php');
    }
} else {
    $_SESSION['message'] = 'error';
    header('Location: registr.php');
}