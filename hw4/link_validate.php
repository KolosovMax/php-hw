<?php

require_once 'file_validate.php';
function linkCheck($long_link): string
{
    if ($long_link === 'Error No Post') {
        $short_link = 'Ошибка метода';
    } else {
        if (filter_var($long_link, FILTER_VALIDATE_URL)) {
            $short_link= fileCheck($long_link);
        }
        else $short_link ="Введите правильную ссылку";
    }
    return $short_link;
}