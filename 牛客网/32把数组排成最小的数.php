<?php
/*
题目描述
输入一个正整数数组，把数组里所有数字拼接起来排成一个数，打印能拼接出的所有数字中最小的一个。例如输入数组{3，32，321}，则打印出这三个数字能排成的最小数字为321323。
*/

// 他应该就是考一个排序的算法的吧，只不过是排序的规则不一样而已，使用冒泡吧
function PrintMinNumber($numbers)
{
    // write code here
    if($numbers == NULL || empty($numbers))
    {
    	return "";
    }

    $len = count($numbers);
    for($i=$len-1; $i>0; $i--)
    {
    	for($j=0; $j<$i; $j++){
    		if(compare($numbers[$j],$numbers[$j+1]))
    		{
    			$temp = $numbers[$j];
    			$numbers[$j] = $numbers[$j+1];
    			$numbers[$j+1] = $temp;
    		}
    	}
    }
    return implode($numbers);

}

function compare($a,$b)
{
	$res = $a.$b > $b.$a ? TRUE : FALSE;
	return $res;
}

$numbers = [3,32,321];

PrintMinNumber($numbers);

