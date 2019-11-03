<?php
/*
题目描述
数组中有一个数字出现的次数超过数组长度的一半，请找出这个数字。例如输入一个长度为9的数组{1,2,3,2,2,2,5,4,2}。由于数字2在数组中出现了5次，超过数组长度的一半，因此输出2。如果不存在则输出0。
*/
function MoreThanHalfNum_Solution($numbers)
{
    // write code here
    $arr = [];
    foreach ($numbers as $key => $value) {
    	if(isset($arr[$value]))
    		$arr[$value]++;
    	else 
    		$arr[$value]=1;
    }

    foreach ($arr as $key => $value) {
    	if(2*$value > count($numbers))
    		return $key;
    }
    return 0;
}

$numbers = [1,2,3,2,2,2,5,4,2];
$result = MoreThanHalfNum_Solution($numbers);
print_r($result);