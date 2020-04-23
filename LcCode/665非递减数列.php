<?php
/**
 * 给定一个长度为 n 的整数数组，你的任务是判断在最多改变 1 个元素的情况下，该数组能否变成一个非递减数列。
 * 我们是这样定义一个非递减数列的： 对于数组中所有的 i (1 <= i < n)，满足 array[i] <= array[i + 1]
 * 
 * 
 * 
 * Undocumented class
 */
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function checkPossibility($nums) {
        $len=count($nums);
        if($len<2) return true;
        $cnt = 0;
        for ($i=1; $i < $len && $cnt<2; $i++) { 
            if($nums[$i] >= $nums[$i-1]) continue;
            $cnt++;
            if($i-2>=0 && $nums[$i-2]>=$nums[$i]){
                $nums[$i] = $nums[$i-1];
            }else{
                $nums[$i-1] = $nums[$i];
            }
        }
        return $cnt < 2;
    }
}

$nums = [4,2,1];
// $nums = [3,4,2,3];

$obj = new Solution;
$res = $obj->checkPossibility($nums);
var_dump($res);