<?php
/**
 * Create by PhpStorm.
 * FileName: 17打印1到最大的n位数.php
 * User: CSF
 * Date: 2020/3/21
 * Time: 9:06
 */

class Solution_jz17 {

    /**
     * @param Integer $n
     * @return Integer[]
     */
    function printNumbers($n) {
        $i = 1;
        $res = [];
        while(strlen($i) <= $n){
            $res[] = $i++;
        }
        return $res;
    }
}

$s = new Solution_jz17();
$n = 1;
$res = $s->printNumbers($n);

print_r($res);