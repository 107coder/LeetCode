<?php
/**
 * Create by PhpStorm.
 * FileName: 912排序数组.php
 * User: CSF
 * Date: 2020/3/31
 * Time: 15:30
 */

class Solution_jz912
{

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function sortArray($nums)
    {
        $len = count($nums);
        if ($len < 2) return $nums;
        $mid = $len >> 1;
        $left = array_slice($nums, 0, $mid);
        $right = array_slice($nums, $mid);
//        print_r($left);
//        print_r($right);
//        exit;
        return $this->merge($this->sortArray($left), $this->sortArray($right));

    }

    function mergeSort(&$nums, $left, $right)
    {
        if ($left < $right) {
            $mid = $left + (($right - $left) >> 1);
            $nums = $this->merge($this->mergeSort($nums, $left, $mid), $this->mergeSort($nums, $mid, $right));
        }
        return $nums;
    }

    function merge($left, $right)
    {
        $res = [];
        while (!empty($left) && !empty($right)) {
            if ($left[0] > $right[0]) {
                $res[] = array_shift($right);
            } else {
                $res[] = array_shift($left);
            }
        }

        while ($left) {
            $res[] = array_shift($left);
        }
        while ($right) {
            $res[] = array_shift($right);
        }
        return $res;
    }
}

$obj = new Solution_jz912();
$nums = [5, 2, 3, 1];

$res = $obj->sortArray($nums);

print_r($res);