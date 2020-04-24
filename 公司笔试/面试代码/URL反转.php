<?php
/**
 * Create by PhpStorm.
 * FileName: URL反转.php
 * User: CSF
 * Date: 2020/4/24
 * Time: 9:25
 */

function revert($url)
{
    $len = strlen($url);

    $left = 0;
    $right = $len - 1;
    action($url, $left, $right);
    $i = 0;
    $index = 0;
    while (true) {
        if ($index >= $len) break;
        if ($index == $len || $url[$index] == '.') {
            $j = $index;
            action($url, $i, $j-1);
            $i = $j + 1;
        }
        $index++;
    }
    return $url;
}

function action(&$url, $left, $right)
{
    while ($left <= $right) {
        list($url[$left], $url[$right]) = [$url[$right], $url[$left]];
        $left++;
        $right--;
    }
}


$url = 'www.cuisf.top';
$url = 'www.toutiao.com';
$res = revert($url);

print_r($res);