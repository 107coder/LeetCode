<?php

/*
题目描述
求出1~13的整数中1出现的次数,并算出100~1300的整数中1出现的次数？为此他特别数了一下1~13中包含1的数字有1、10、11、12、13因此共出现6次,但是对于后面问题他就没辙了。ACMer希望你们帮帮他,并把问题更加普遍化,可以很快的求出任意非负整数区间中1出现的次数（从1 到 n 中1出现的次数）。
*/
function NumberOf1Between1AndN_Solution($n)
{
    // write code here
	if($n == NULL || $n ==0)
	{
		return 0;
	}
    $numberOfOne = 0;
    for($i=1; $i<=$n; $i++)
    {
    	$numberOfOne += CheckOneNumber($i);
    }
    return $numberOfOne;
}


function CheckOneNumber($number)
{
	if($number == NULL || $number ==0)
	{
		return 0;
	}
	$numberOfOne = 0;
	while($number != 0)
	{
		$a = $number%10;
		$number =  intval($number/10);
		if($a==1) $numberOfOne+=1;
	}
	return $numberOfOne;
}
$n = 100;
echo NumberOf1Between1AndN_Solution($n);