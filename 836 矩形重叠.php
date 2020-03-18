<?php
/**
 * Create by PhpStorm.
 * FileName: 836 矩形重叠.php
 * User: CSF
 * Date: 2020/3/18
 * Time: 8:14
 */

class Solution_lc836
{

    /**
     * @param Integer[] $rec1
     * @param Integer[] $rec2
     * @return Boolean
     */
    function isRectangleOverlap($rec1, $rec2)
    {
//        if ($rec2[0] > $rec1[0] && $rec2[0] < $rec1[2] && $rec2[1] > $rec1[1] && $rec2[1] < $rec1[3]) {
//            return true;
//        } elseif ($rec2[2] > $rec1[0] && $rec2[2] < $rec1[2] && $rec2[3] > $rec1[1] && $rec2[3] < $rec1[3]) {
//            return true;
//        } elseif ($rec2[0] < $rec1[0] && $rec2[1] < $rec1[1] && $rec2[2] > $rec1[2] && $rec2[3] > $rec1[3]) {
//            return true;
//        } else {
//            return false;
//        }

        if(($rec2[0] >= $rec1[2] || $rec2[1] >= $rec1[3]) || ($rec2[2] <= $rec1[0] || $rec2[3] <= $rec1[1])){
            return false;
        }else{
            return true;
        }
    }
}

$s = new Solution_lc836();
$rec1 = [0, 0, 2, 2];
$rec2 = [1, 1, 3, 3];

//$rec1 = [0, 0, 1, 1];
//$rec2 = [1, 0, 2, 1];

$rec1 = [7,8,13,15];
$rec2 = [10,8,12,20];
$res = $s->isRectangleOverlap($rec1, $rec2);

var_dump($res);