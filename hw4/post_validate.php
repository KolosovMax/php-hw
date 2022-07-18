<?php

function postCheck()
{   if ($_SERVER ['REQUEST_METHOD'] === 'GET') $long_link ='';
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST') $long_link = $_POST['long-link'];
    else $long_link = 'Error No Post';
    return $long_link;
}