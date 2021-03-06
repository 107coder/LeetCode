<?php

/*
题目描述
在数组中的两个数字，如果前面一个数字大于后面的数字，则这两个数字组成一个逆序对。输入一个数组,求出这个数组中的逆序对的总数P。并将P对1000000007取模的结果输出。 即输出P%1000000007
输入描述:
题目保证输入的数组中没有的相同的数字

数据范围：

	对于%50的数据,size<=10^4

	对于%75的数据,size<=10^5

	对于%100的数据,size<=2*10^5

示例1
输入
1,2,3,4,5,6,7,0
输出
7
*/

// 使用这个方法可以得到正确的结果，但是不能通过线上的测试
global $counter;
function InversePairs($data)
{
	global $counter;
    doAction($data);
    return $counter;
}

function doAction($data){
 	$len = count($data);

    if($len<2){
    	return $data;
    }
    $mid = intval($len/2);
    $left = array_slice($data, 0 ,$mid);
    $right = array_slice($data, $mid,$len);

   return doSort(doAction($left), doAction($right));
}

function doSort($left,$right){
	global $counter;
	$result = [];
	while(count($left)>0 && count($right)>0){
		if(end($left) > end($right)){
			$counter = ($counter+count($right))%1000000007;
			array_unshift($result, array_pop($left));
		}else{
			array_unshift($result, array_pop($right));
		}
	}

	while (count($left)) {
		array_unshift($result, array_pop($left));
	}

	while (count($right)) {
		array_unshift($result, array_pop($right));
	}

	return $result;
}

// 暴力方法，每次统计左边有几个数比当前数的数字小
function InversePairs_2($data){
	$len = count($data);

	$count = 0;
	for($i=0; $i<$len; $i++){
		for($j=0; $j<$i; $j++){
			if($data[$j]>$data[$i]){
				$count = ($count+1)%1000000007;
			}
		}
	}
	return $count;
}


// 方法三，同步改写剑指offer上的c++代码
function InversePairs_3($data){
	$length = count($data);
	if($data == NULL || $length < 2){
		return 0;
	}

	$tempArr = $data;
	$count = InversePairsCore($data,$tempArr,0,$length-1);

	return $count;
}

function InversePairsCore(&$data,&$tempArr,$start,$end){
	if($start == $end){
		$tempArr[$start] = $data[$start];
		return 0;
	}

	$length  = intval(($end-$start)/2);

	$left = InversePairsCore($data,$tempArr,$start,$start+$length);
	$right = InversePairsCore($data,$tempArr,$start+$length+1,$end);

	// $i 初始化为第一段的最后一个元素
	$i = $start+$length;
	// j 初始化为第二段的最后一个元素
	$j = $end;
	$tempArrIndex = $end;
	$count = 0;
	while ($i>=$start && $j>=$start+$length+1) {
		if($data[$i] > $data[$j]){
			$tempArr[$tempArrIndex--] = $data[$i--];

			$count += $j-$start-$length;
		}else{
			$tempArr[$tempArrIndex--] = $data[$j--];
		}
	}	


	while($i >= $start){
		$tempArr[$tempArrIndex--] = $data[$i--];
	}

	while($j >= $start+$length+1){
		$tempArr[$tempArrIndex--] = $data[$j--];
	}

	for($index=$start; $index<=$end; $index++){
		 $data[$index] = $tempArr[$index];
	}

	$res = ($count+$left+$right)%1000000007;
	return $res;
}


$data = [2,3,45,6];
$data = [364,637,341,406,747,995,234,971,571,219,993,407,416,366,315,301,601,650,418,355,460,505,360,965,516,648,727,667,465,849,455,181,486,149,588,233,144,174,557,67,746,550,474,162,268,142,463,221,882,576,604,739,288,569,256,936,275,401,497,82,935,983,583,523,697,478,147,795,380,973,958,115,773,870,259,655,446,863,735,784,3,671,433,630,425,930,64,266,235,187,284,665,874,80,45,848,38,811,267,575];
// 2519

$res = InversePairs_3($data);
// print_r(count($data));

// print_r(array_pop($data));
var_dump($res);