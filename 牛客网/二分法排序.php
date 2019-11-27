<?php

// 二分法排序

function BinarySort($array){
	$length = count($array);

	if($length < 2){
		return $array;
	}


	for($i=0; $i<$length; $i++){
		$temp = $array[$i];
		$low = 0;
		$high = $i-1;

       // 这里需要从第二个数开始判断，所以要用<=
		while($low<=$high){
			$mid = intval(($low+$high)/2);
			if($array[$mid] > $temp){
				$high = $mid-1;
			}else{
				$low = $mid+1;
			}
		}
		for($j=$i-1; $j>=$low; $j--){
			$t = $array[$j];
			$array[$j] = $array[$j+1];
			$array[$j+1] = $t;
 		}
 		$array[$low] = $temp;
	}
	return $array;
}


$array = [3,4,56,7,8,123,435,6,78];

$result = BinarySort($array);

print_r($result);

