<?php
/**
 * Create by PhpStorm.
 * FileName: 16数值的整数次方.php
 * User: CSF
 * Date: 2020/3/19
 * Time: 8:48
 */

class Solution_jz16 {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        $res = 1;
        if($n == 0){
            $res = 1;
        }elseif($n < 0){
            $n = abs($n);
            while ($n){
                $res /= $x;
                $n --;
            }
        }else{
            while ($n){
                $res *= $x;
                $n --;
            }
        }
        return  $res;
    }

    function myPow2($x,$n){
        if($x == 0) return 0;
        if($n < 0) {
            $x = 1/$x;
            $n = -$n;
        }

        $res = 1;
        while ($n > 0){
            if(($n & 1) == 1)  $res *= $x;
            $x *= $x;
            $n >>= 1;
        }
        return $res;
    }
}

$s = new Solution_jz16();

$x = 2.10000;
$n = 3;

//$x = 0.00001;
//$n = 2147483647;
$res = $s->myPow2($x,$n);
var_dump($res);

//var_dump(1.003);