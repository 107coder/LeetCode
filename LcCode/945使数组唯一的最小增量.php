<?php
/**
 * Create by PhpStorm.
 * FileName: 945使数组唯一的最小增量.php
 * User: CSF
 * Date: 2020/3/22
 * Time: 10:57
 */

class Solution_lc945
{

    /**
     * @param Integer[] $A
     * @return Integer
     */
    function minIncrementForUnique($A)
    {
        $len = count($A);
        if ($len < 2) return 0;

        sort($A);

        $res = 0;
        for ($i = 1; $i < $len; $i++) {
            if ($A[$i] <= $A[$i - 1]) {
                $res += $A[$i - 1] - $A[$i] + 1;
                $A[$i] = $A[$i - 1] + 1;
            }
        }
        return $res;
    }
}

$s = new Solution_lc945();

$A = [3, 2, 1, 2, 1, 7];

$res = $s->minIncrementForUnique($A);

print_r($res);