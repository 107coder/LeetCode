<?php
/**
 * Create by PhpStorm.
 * FileName: 21调整数组顺序使奇数位于偶数前面.php
 * User: CSF
 * Date: 2020/3/26
 * Time: 20:49
 */

class Solution_jz21
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function exchange($nums)
    {
        $len = count($nums);
        if ($len < 2) return $nums;

        $left = 0;
        $right = $len - 1;

        while ($left < $right) {
            // 左边是奇数
            while ($left < $len && ($nums[$left] & 1) == 1) {
                $left++;
            }

            while ($right >= 0 && (($nums[$right] & 1) == 0)) {
                $right--;
            }

            if ($left < $len && $right >= 0 && $left < $right) {
                list($nums[$left], $nums[$right]) = [$nums[$right], $nums[$left]];
                $left++;
                $right--;
            }

        }
        return $nums;
    }
}

// 奇数位于偶数前面
$obj = new Solution_jz21();

$nums = [1, 2, 3, 4];

$nums = [1, 5, 6, 7, 8, 3, 45, 65];
$nums = [1, 3, 6];
$res = $obj->exchange($nums);

print_r($res);

