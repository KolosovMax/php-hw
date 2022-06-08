<?php
$instruments = require_once "data.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Инструменты</title>
</head>
<body>
    <?php foreach ($instruments as $instrument): ?>
    <div>
        <h2><?= $instrument['title']?></h2>
        <p><?= $instrument['price'] ?></p>
        <?php if ($instrument['count'] > 0 ): ?>
        <p><?= $instrument['count'] ?></p>
        <a href="instrument.php?id=<?= $instrument['id'] ?>">Подробнее</a>
        <?php else: ?>
        <p>Товара нет в наличии</p>
        <p>Описание недоступно</p>
        <?php endif; ?>
    </div>

    <?php endforeach; ?>
</body>
</html>
