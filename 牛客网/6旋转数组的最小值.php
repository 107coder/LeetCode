<?php

/*
   题目描述
	把一个数组最开始的若干个元素搬到数组的末尾，我们称之为数组的旋转。
	输入一个非递减排序的数组的一个旋转，输出旋转数组的最小元素。
	例如数组{3,4,5,1,2}为{1,2,3,4,5}的一个旋转，该数组的最小值为1。
	NOTE：给出的所有元素都大于0，若数组大小为0，请返回0。
 */

/*
 * function_1:方法一：直接从后面的元素开始找，直到找到一个元素，这个元素比他前面的一个元素小，此时该元素即为最小的元素
 */
function minNumberInRotateArray_1($rotateArray)
{
    if(empty($rotateArray)) return 0;

    for($i=count($rotateArray)-1; $i>0; $i--)
    {
    	if($rotateArray[$i] < $rotateArray[$i-1])
    	{
    		return $rotateArray[$i];
    	}
    }
}

/*
 * function_2：方法二：使用二分法
 */
function minNumberInRotateArray($rotateArray)
{
    if(empty($rotateArray)) return 0;

    $left = 0;
    $right = count($rotateArray)-1; 
   
   	while($left < $right)
   	{
   		$mid = intval(($left+$right)/2);
   		if($rotateArray[$mid] > $rotateArray[$right])
   		{
   			$left = $mid;
   		}
   		else
   		{	
   			$right = $mid;
   		}
   		if($left+1 == $right) break;
   		// echo "working....";
   	}
   	return $rotateArray[$mid];
}

$rotateArray = [3,4,5,1,2];
$rotateArray = [6501,6828,6963,7036,7422,7674,8146,8468,8704,8717,9170,9359,9719,9895,9896,9913,9962,154,293,334,492,1323,1479,1539,1727,1870,1943,2383,2392,2996,3282,3812,3903,4465,4605,4665,4772,4828,5142,5437,5448,5668,5706,5725,6300,6335];

echo minNumberInRotateArray($rotateArray);