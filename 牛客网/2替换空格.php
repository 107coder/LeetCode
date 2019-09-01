<?php
function replaceSpace($str)
{
    return str_replace(' ', '%20', $str);
}

$str = 'We Are Happy';

echo replaceSpace($str);