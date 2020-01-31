<?php

global $len;

function bulidMaxHeap(&$arr){  // 建立大顶堆
	global $len;
	$len = count($arr);
	for ($i=intval($len/2); $i>=0; $i--) { 
		heapify($arr,$i);
	}
}

function heapify(&$arr,$i){ // 堆调整
	global $len;
	$left = 2*$i + 1;
	$right = 2*$i + 2;
	$largest = $i;

	if($left<$len && $arr[$left]>$arr[$largest]){
		$largest = $left;
	}

	if($right<$len && $arr[$right]>$arr[$largest]){
		$largest = $right;
	}

	if($largest != $i){
		swap($arr,$i,$largest);
		heapify($arr,$largest);
	}
}

function swap(&$arr,$i,$j){
	$temp = $arr[$i];
	$arr[$i] = $arr[$j];
	$arr[$j] = $temp;
}

function heapSort($arr){
	global $len;
	bulidMaxHeap($arr);

	for($i=count($arr)-1; $i>0; $i--){
		swap($arr,0,$i);
		$len--;
		heapify($arr,0);
	}
	return $arr;
}


$arr = [10,2,4,5,6,7,3,2,2,4,56];

$res = heapSort($arr);

print_r($res);