<?php

/*输入一个整数，输出该数二进制表示中1的个数。其中负数用补码表示。*/
function NumberOf1_1($n)
{
    $count = 0;
    while($n != 0){
    	$count++;
    	$n = (($n-1) & $n);
    	echo $count;
    }
    return $count;
}
//function_2
function NumberOf1_2($n)
{
    $count = 0;
    $flag = 1;
    while($n != 0){
    	if(($n & $flag) == 1)
    	{
	    	$count++;
    	}

    	$n = $n >> 1;
    	echo $count;
    }
    return $count;
}
//funtion_3
function NumberOf1($n)
{
    $count = 0;
    $flag = 1;
    while($flag != 0){
    	if(($n & $flag) != 0)
    	{
	    	$count++;
    	}

    	$flag = $flag << 1;
    }
    return $count;
}
$n = -5;
//-100    1100    0100  

echo NumberOf1($n);