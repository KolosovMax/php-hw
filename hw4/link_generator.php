<?php

function linkGenerator(): string
{
    $chars = '0123456789QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
    return 'https://site.my/' . substr(str_shuffle($chars), 0, 10);

}

