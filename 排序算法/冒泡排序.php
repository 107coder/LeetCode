<?php

function mySort($arr){
    $flag = true;
    $len = count($arr);
    for($i=0; $i<$len; $i++){
        for($j=0; $j<$len-1-$i; $j++){
            if($arr[$j] > $arr[$j+1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j+1];
                $arr[$j+1] = $temp;
                
                $flag =  false;
            }
        }
        if($flag) return $arr;
    }
    return $arr;
}

$arr = [10,9,8,7,6,5,11,4,3,2,1,0];

print_r(mySort($arr));