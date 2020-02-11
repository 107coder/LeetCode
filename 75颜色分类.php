<?php
/*
给定一个包含红色、白色和蓝色，一共 n 个元素的数组，原地对它们进行排序，使得相同颜色的元素相邻，并按照红色、白色、蓝色顺序排列。
*/

// 荷兰国旗问题
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function sortColors(&$nums) {
    	$l = 0;
    	$r = count($nums)-1;
    	$index = $l;
    	$flag = 1;
    	while($index<=$r){
    		if($nums[$index] < $flag){
    			$this->swap($nums,$index,$l);
    			$index++;
    			$l++;
    		}else if($nums[$index] > $flag){
    			$this->swap($nums,$index,$r);
    			$r--;
    		}else{
    			$index++;
    		}
    	}
    	print_r($nums);
        // $this->sortColorsCore($nums,0,count($nums)-1);
    }

    function sortColorsCore(&$nums,$l,$r){

    }

    function swap(&$nums,$i,$j){
		$temp = $nums[$i];
		$nums[$i] = $nums[$j];
		$nums[$j] = $temp;
    }
}


$nums = [2,0,2,1,1,0];
$nums = [2,0,1];
$obj = new Solution;
$obj->sortColors($nums);