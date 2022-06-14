<?php
$instruments = require_once 'data.php';
?>
<!doctype html>
<html lang="ru">
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
            <button data-id="<?= $instrument['id'] ?>" type="button" >Подробнее</button>
        <?php else: ?>
            <p>Товара нет в наличии</p>
            <p>Описание недоступно</p>
        <?php endif; ?>
    </div>

    <?php endforeach; ?>

<script src="instrument.js"></script>
</body>
</html>
