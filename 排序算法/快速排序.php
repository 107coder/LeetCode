<?php

function quickSort(&$arr,$left,$right){
    $partitionIndex = 0;
    
    if($left < $right){
        $partitionIndex = partition($arr,$left,$right);
        echo "left = $left;right = $right".PHP_EOL;
        print_r($arr);
        quickSort($arr,$left,$partitionIndex-1);
        quickSort($arr,$partitionIndex+1,$right);
    }
    return $arr;
}
function partition(&$arr,$left,$right){
    $pivot = $left;
    $index = $pivot + 1;
    for($i=$index;$i<=$right; $i++){
        if($arr[$i] < $arr[$pivot]){
            swap($arr,$i,$index);
            $index++;
        }
    }
    swap($arr,$pivot,$index-1);
    return $index-1;
}
function swap(&$arr,$i,$j){
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

// $arr = [10,9,8,7,6,5,11,4,3,2,1,0];
$arr = [5,9,3,7,12,8,2,1,4,6];

print_r(quickSort($arr,0,count($arr)-1));
exit;

$res = partition($arr,0,count($arr)-1);

print_r($arr);
print_r($res);