<?php

/*我们可以用2*1的小矩形横着或者竖着去覆盖更大的矩形。请问用n个2*1的小矩形无重叠地覆盖一个2*n的大矩形，总共有多少种方法？*/
// 还是不能直接使用递归，总是超出内存限制
function rectCover_1($number)
{
    
  	if($number == 1)
  	{
  		return 1;
  	}
  	else if($number == 2)
  	{
  		return 2;
  	}
  	else
  	{
  		return rectCover($number-1) + rectCover($number-2);
  	}
}

function rectCover($number)
{
    
  	if($number == 1)
  	{
  		return 1;
  	}
  	else if($number == 2)
  	{
  		return 2;
  	}
  	else if($number > 2)
  	{
  		$a = 1;
  		$b = 2;
  		$i = 2;
  		while($i < $number)
  		{
  			$result = $a + $b;
  			$a = $b;
  			$b = $result;
  			$i+=1;
  		}
  		return $result;
  	}
  	else
  	{
  		return 0;
  	}
}

$number = 10;

echo rectCover($number);