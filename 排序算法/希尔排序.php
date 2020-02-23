<?php 

function shellSort($arr){
    $len = count($arr);

    for($gap=intval($len/2); $gap>0; $gap = intval($gap/2)){

        for($i=$gap; $i<$len; $i++){
            $j = $i;
            $current = $arr[$j];
            while($j-$gap>=0 && $current < $arr[$j-$gap]){
                $arr[$j] = $arr[$j-$gap];
                $j = $j-$gap;
            }
            $arr[$j] = $current;
        }

    }
    return $arr;
} 

$arr = [10,9,8,7,6,5,11,4,3,2,1,0];
$arr = [5,9,3,7,12,8,2,1,4,6];

print_r(shellSort($arr));