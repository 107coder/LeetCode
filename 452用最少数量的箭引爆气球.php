<?php

class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function findMinArrowShots($points) {
        if(!$points) return 0;
        sort($points);
        $start = $points[0][0];
        $end = $points[0][1];
        $count = 1;
        foreach ($points as $key => $value) {
        	if($key == 0) continue;
        	$start = $value[0];
        	if($value[0] > $end){
        		$count++;
        		$end = $value[1];
          	}elseif($value[1] < $end){
          		$end = $value[1];
          	}else{

          	}
        }
        return $count;
    }
}

$points = [[10,16], [2,8], [1,6], [7,12]];

$obj = new Solution;
$res = $obj->findMinArrowShots($points);

print_r($res);