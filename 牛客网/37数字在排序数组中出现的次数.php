<?php
/*
统计一个数字在排序数组中出现的次数。
*/
function GetNumberOfK($data, $k)
{
    // write code here
    if($data==NULL || count($data)<1){
    	return 0;
    }
    $len = count($data);

    $count = 0;
    foreach ($data as $key => $value) {
    	if($value==$k){
    		$count++;
    	}

    	if($value!=$k && $count!=0){
    		return $count;
    	}
    }
    return $count;
}


$data = [1,4,5,6,7,7,7,8,9,9,10,45];
$k = 7;

$result = GetNumberOfK($data,$k);

print_r($result);