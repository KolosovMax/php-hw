<?php
require_once 'table_exists.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
}
$user_login = $_POST['login'];
$user_pass = $_POST['pass'];

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

$sql = 'SELECT login, password FROM tb_auth';
$table = 'tb_auth';
if (tableExists($connection, $table)) {
    $results = ($connection->query($sql)->fetchAll(PDO::FETCH_ASSOC));
    foreach ($results as $result) {
        if ($result['login'] === $user_login && password_verify( $user_pass, $result['password'])) {
            $_SESSION['login'] = $user_login;
            $answer='success';
            break;
        } else {
            $answer='error1';
        }
    }
} else {
    $answer = 'error2';
}
echo $answer;