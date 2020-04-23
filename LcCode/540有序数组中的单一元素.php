<?php


class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNonDuplicate($nums) {
        $len = count($nums);
        if($len == 1) return $nums[0];
        for($i=0,$j=1;$i<$len ||$j<$len; $i=$i+2,$j=$j+2){
            if($nums[$i] != $nums[$j]){
                return $nums[$i];
            }
        }
        return $nums[$len-1];
    }

    function fun2($nums){
        $l=0; $h = count($nums)-1;

        while($l < $h){
            $m = $l + intval(($h-$l)/2);
            if($m % 2 == 1){
                $m--;
            }
            if($nums[$m] == $nums[$m+1]){
                $l = $m+2;
            }else{
                $h = $m;
            }
        }
        return $nums[$l];
    }
}

$nums = [1,1,2,2,3,3,4,8,8];

$obj = new Solution;

$res = $obj->singleNonDuplicate($nums);
$res = $obj->fun2($nums);
print_r($res);