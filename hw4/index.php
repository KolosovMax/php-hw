<?php
require_once 'post_validate.php';
require_once 'link_validate.php';
$long_link = postCheck();
if ($_SERVER['REQUEST_METHOD'] === 'POST') $short_link = linkCheck($long_link);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страница</title>
</head>
<body>
    <form action="index.php" name="long-link" method="post">
        <h4>Введите ссылку, чтобы проверить.</h4>
        <input name="long-link" size="50"
               <?php if (isset($long_link)): ?> value="<?= $long_link ?>" <?php endif; ?>
               placeholder="Введите ссылку"><br>
        <button type="submit">Проверить</button>
    </form>
    <p>Сокращенная ссылка: </p>
    <input name="shortLink" size="50"
        <?php if (isset($short_link)): ?> placeholder="Ссылка"
            value="<?= $short_link ?>" <?php endif ?>>
</body>
</html>
