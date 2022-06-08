<?php

if ($_SERVER['REQUEST_METHOD'] !== 'GET') header(' Location instruments.php');

$instrument_id = (int) $_GET['id'];
if(!isset($instrument_id)) header('Location: instruments.php');

$instruments = require_once 'data.php';

foreach ($instruments as $item){
    if ($item['id'] == $instrument_id ) {
        $instrument = $item;
        break;
    }
}
if(!isset($instrument) || $instrument['count']<=0) header('Location: instruments.php');

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $instrument['title'] ?></title>
</head>
<body>
    <div>
        <h2><?= $instrument['title'] ?></h2>
        <img src="img/<?= $instrument['image']?>" alt="<?= $instrument['title'] ?>">
        <p><?= $instrument['description'] ?></p>
        <p><?= $instrument['price'] ?></p>
        <p><?= $instrument['count'] ?></p>
        <a href="instruments.php">Назад</a>
    </div>
</body>
</html>
