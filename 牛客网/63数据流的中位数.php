<?php
/*
 * 题目描述
    如何得到一个数据流中的中位数？如果从数据流中读出奇数个数值，那么中位数就是所有数值排序之后位于中间的数值。
    如果从数据流中读出偶数个数值，那么中位数就是所有数值排序之后中间两个数的平均值。我们使用Insert()方法读取数据流，
    使用GetMedian()方法获取当前读取数据的中位数。
 * */

global $stream_max;
global $stream_min;
$stream_max = [];
$stream_min = [];
function bulidMaxHeap(&$arr){  // 建立大顶堆
	
	$len = count($arr);
	for ($i=intval($len/2); $i>=0; $i--) { 
		heapify($arr,$i,$len,'big');
	}
}
function bulidMinHeap(&$arr){  // 建立小顶堆
	
	$len = count($arr);
	for ($i=intval($len/2); $i>=0; $i--) { 
		heapify($arr,$i,$len,'small');
	}
}
function heapify(&$arr,$i,$len,$type='big'){ // 堆调整
	$left = 2*$i + 1;
	$right = 2*$i + 2;
	$largest = $i;

	if($type == 'big'){
		if($left<$len && $arr[$left]>$arr[$largest]){
			$largest = $left;
		}

		if($right<$len && $arr[$right]>$arr[$largest]){
			$largest = $right;
		}
	}else{
		if($left<$len && $arr[$left]<$arr[$largest]){
			$largest = $left;
		}

		if($right<$len && $arr[$right]<$arr[$largest]){
			$largest = $right;
		}
	}
	

	if($largest != $i){
		swap($arr,$i,$largest);
		heapify($arr,$largest,$len,$type);
	}
}

function swap(&$arr,$i,$j){
	$temp = $arr[$i];
	$arr[$i] = $arr[$j];
	$arr[$j] = $temp;
}

function Insert($num)
{
    // write code here
	global $stream_max;
	global $stream_min;

	if((count($stream_max)+count($stream_min))%2==0){
		array_push($stream_max, $num);
		bulidMaxHeap($stream_max);
		array_push($stream_min, array_shift($stream_max));
		bulidMaxHeap($stream_max);
		bulidMinHeap($stream_min);
	}else{
		array_push($stream_min, $num);
		bulidMinHeap($stream_min);
		array_push($stream_max, array_shift($stream_min));
		bulidMinHeap($stream_min);
		bulidMaxHeap($stream_max);
	}
}


function GetMedian(){
	// 求实时的中位数
	global $stream_max;
	global $stream_min;
	if((count($stream_max)+count($stream_min))%2==0){
		$mid = ($stream_max[0]+$stream_min[0])/2;
	}else{
		$mid = $stream_min[0];
	}
	$mid = number_format($mid,2);
	return $mid;
}

Insert(5);
p();
Insert(2);
p();
Insert(3);
p();
Insert(4);
p();
Insert(1);
p();
Insert(6);
p();
Insert(7);
p();
Insert(0);
p();
Insert(8);
p();

// $arr = [5,2,3,4,1,6,7,0,8];
// Insert($arr);


function p(){

	global $stream_max;
	global $stream_min;
	$res = GetMedian();
	echo PHP_EOL;
	// print_r($stream_min);
	// print_r($stream_max);
	print_r($res);
	echo PHP_EOL;
}