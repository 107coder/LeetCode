<?php
/**
 * Create by PhpStorm.
 * FileName: 1071字符串的最大公因子.php
 * User: CSF
 * Date: 2020/3/12
 * Time: 8:39
 */

/**
 * @param String $str1
 * @param String $str2
 * @return String
 */
function gcdOfStrings($str1, $str2)
{
    if($str1 == '' && $str2 == ''){return '';}
    if($str1.$str2 == $str2.$str1){
        return substr($str1,0,gcd(strlen($str1),strlen($str2)));
    }
    return '';
}

/**
 * @param integer $m
 * @param integer $n
 * @return int|mixed
 */
function gcd($m, $n)
{
    $i = min($m, $n);
    for (; $i > 0; $i--) {
        if ($m % $i == 0 && $n % $i == 0) {
            return $i;
        }
    }
    return 1;
}


$str1 = "ABCABC";
$str2 = "ABC";

$str1 = "ABABAB";
$str2 = "ABAB";

$res = gcdOfStrings($str1, $str2);

var_dump($res);