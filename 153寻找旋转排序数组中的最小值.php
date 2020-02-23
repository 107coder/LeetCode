<?php 

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findMin($nums) {
        $left = 0;
        $right = count($nums)-1;

        while($left < $right){
            $mid = $left + intval(($right-$left)/2);
            
            if($nums[$mid] < $nums[$right]){
                $right = $mid;
            }else{
                $left = $mid+1;
            }
        }
        return $nums[$left];
    }
}

$nums = [4,5,6,7,0,1,2];

$obj = new Solution;
$res = $obj->findMin($nums);
print_r($res);