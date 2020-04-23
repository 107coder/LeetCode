<?php
/**
 * Create by PhpStorm.
 * FileName: ms17.16按摩师.php
 * User: CSF
 * Date: 2020/3/24
 * Time: 8:17
 */

class Solution_ms1716
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function massage2($nums)
    {
        if (empty($nums)) return 0;
        $tmp = [];
        $result = 0;
        $flag = array_fill(0, count($nums), 0);

        $this->select($nums, 0, $tmp, $result, $flag);
        return $result;
    }

    /**
     * @param Integer[] $nums
     * @param $index
     * @param $tmp
     * @param $result
     * @param $flag
     */
    function select($nums, $index, $tmp, &$result, $flag)
    {
        if ($index == count($nums)) {
            $result = max($result, array_sum($tmp));
            return;
        }

        $this->select($nums, $index + 1, $tmp, $result, $flag);
        if ($index == 0 || ($index > 0 && $flag[$index - 1] == 0)) {
            $tmp[] = $nums[$index];
            $flag[$index] = 1;

        }
        $this->select($nums, $index + 1, $tmp, $result, $flag);
    }

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function massage($nums)
    {
        // 动态规划，试着去求前n-1个的符合条件值
        if (empty($nums)) return 0;
        $db0 = 0;
        $db1 = $nums[0];
        next($nums);
        while (list($key,$value)=each($nums)){
            $tp0 = max($db0, $db1);
            $tp1 = $db0 + $value;

            $db0 = $tp0;
            $db1 = $tp1;
        }
        return max($db0, $db1);
    }
}

$s = new Solution_ms1716();

$nums = [2, 7, 9, 3, 1];
$nums = [1, 2, 3, 1];
$nums = [2, 1, 4, 5, 3, 1, 1, 3];
$res = $s->massage($nums);

print $res;