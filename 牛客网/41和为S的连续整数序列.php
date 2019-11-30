<?php

/*
题目描述
小明很喜欢数学,有一天他在做数学作业时,要求计算出9~16的和,他马上就写出了正确答案是100。但是他并不满足于此,他在想究竟有多少种连续的正数序列的和为100(至少包括两个数)。没多久,他就得到另一组连续正数和为100的序列:18,19,20,21,22。现在把问题交给你,你能不能也很快的找出所有和为S的连续正数序列? Good Luck!
输出描述:
输出所有和为S的连续正数序列。序列内按照从小至大的顺序，序列间按照开始数字从小到大的顺序
 */

/**
 * [FindContinuousSequence description] 使用一个类似于窗口的东西
 * @param [type] $sum [description]
 */
function FindContinuousSequence($sum)
{
    // write code here
    // 如果这个数小于2直接返回即可
    if($sum<2){
    	return [];
    }
    $result = [];// 用来报错最终的结果
    $plow = 1;
    $phigh = 2;
    while($plow<$phigh){
    	// 使用等差数列求和的方式，求当前的和
    	$cur = ($plow+$phigh)*($phigh-$plow+1)/2;
    	if($cur==$sum){
    		$arr = [];
    		for($i=$plow;$i<=$phigh;$i++){
    			array_push($arr, $i);
    		}
    		array_push($result, $arr);
    		$plow++;
    	}else if($cur<$sum){
    		$phigh++;
    	}else{
    		$plow++;
    	}
    }
    return $result;
}

/**
 * [Test description] 暴力方法
 * @param [type] $sum [description]
 */
function Test($sum){
	if($sum < 1){
		return [];
	}
	$nums = [];
	$result = [];
	$sumTemp = 0;
	for($i=1; $i<$sum; $i++){
		$j = $i;
		while($sumTemp<=$sum){
			array_push($nums, $j);
			$sumTemp += $j;
			if($sumTemp == $sum){
				array_push($result,$nums);
				$nums = [];
			}else if($sumTemp>$sum){
				$nums = [];
			}else{  
				// echo $sumTemp.PHP_EOL;
			}
			$j++;
		}
		$sumTemp = 0;
		

	}
	return $result;
}

function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$sum = 15;
$startTime = microtime_float();
$res = FindContinuousSequence($sum);
$endTime = microtime_float();
print_r($res);
// echo $endTime - $startTime;

// echo $startTime;