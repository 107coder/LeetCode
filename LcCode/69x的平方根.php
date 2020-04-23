<?php
/**
 * 实现 int sqrt(int x) 函数。

* 计算并返回 x 的平方根，其中 x 是非负整数。

* 由于返回类型是整数，结果只保留整数的部分，小数部分将被舍去。
 */


class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x) {
        if($x <=0 ) return -1;
        $h = intval($x/2);
        $l=1;
        while($l<=$h){
            $m = $l + intval(($h-$l)/2);
            $temp = $m*$m;
            if($temp == $x){
                return $m;
            }elseif($temp > $x){
                $h=$m-1;
            }else{
                $l=$m+1;
            }
        }
        return $h;
    }
}

$x = 20;
$obj = new Solution;
$res = $obj->mySqrt($x);
var_dump($res);

$a = range(1,50);
foreach ($a as $key => $value) {
    echo "sqrt($value) =".$obj->mySqrt($value).PHP_EOL;
}