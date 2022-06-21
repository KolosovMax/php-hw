<?php
require_once 'item.php';

class ItemStorage
{
    private $items = [];

    // добавление товара в хранилище,
    // товары в массиве хранятся по значению id:
    // id товара => товар, те массив будет ассоциативным
    /*[
        12313 => объект типа Item,
        34553 => объект типа Item,
    ];*/

    // если сложно с ассоциативным, пусть будет нумерованным,
    // как в классе Storage с лекции
    public function add_item(Item $item)
    {

        $this->items[$item->getId()] = $item;
    }

    // написать реализацию следующих методов
    public function get_by_id(int $id)
    {
        if (isset($this->items[$id])) return $this->items[$id];
        return "Товар с id = $id не найден";
    }

    public function get_by_title(string $title)
    {
        // возвращает товар по названию (title)
        foreach ($this->items as $item) {
            if ($item->getTitle() === $title) return $item;
        }
        return "Товара с названием $title не найдено";
    }

    public function get_by_price(int $price_from, int $price_to)
    {
        // возвращает товары, стоимость которых находится в диапазоне от $price_from до $price_to
        $result = [];
        foreach ($this->items as $item) {
            if ($item->getPrice() >= $price_from && $item->getPrice() <= $price_to) $result[] = $item;
        }
        if ($result) return $result;
        else return "Не найдено товаров ди апазоне от $price_from до $price_to.";

    }

    public function get_by_material(...$materials)
    {
        // возвращает товары, которые изготовлены из материалов, перечисленных в $materials,
        // например,
        // при вызове в метод передаются ->get_by_material('дерево', 'железо', 'пластик');
        // значит метод должен вернуть все товары, сделанные из дерева, железа или пластика
        $result = [];
        foreach ($this->items as $item) {
            foreach ($materials as $material) {
                if ($item->getMaterial() === $material) $result[] = $item;
            }
        }
        if ($result) return $result;
        else return 'Не найдено товаров из заданных материлов';
    }

    public function get_by_price_and_material(int $price_to, string $material)
    {
        // возвращает товары, стоимость которых не превышает $price_to и
        // материал, из которого изготовлен товар соответствует $material
        $result = [];
        foreach ($this->items as $item) {
            if ($item->getPrice() <= $price_to && $item->getMaterial() === $material) $result[] = $item;
        }
        if ($result) return $result;
        else return 'Подходящих товаров не найдено';
    }
}
