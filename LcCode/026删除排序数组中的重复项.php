<?php
/*
给定一个排序数组，你需要在原地删除重复出现的元素，使得每个元素只出现一次，返回移除后数组的新长度。

不要使用额外的数组空间，你必须在原地修改输入数组并在使用 O(1) 额外空间的条件下完成。

*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        if(empty($nums)) return 0;
        $temp = $nums[0];
        foreach ($nums as $key => $value) {
        	if($key != 0){
        		if($value == $temp){
        			unset($nums[$key]);
        		}else{
        			$temp = $value;
        		}
        	}
        }
        return count($nums);
    }
}

$nums = [0,0,1,1,1,2,2,3,3,4];

$obj = new Solution();
$res = $obj->removeDuplicates($nums);

print_r($res);