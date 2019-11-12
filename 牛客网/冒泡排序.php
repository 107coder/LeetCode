<?php 
/*
冒跑排序
*/
function mSort($array)
{
	$len = count($array);

	for($i=$len-1; $i>0; $i--)
	{
		for($j=0; $j<$i; $j++)
		{
			if(compare($array[$j],$array[$j+1]))
			{
				swap($array[$j],$array[$j+1]);
			}
		}
	}
	return $array;
}


function compare($a,$b)
{
	$res = $a>$b?true:false;
	return $res;
}

function swap(&$a,&$b)
{
	$temp = $a;
	$a = $b;
	$b = $temp;
}
$array = [3,4,5,6,7,1,23,18,9,10];

print_r(mSort($array));