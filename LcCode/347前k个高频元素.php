<?php
/*
给定一个非空的整数数组，返回其中出现频率前 k 高的元素。
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer[]
     */
    function topKFrequent($nums, $k) {
        $numbers = [];
        foreach ($nums as $key => $value) {
        	if(!isset($numbers[$value])){
        		$numbers[$value] = 1;
        	}else{
        		$numbers[$value]++;
        	}
        }

        arsort($numbers,SORT_DESC);
        $result = [];
        foreach (array_keys($numbers) as $key => $value) {
        	if(count($result) < $k){
        		array_push($result, $value);
        	}
        }
        return $result;
    }
}

$nums = [4,4,4,4,4,1,1,1,2,2,3,3,3,3,3,3];
$k = 2;

$obj = new Solution;
$res = $obj->topKFrequent($nums,$k);