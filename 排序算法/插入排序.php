<?php


function mySort($arr){
    $len = count($arr);
    $current = 0;
    $preIndex = 0;
    for($i=1; $i<$len; $i++){
        $preIndex = $i-1;
        $current = $arr[$i];
        while($preIndex >= 0 && $arr[$preIndex] > $current){
            $arr[$preIndex+1] = $arr[$preIndex];
            $preIndex--;
        }
        $arr[$preIndex+1] = $current;
    }
    return $arr;
}

$arr = [10,9,8,7,6,5,11,4,3,2,1,0];

print_r(mySort($arr));