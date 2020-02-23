<?php

function mergeSort($arr){
    $len = count($arr);
    if($len<2){
        return $arr;
    }
    $midle = intval($len/2);
    
    $left = array_slice($arr,0,$midle);
    $right = array_slice($arr,$midle);
    
    return merge(mergeSort($left),mergeSort($right));
}

function merge($left,$right){
    $result = [];
    while(count($left) > 0 && count($right) > 0){
        if($left[0] > $right[0]){
           array_push($result,array_shift($right));
        }else{
            array_push($result,array_shift($left));
        }    
    }
    
    while(count($left)){
        array_push($result,array_shift($left));
    }
    
    while(count($right)){
        array_push($result,array_shift($right));
    }
    return $result;
    
}

$arr = [10,9,8,7,6,5,11,4,3,2,1,0];

print_r(mergeSort($arr));