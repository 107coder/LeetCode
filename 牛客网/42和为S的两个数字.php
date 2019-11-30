<?php

/*
题目描述
输入一个递增排序的数组和一个数字S，在数组中查找两个数，使得他们的和正好是S，如果有多对数字的和等于S，输出两个数的乘积最小的。
输出描述:
对应每个测试案例，输出两个数，小的先输出
 */
function FindNumbersWithSum($array, $sum)
{
    // write code here
    $result = [];// 用来储存最后返回的结果
    if(empty($array) || count($array)<2){	
    	return $result;
    }
    // array_unshift($result, 0,0);
    $low = 0;
    $high = count($array)-1;

    // var_dump($low);
    // exit();
    while ($low < $high) {
    	$cur = $array[$low] + $array[$high];
    	if($cur == $sum){
            if(empty($result)){
                array_unshift($result, $array[$low],$array[$high]);
            }else{
                if($array[$low]*$array[$high] < $result[0]*$result[1]){
                    $result[0] = $array[$low];
                    $result[1] = $array[$high];
                }
            }
            $low++;
    	}else if($cur<$sum){
            $low++;
        }else{
            $high--;
        }
    }
    return $result;
}
 
$array = [1,2,3,4,5,6,7,8,10];
$sum = 10;

$res = FindNumbersWithSum($array, $sum);

print_r($res);