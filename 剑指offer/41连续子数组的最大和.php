<?php
/**
 * Create by PhpStorm.
 * FileName: 41连续子数组的最大和.php
 * User: CSF
 * Date: 2020/4/26
 * Time: 8:46
 */

class Solution_jz41
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums)
    {
        $len = count($nums);
        if ($len <= 0) {
            return 0;
        }
        $res = $nums[0];
        $tmp = 0;

        foreach ($nums as $key => $val) {
            $tmp = $tmp > 0 ? $tmp + $val : $val;
            $res = max($tmp, $res);
        }
        return $res;
    }
}

$obj = new Solution_jz41;
$nums = [-2, 1, -3, 4, -1, 2, 1, -5, 4];

$res = $obj->maxSubArray($nums);

print_r($res);