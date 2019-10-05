<?php

//输入一个整数数组，实现一个函数来调整该数组中数字的顺序，使得所有的奇数位于数组的前半部分，所有的偶数位于数组的后半部分，并保证奇数和奇数，偶数和偶数之间的相对位置不变。
function reOrderArray($array)
{
    $odd_array = [];
    $even_array = [];

    foreach ($array as $key => $value) {
    	if($value%2==0){
    		array_push($odd_array,$value);
    	}
    	else
    	{
    		array_push($even_array,$value);
    	}
    }

	print_r($even_array);
	$result = array_merge($even_array,$odd_array);
	return $result;
}


$array = [1,5,12,-7,8,3,4,6,-4];

print_r(reOrderArray($array));