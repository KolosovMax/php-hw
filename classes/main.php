<?php
require_once 'item.php';
require_once 'itemStorage.php';
// создать объекты Item (товар) и ItemStore (хранилище),
// добавить товары в хранилище
// вызвать методы поиска товаров в хранилище:
// get_by_material,
// get_by_price_and_material,
// get_by_price
$item01 = new Item(1, 'item1');
$item02 = new Item(2,'item2');
$item01->setPrice(5000);
$item02->setPrice(2000);
$item01->setMaterial('paper');
$item02->setMaterial('rock');

$storage = new ItemStorage();
$storage->add_item($item01);
$storage->add_item($item02);
var_dump($storage->get_by_id(5));
var_dump($storage->get_by_id(1));

var_dump($storage->get_by_title('sddf'));
var_dump($storage->get_by_title('item2'));

var_dump($storage->get_by_price(3000, 6000));
var_dump($storage->get_by_price(500, 1000));

var_dump($storage->get_by_material('rock','paper'));
var_dump($storage->get_by_material('roc7k','pape7r'));

var_dump($storage->get_by_price_and_material(3000, 'rock'));
var_dump($storage->get_by_price_and_material(100,'paper'));