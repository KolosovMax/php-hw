<?php

require_once 'short_check.php';
function fileCheck($long_link)
{
    $file_name = 'password.txt';
    if (file_exists($file_name)) {
        $arr = file($file_name, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
        foreach ($arr as $string) {
            $new_arr[] = explode(' : ', $string);
        }
        foreach ($new_arr as $link_arr) {
            if ($link_arr[0] === $long_link) {
                return $link_arr[1];
            }
        }
    }
    $short_link = shortCheck();
    $data = $long_link . ' : ' . $short_link;
    file_put_contents($file_name, $data . PHP_EOL, LOCK_EX | FILE_APPEND);
    return $short_link;
}


