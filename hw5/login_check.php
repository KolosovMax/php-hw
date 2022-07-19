<?php
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
$login = 'qwerty';

function loginCheck($login, $connection)
{
    $arr = ($connection->query('SELECT login FROM tb_auth'))->fetchAll(PDO::FETCH_ASSOC);
    foreach ($arr as $log_info) {
        if ($login === $log_info['login']) {
            $answer = FALSE;
            break;
        } else {
            $answer = TRUE;
        }
    }
    return $answer;
}

var_dump(loginCheck($login, $connection));