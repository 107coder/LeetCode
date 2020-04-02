<?php
/**
 * Create by PhpStorm.
 * FileName: 1小强的养鸡场.php
 * User: CSF
 * Date: 2020/3/30
 * Time: 19:03
 * 就提交了这一道题，提交的时候一直是超时，凉凉了
 */


$handle = fopen("php://stdin", "r");

$str = rtrim(fgets($handle));
$line1 = explode(' ', $str);
$str = rtrim(fgets($handle));
$n = $line1[0];
$m = $line1[1];
$k = $line1[2];

$line2 = array_slice(explode(' ', $str), 0, $n);
fclose($handle);

$len2 = count($line2);
sort($line2);
for ($i = 0; $i < $m; $i++) {
    $max = $line2[0];
    $maxKey = 0;
    foreach ($line2 as $key => &$value) {
        if ($max < $value) {
            $max = $value;
            $maxKey = $key;
        }
        $value += $k;
    }
    $line2[$maxKey] = $line2[$maxKey] >> 1;
}

$sum = 0;
foreach ($line2 as $v) {
    $sum += $v;
}

echo $sum;