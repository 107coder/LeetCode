<?php 

function mySort($arr){
    $len = count($arr);

    $minIndex = 0;
    $min = $arr[0];
    for($i=0; $i<$len; $i++){
        $min = $arr[$i];
        for($j=$i; $j<$len; $j++){
            if($arr[$j] < $min){
                $min = $arr[$j];
                $minIndex = $j;
            }
        }
        $temp = $arr[$i];
        $arr[$i] = $arr[$minIndex];
        $arr[$minIndex] = $temp;
    }
    return $arr;
}


$arr = [10,9,8,7,6,5,11,4,3,2,1,0];

print_r(mySort($arr));