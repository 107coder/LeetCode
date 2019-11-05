<?php
/*
题目描述
输入n个整数，找出其中最小的K个数。例如输入4,5,1,6,2,7,3,8这8个数字，则最小的4个数字是1,2,3,4,。
*/
function GetLeastNumbers_Solution($input, $k)
{
    // write code here
    $len = count($input);

    if($k>$len)
    {
    	return [];
    }
    for($i=0;$i<$k;$i++)
    {
	    $minIndex = $i;
	    for($j=$i;$j<$len;$j++) {
	    	if($input[$j] <= $input[$minIndex])
	    	{
	    		$minIndex=$j;
	    	}
	    }
	    $temp = $input[$i];
	    $input[$i] = $input[$minIndex];
	    $input[$minIndex] = $temp;
    }
    return array_slice($input,0,$k);
}	

$input = [4,5,1,6,2,7,3,8];
$k = 4;

$result = GetLeastNumbers_Solution($input,$k);

print_r($result);