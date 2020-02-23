<?php 

$len; 
// 使用堆排序
function heapSort($arr){
    global $len;
    bulidMinHeap($arr);
    for($i=count($arr)-1; $i>0; $i--){
        swap($arr,$i,0);
        $len--;
        heapify($arr,0);
    }
    return $arr;
}
// 建立小顶堆
function bulidMinHeap(&$arr){
    global $len;
    $len = count($arr);
    for($i=intval($len/2); $i>=0; $i--){
        heapify($arr,$i);
    }
}
// 堆调整
function heapify(&$arr,$i){
    global $len;
    $left = (2*$i) + 1;
    $right = ($i*2) + 2;
    $largest = $i;

    if($left < $len && $arr[$left] > $arr[$largest]){
        $largest = $left;
    }

    if($right < $len && $arr[$right] > $arr[$largest]){
        $largest = $right;
    }

    if($largest != $i){
        swap($arr,$largest,$i);
        heapify($arr,$largest);
    }
}
// 交换两个数
function swap(&$arr,$i,$j){
    $arr[$i] = $arr[$i] + $arr[$j];
    $arr[$j] = $arr[$i] - $arr[$j];
    $arr[$i] = $arr[$i] - $arr[$j]; 
}

$arr = [5,9,3,7,12,8,2,1,4,6];
// $arr = [3,4,1,5,2,7,6];

print_r(heapSort($arr));