<?php

class Item
{
    private $id; // не может быть отрицательным или 0
    private $title; // максимум 10 символов
    private $price; // не может быть отрицательным или 0
    private $material; // минимум 3 символа

    // свойства title и id являются обязательными, задать их значения через конструктор
    public function __construct(string $id_value, string $title_value)
    {
        if ($id_value > 0 && strlen($title_value) > 0 && strlen($title_value) <= 10) {
            $this->id = $id_value;
            $this->title = $title_value;
        } else throw new InvalidArgumentException('Значение id или title некорректно');
    }

    // добавить все необходимые геттеры и сеттеры
    public function setPrice(int $price_value)
    {
        if ($price_value <= 0) throw new InvalidArgumentException('Значение цены не может быть меньше или равной 0');
        $this->price = $price_value;
    }

    public function setMaterial(string $material_value)
    {
        if (strlen($material_value) < 3) throw new InvalidArgumentException('Значение материала не может быть меньше 3 символов');
        $this->material = $material_value;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public  function getPrice(){
        return $this->price;
    }
    public function getMaterial(){
        return $this->material;
    }
}
