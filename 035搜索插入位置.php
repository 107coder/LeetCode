<?php
/*
 * 给定一个排序数组和一个目标值，在数组中找到目标值，并返回其索引。如果目标值不存在于数组中，返回它将会被按顺序插入的位置。

你可以假设数组中无重复元素。
 * */
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target) {
        if(empty($nums)){
            return 0;
        }
        $k = 0;
        foreach ($nums as $key => $val){
            $k = $key;
            if($target <= $val){
                return $k;
            }
        }
        return $k+1;
    }
}
$nums = [1,3,5,6];
$target = 2;
$target = 0;
$s = new Solution();
$res = $s->searchInsert($nums,$target);

print_r($res);