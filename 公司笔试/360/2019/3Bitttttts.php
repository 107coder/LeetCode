<?php
/**
 * Create by PhpStorm.
 * FileName: 3Bitttttts.php
 * User: CSF
 * Date: 2020/3/24
 * Time: 14:23
 */

function str2arr($s)
{
    if ($s == '') return [];
    return explode(' ', $s);
}


$handle = fopen("php://stdin", "r");

$n = rtrim(fgets($handle));
$data = [];
for ($i = 0; $i < $n; $i++) {
    $tmp = rtrim(fgets($handle));
    $data[] = str2arr($tmp);
}
fclose($handle);


function eightToTen($number, $n)
{
    $number = $number . '';
    $res = 0;
    $r = 1;
    $i = strlen($number) - 1;
    while ($i >= 0) {
        $res += $r * $number[$i];
        $r *= $n;
        $i--;
    }
    return $res;
}

function countNofNumber($number, $n)
{
    $tmp = '';
    $count = 0;
    while ($number != 0) {
        $tmp .= $number % $n;
        $number = intval($number / $n);
    }
    for ($i = 0; $i < strlen($tmp); $i++) {
        $count += $tmp[$i] == $n - 1 ? 1 : 0;
    }
    return $count;
}

function myFun($data)
{
    $res = [];
    foreach ($data as $value) {
        $tmp = $value[2];
        $_tmp = $tmp;
        $max = 0;
        $step = 1;
        while ($tmp >= $value[1]) {
            $tmpCount = countNofNumber($tmp, $value[0]);
            if($tmpCount != 0) $step = $value[0]-1;
            if ($tmpCount > $max) {
                $_tmp = $tmp;
                $max = $tmpCount;
            }
            $tmp -= $step;
        }
        $res[] = $_tmp;
    }
    return $res;
}

$res = myFun($data);

foreach ($res as $val) {
    echo $val . PHP_EOL;
}
//countNofNumber(63, 8);