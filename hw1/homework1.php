<?php
// ЗАДАЧА 1
// создать новый массив из элементов массива $users, среди увлечений которых есть 'Фотография'
$users = [
    [
        'id' => 1,
        'name' => 'Александр',
        'age' => 46,
        'hobbies' => ['Чтение', 'Фотография']
    ],
    [
        'id' => 2,
        'name' => 'Ирина',
        'age' => 33,
        'hobbies' => ['Музыка', 'Фотография', 'Путешествия']
    ],
    [
        'id' => 3,
        'name' => 'Алексей',
        'age' => 28,
        'hobbies' => ['История', 'Реконструкция']
    ],
    [
        'id' => 4,
        'name' => 'Евгений',
        'age' => 26,
        'hobbies' => ['Спорт']
    ],
    [
        'id' => 5,
        'name' => 'Оксана',
        'age' => 22,
        'hobbies' => ['Спорт', 'Фотография']
    ],
];

$foto =[];
foreach ($users as $user){
    if (in_array('Фотография', $user['hobbies'])) $foto[]= $user;
}
var_dump($foto);
// ЗАДАЧА 2
// Дан массив $tours. Увеличить стоимость каждого тура на 10%. Стоимость австралийских туров на 12%
$tours = [
    [
        'id' => 1,
        'city' => 'Лондон',
        'price' => 3600,
        'country' => 'Великобритания'
    ],
    [
        'id' => 2,
        'city' => 'Осло',
        'price' => 2800,
        'country' => 'Норвегия'
    ],
    [
        'id' => 3,
        'city' => 'Сидней',
        'price' => 4100,
        'country' => 'Австралия'
    ],
    [
        'id' => 4,
        'city' => 'Канберра',
        'price' => 3900,
        'country' => 'Австралия'
    ]
];
foreach ($tours as &$tour){
    if ( $tour['country'] =='Австралия') $tour['price'] *= 1.12;
    else $tour['price'] *= 1.1;
}
unset($tour);
var_dump($tours);
// ЗАДАЧА 3. Сгенерировать html на основе данных массива $items
$items = [
    [
        'id' => 1,
        'title' => 'Flute',
        'price' => 20000,
        'img' => 'flute.jpg',
        'description' => [
            'color' => 'white',
            'material' => 'bamboo'
        ]
    ],
    [
        'id' => 2,
        'title' => 'Guitar',
        'price' => 18000,
        'img' => 'guitar.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'linden'
        ]
    ],
    [
        'id' => 3,
        'title' => 'Drum',
        'price' => 68000,
        'img' => 'drum.jpg',
        'description' => [
            'color' => 'brown',
            'material' => 'steel'
        ]
    ],
];
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Музыкальные инструменты</title>
</head>
<body>
    <?php foreach ($items as $item): ?>
        <div>
            <h2><?= $item['title'] ?></h2>
            <p><?= $item['price'] ?></p>
            <img src="<?= $item['img'] ?>">
            <ul>
            <?php foreach ($item['description'] as $description): ?>
            <li><?= $description ?></li>
            <?php endforeach; ?>
            </ul>
        </div>
<?php endforeach; ?>
</body>
</html>
