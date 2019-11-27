<?php

/*
实现归并排序

递归调用 将一个数组分成两个数组

mergeSort 函数只管不断的将一个长的数组成两个部分

这里不断的调用自身，然后越来越短，最后剩下一个元素的时候，停止划分，开始合并

merge 函数负责将两部分按照大小顺序合并
*/
function mergeSort($array){
	$len = count($array);
	if($len < 2){
		return $array;
	}
	$mid = intval($len/2);
	$left = array_slice($array,0,$mid);
	$right = array_slice($array, $mid,$len);

	return merge(mergeSort($left),mergeSort($right));
}

function merge($left,$right){
	$result = [];
	while(count($left)>0 && count($right)>0){
		if($left[0] >= $right[0]){
			array_push($result, array_shift($right));
		}else{
			array_push($result, array_shift($left));
		}
	}

	while (count($left)) {
		array_push($result, array_shift($left));
	}

	while (count($right)) {
		array_push($result, array_shift($right));
	}

	return $result;
}

$array = [3,4,6,7,81,56,13,8,2,32,536,76]; 
// $array = [2,3,1];

$res = mergeSort($array);

print_r($res);