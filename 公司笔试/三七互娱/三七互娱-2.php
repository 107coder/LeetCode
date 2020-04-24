<?php
/**
 * Create by PhpStorm.
 * FileName: 三七互娱-2.php
 * User: CSF
 * Date: 2020/3/13
 * Time: 14:53
 */

/**
 * 题目：输入一个无符号数，判断其二进制的表达形式中，有多少个 1 存在
 * eg:
 * 11
 * 3
 * 因为 11 的二进制为 1011 其中有3个1
 */

/**
 * @param $number
 * @return int
 */
function countOne($number){
    $count = 0;
    while($number != 0){
        if($number & 1 == 1){
            $count ++;
        }
        $number = $number >> 1;
    }
    return $count;
}

$number = 10;

$res = countOne($number);

print_r($res);