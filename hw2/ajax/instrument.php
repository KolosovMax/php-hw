<?php
if ($_SERVER['REQUEST_METHOD'] !== 'GET') echo json_encode('Ошибка : недопустимый http метод');
$instrument_id = $_GET['id'];
if (!isset($instrument_id)) echo json_encode('Ошибка : инструмент не найден');
$instruments = require_once 'data.php';
foreach ($instruments as $item){
    if ($item['id'] == $instrument_id ) {
        $instrument = $item;
        break;
    }
}
if(!isset($instrument) || $instrument['count']<=0) echo json_encode('Ошибка: информация по указанному инструменту не найдена');
 else echo json_encode($instrument);