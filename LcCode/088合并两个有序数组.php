<?php
/*
给定两个有序整数数组 nums1 和 nums2，将 nums2 合并到 nums1 中，使得 num1 成为一个有序数组。

说明:

初始化 nums1 和 nums2 的元素数量分别为 m 和 n。
你可以假设 nums1 有足够的空间（空间大小大于或等于 m + n）来保存 nums2 中的元素。
*/
error_reporting(0);
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n) {
        $index1 = $m-1;
        $index2 = $n-1;
        $indexMax = $m+$n-1;

        while ($index2 >= 0 || $index1 >= 0){
        	if($index1 < 0){
        		$nums1[$indexMax--] = $nums2[$index2--];
        		echo "index1 < 0".PHP_EOL;
        	}else if($index2 < 0){
        		$nums1[$indexMax--] = $nums1[$index1--];
        		echo "index2 < 0".PHP_EOL;

        	}else if($nums1[$index1] > $nums2[$index2]){
        		$nums1[$indexMax--] = $nums1[$index1--];
        		echo "case 1".PHP_EOL;
        	}else{
        		$nums1[$indexMax--] = $nums2[$index2--];
        		echo "case 2".PHP_EOL;
        	}
        	// echo $t = $indexMax + 1;
        	// echo "--nums1[$t] = $nums1[$t]".PHP_EOL;
        }
        print_r($nums1);
    }
}
$nums1 = [1,2,3];
$m = 3;
$nums2 = [2,5,6];
$n = 3;

$obj = new Solution();
$obj->merge($nums1,$m,$nums2,$n);