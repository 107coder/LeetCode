<?php
/*
题目描述
一个整型数组里除了两个数字之外，其他的数字都出现了两次。请写程序找出这两个只出现一次的数字。
 */
function FindNumsAppearOnce($array)
{
    // write code here
    // return list, 比如[a,b]，其中ab是出现一次的两个数字
    if($array==NULL){
    	return [];
    }

    $temp_arr = [];
    foreach ($array as $key => $value) {
    	if(!isset($temp_arr[$value])){
    		$temp_arr[$value] = 1;
    	}else{ 
    		$temp_arr[$value] ++;
    	}
    }

    $result = [];
    foreach ($temp_arr as $key => $value) {
    	if($value==1){
    		array_push($result, $key);
    	}
    }
    return $result;
}

$array = [1,4,5,6,7,8,89,4,2,1,5,6,7,8];

$res = FindNumsAppearOnce($array);

print_r($res);