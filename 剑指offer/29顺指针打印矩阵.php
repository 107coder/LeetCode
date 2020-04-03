<?php
/**
 * Create by PhpStorm.
 * FileName: 29顺指针打印矩阵.php
 * User: CSF
 * Date: 2020/4/3
 * Time: 14:23
 */

class Solution_jz29
{

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix)
    {
        $res = [];
        if (!$matrix) return $res;

        $row = count($matrix);
        $col = count($matrix[0]);

        $left = 0;
        $buttom = $row - 1;
        $top = 0;
        $right = $col - 1;

        $i = 0;
        $j = 0;

        while ($left <= $right && $top <= $buttom) {
            for ($i = $left; $i <= $right; $i++) {
                $res[] = $matrix[$top][$i];
            }

            for ($j = $top + 1; $j <= $buttom; $j++) {
                $res[] = $matrix[$j][$right];
            }

            if ($buttom != $top) {
                for ($i = $right - 1; $i >= $left; $i--) {
                    $res[] = $matrix[$buttom][$i];
                }
            }

            if ($left != $right) {
                for ($j = $buttom - 1; $j > $top; $j--) {
                    $res[] = $matrix[$j][$left];
                }
            }
            $left++;
            $right--;
            $top++;
            $buttom--;
        }

        return $res;
    }
}

$obj = new Solution_jz29();
$matrix = [[1, 2, 3], [4, 5, 6], [7, 8, 9]];

$matrix = [[1, 2, 3, 4], [5, 6, 7, 8], [9, 10, 11, 12]];
//$matrix = [[1, 2, 3, 4, 5], [6, 7, 8, 9, 10], [11, 12, 13, 14]];
$res = $obj->spiralOrder($matrix);

print_r($res);