<?php
require_once 'link_generator.php';

function shortCheck()
{   $short_link = linkGenerator();
    $file = 'password.txt';
    $arr = file($file, FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    foreach ($arr as $string) {
        $new_arr[] = explode(' : ', $string);
    }
    foreach ($new_arr as $link_arr) {
        if (in_array($short_link, $link_arr)) $short_link = linkGenerator();
    }
    return $short_link;
}
