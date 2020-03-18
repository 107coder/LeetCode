<?php
/**
 * Create by PhpStorm.
 * FileName: 14-I剪绳子.php
 * User: CSF
 * Date: 2020/3/18
 * Time: 8:59
 */

class Solution_jz14I
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function cuttingRope($n)
    {
        if($n <= 3 ) return $n-1;
        $tmp = $n % 3;
        $count = intval($n / 3);
        if($tmp == 1){
            $count--;
            $res = 4;
        }elseif($tmp == 2){
            $res = 2;
        }else{
            $res = 1;
        }
        while ($count){
            $res *= 3;
            $count--;
        }
        return $res;
    }
}

$s = new Solution_jz14I();
$n = 5;
$res = $s->cuttingRope($n);

print_r($res);