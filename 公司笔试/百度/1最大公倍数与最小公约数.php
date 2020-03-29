<?php
/**
 * Create by PhpStorm.
 * FileName: 1最大公倍数与最小公约数.php
 * User: CSF
 * Date: 2020/3/29
 * Time: 19:46
 */

while (fscanf(STDIN, "%d", $n) == 1) {

    $a = $n;
    $b = $n - 1;

    $res = $a * $b - 1;
    printf("%d\n",$res);
    exit;
}