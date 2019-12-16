<?php
/*
题目描述
给定一个数组A[0,1,...,n-1],请构建一个数组B[0,1,...,n-1],其中B中的元素B[i]=A[0]*A[1]*...*A[i-1]*A[i+1]*...*A[n-1]。不能使用除法。
 */
function multiply($numbers)
{
    $len = count($numbers);
    for($j=0; $j<$len; $j++){
    	if($j == 0){
    		$B[$j] = 1;
    	}else{
			$B[$j] = $B[$j-1]*$numbers[$j-1];
    	}
    }
    $temp = 1;
     for($i=$len-1; $i>=0; $i--){
    	$B[$i] *= $temp;
    	$temp *= $numbers[$i];
    }
    return $B;
}

// 遍历的方法
function test($numbers){
	$B = [];
	foreach ($numbers as $key => $value) {
		$B[$key] = 1;
		foreach ($numbers as $k => $v) {
			if($key == $k){
				continue;
			}
			$B[$key] *= $v;
		}
	}
	return $B;
}

$numbers = [1,2,3,4,5];

$res = test($numbers);

$res = multiply($numbers);

print_r($res);


