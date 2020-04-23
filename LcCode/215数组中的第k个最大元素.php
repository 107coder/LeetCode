<?php

/*
在未排序的数组中找到第 k 个最大的元素。请注意，你需要找的是数组排序后的第 k 个最大的元素，而不是第 k 个不同的元素。
*/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    // 解法：建立一个k个元素的小顶堆，堆结构完全可以使用一个数组来表示
    // 小顶堆的特点，根根节点元素的值小于子节点。
    function findKthLargest($nums, $k) {
        $heap = [];

        foreach ($nums as $key => $value) {
        	 $this->addNumber($heap,$k,$value);
        }

        print_r($heap);
    }

    function addNumber(&$heap,$k,$val){
    	if(count($heap) < $k){
    		array_push($heap, $val);
    	}else{
    		if($val > $heap[0]){
    			array_push($heap, $val);
    			array_shift($heap);
    		}
    	}
		for($i=intval(count($heap)/2);$i>=0;$i--){
			$this->heapify($heap,$i);
		}
    }

    function heapify(&$heap,$i){
    	$len = count($heap);
    	$left = 2*$i + 1;
    	$right = $left + 1;
    	$largest = $i;

    	if($left < $len && $heap[$left] < $heap[$largest]){
    		$largest = $left;
    	}

    	if($right<$len && $heap[$right] < $heap[$largest]){
    		$largest = $right;
    	}

    	if($largest != $i){
    		$this->swap($heap,$largest,$i);
    		$this->heapify($heap,$i);
    	}
    }
    function swap(&$heap,$i,$j){
    	$temp = $heap[$i];
    	$heap[$i] = $heap[$j];
    	$heap[$j] = $temp;
    }

}

$nums = [3,2,1,5,6,4];
$k = 4;

$obj = new Solution;
$res = $obj->findKthLargest($nums,$k);