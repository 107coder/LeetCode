<?php
/**
 * Create by PhpStorm.
 * FileName: 10II青蛙跳台阶问题.php
 * User: CSF
 * Date: 2020/3/8
 * Time: 11:30
 */

/**
 * @param Integer $n
 * @return Integer
 */
function numWays($n)
{
    $result = 0;
    $n_1 = $n_2 = 0;
    $i = 1;
    while ($i <= $n) {
        if ($i == 1) {
            $result = 1;
            $n_2 = $result;
        } elseif ($i == 2) {
            $result = 2;
            $n_1 = $result;
        } else {
            $result = ($n_1 + $n_2) % 1000000007;
            $n_2 = $n_1;
            $n_1 = $result;
        }
        $i++;
    }
    return $result;
}

$n = 7;
$res = numWays($n);

print_r($res);