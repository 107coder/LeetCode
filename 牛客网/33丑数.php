<?php
/*
题目描述
把只包含质因子2、3和5的数称作丑数（Ugly Number）。例如6、8都是丑数，但14不是，因为它包含质因子7。 习惯上我们把1当做是第一个丑数。求按从小到大的顺序的第N个丑数。
*/

/*
	方法一，使用暴力的方法可以解出来，从1开始，一个一个的判断，知道找够数字即可 时间复杂度比较高，不能通过测试
*/
function GetUglyNumber_Solution_f1($index)
{
    // write code here
    if($index < 0 || $index == NULL)
    {
    	return 0;
    }

    $counter = 0;
   	while ($index > 0) {
   		# code...
   		$counter++;

   		if(checkUglyNumber($counter))
   			$index--;

   	}

   	return $counter;
}

function checkUglyNumber($number)
{
	if($number < 0 || $number == NULL)
	{
		return false;
	}


	while($number>0)
	{
		if($number == 1)
			return true;

		if($number%2 == 0)
			$number = intval($number/2);
		else if($number%3 == 0)
			$number = intval($number/3);
		else if($number%5 == 0)
			$number = intval($number/5);
		else 
			return false;
	}
	return true;
}


/*
别人的额代码： 从最小的书开始找
*/

function GetUglyNumber_Solution($index)
{
	if($index<0 || $index==NULL)
		return 0;

	if($index<7) return $index;

	$uglyNumber_arr = array();
	$p2=0;$p3=0;$p5=0; 
	$uglyNumber = 1;
	array_push($uglyNumber_arr, $uglyNumber);
	while (count($uglyNumber_arr) < $index) {
		# code...
		$uglyNumber = min($uglyNumber_arr[$p2]*2,min($uglyNumber_arr[$p3]*3,$uglyNumber_arr[$p5]*5));
		if($uglyNumber_arr[$p2]*2 == $uglyNumber) $p2++;
		if($uglyNumber_arr[$p3]*3 == $uglyNumber) $p3++;
		if($uglyNumber_arr[$p5]*5 == $uglyNumber) $p5++;
		array_push($uglyNumber_arr, $uglyNumber);
	}

	return $uglyNumber;
}
$number = 14;
$index = 20;
var_dump(GetUglyNumber_Solution($index));