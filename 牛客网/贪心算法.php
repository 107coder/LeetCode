<?php

/*
* 1.试用贪心算法求解汽车加油问题：已知一辆汽车加满油后可行驶n公里，而旅途中有若干个加油站。试设计一个有效算法，指出应在哪些加油站停靠加油，使加油次数最少请写出该算法。

* 寺庙中有一些粗细不均匀的香（所以就是不能折断使用），但已知每一根能够燃烧1小时，怎么用这些香来计时一个小时零15分钟？给出一种解决方案
*/


function addOil($n,$k,$addOil){
	$result = array();

	//汽车油箱剩余的油量还能行使的距离
	$s = $n;
	foreach ($addOil as $key => $value) {
		echo $key," ";
		if($value > $n)
		{
			echo "No Solution!";
			return 0;
		}

		if($s >= $value)
		{
			$s -= $value;

		}
		else
		{
			array_push($result,$key);
			$s = $n - $value;
		}
	}

	echo "汽车最终在第 ";
	foreach ($result as $value) {
		echo $value," ";
	}
	echo "站加油。";
	
}


//每次加满油，汽车可以行使的距离
$n = 5;
//行使途中加油站的个数
$k = 7;
//加油站的之间的就距离 个数应该为 $k+1 个

$addOil = [2,5,2,2,1,3,4,3];

addOil($n,$k,$addOil);