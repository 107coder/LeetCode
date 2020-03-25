<?php
/**
 * Create by PhpStorm.
 * FileName: 2圈地运动.php
 * User: CSF
 * Date: 2020/3/24
 * Time: 14:01
 */

function str2arr($str)
{
    if ($str == '') return [];
    return explode(' ', $str);
}


$handle = fopen("php://stdin", "r");

$n = rtrim(fgets($handle));

$str = rtrim(fgets($handle));
$arr = str2arr($str);
$arr = array_slice($arr, 0, $n);
fclose($handle);

function myFun($arr, $n)
{
    if (count($arr) < 3 || $n < 3) return -1;
    $max = $arr[0];
    $count = 0;
    $sum = 0;
    $success = false;
    foreach ($arr as $key => $val) {
        $count++;
        $sum += $val;
        $max = $max > $val ? $max : $val;
        if ($count >= 3) {
            if ($sum > 2 * $max) {
                $success = true;
                break;
            }
        }
    }
    return $success ? $count : -1;
}

$res = myFun($arr, $n);
var_dump($res);