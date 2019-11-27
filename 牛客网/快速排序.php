<?php

function quickSort($data){
	$length = count($data);
	quickSortCore($data,0,$R);
	return $data;
}
// $i++ 先使用$i 的值，然后再进行加1 操作 
function quickSortCore(&$data,$L,$R){
	if($R-$L == 1 || $L<0 || $R<0 || $L>$R){
		return NULL;
	}
	// echo $L,'==',$R;
	$lIndex = $L;
	$rIndex = $R;
	$curIndex= $L;
	$temp = $data[$R];
	while($lIndex<$rIndex){
		if($data[$curIndex] < $temp){
			swap($data[$curIndex++],$data[$lIndex++]);
		}else if($data[$curIndex] > $temp){
			swap($data[$curIndex],$data[$rIndex--]);
		}else{
			$curIndex++;
		}
	}
	$data[$lIndex] = $temp;
	quickSortCore($data,$L,$lIndex-1);
	quickSortCore($data,$rIndex+1,$R);
	// echo $lIndex,'--',$rIndex,PHP_EOL;
}

// 荷兰国旗问题
function flag($data){
	$len = count($data);
	if($data==NULL || $len<=1){
		return $data;
	}

	$L = 0;
	$R = $len-1;
	$less = 0;
	$max = $R;

	while($L < $max){
		if($data[$L] < $data[$R]){
			swap($data[$less],$data[$L]);
			$less++;
			$L++;
		}else if($data[$L]>$data[$R]){
			$max--;
			swap($data[$L],$data[$max]);
		}else{
			$L++;
		}
	}

	swap($data[$L],$data[$R]);
	return $data;
}

function swap(&$a,&$b){
 	$temp = $a;
 	$a = $b;
 	$b = $temp;
}
$data = [1,4,3,5,6,7,8,3,2,2,5];
// $data =[2,3,9,5,3,6,7,4];

$data = [2,3,9,5,1,2,4];
$res = quickSortCore($data,0,count($data)-1);
// $res = quickSort($data);

// print_r($res);

print_r($data);
// $a = 1;
// $b = 2;
// swap($a,$b);
// echo $a;