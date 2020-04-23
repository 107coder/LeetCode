<?php
/**
 * Create by PhpStorm.
 * FileName: 1013将数组分成和相等的三部分.php
 * User: CSF
 * Date: 2020/3/11
 * Time: 9:07
 */

/**
 * @param Integer[] $A
 * @return Boolean
 */
function canThreePartsEqualSum($A)
{
    if (count($A) < 3) {
        return false;
    }
    $sum[0] = 0;
    foreach ($A as $k => $v) {
        $sum[0] += $v;
    }
    if ($sum[0] % 3 != 0) {
        return false;
    }
    $sum[0] /= 3;
    $i = 1;
    foreach ($A as $val) {
        if($val == 0) continue;
        $sum[$i] = isset($sum[$i]) ? $sum[$i] : 0;
        $sum[$i] += $val;
        if($sum[$i] == $sum[0]){
            $i++;
        }
    }

    if(count($sum) >= 4 && $sum[1] == $sum[2] && $sum[2] == $sum[3]){
        return true;
    }
    return false;
}

$A = [0, 2, 1, -6, 6, -7, 9, 1, 2, 0, 1];
$A = [0,2,1,-6,6,7,9,-1,2,0,1];
$A = [3,3,6,5,-2,2,5,1,-9,4];

$A = [12,-4,16,-5,9,-3,3,8,0];

$A = [10,-7,13,-14,30,16,-3,-16,-27,27,19];

$A = [1,-1,1,-1];
$res = canThreePartsEqualSum($A);

var_dump($res);