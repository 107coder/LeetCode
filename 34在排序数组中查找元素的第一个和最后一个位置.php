<?php 

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $left = $this->searchFirst($nums,$target);
        $right = $this->searchFirst($nums,$target+1)-1;

        if($left == count($nums) || $nums[$left] != $target){
            return [-1,-1];
        }else{
            return [$left,$right];
        }
    }

    function searchFirst($nums,$target){
        $l = 0; $h = count($nums);
        while($l < $h){
            $m = $l + intval(($h-$l)/2);
            if($nums[$m] >= $target){
                $h = $m;
            }else{
                $l = $m+1;
            }
        }
        return $l;
    }
}

$nums = [5,7,7,8,8,10];
$target = 8;

$obj = new Solution;
$res = $obj->searchRange($nums,$target);
print_r($res);