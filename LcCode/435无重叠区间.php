<?php
/*
给定一个区间的集合，找到需要移除区间的最小数量，使剩余区间互不重叠。

注意:
可以认为区间的终点总是大于它的起点。
区间 [1,2] 和 [2,3] 的边界相互“接触”，但没有相互重叠。
*/
class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer
     */
    function eraseOverlapIntervals($intervals) {
    	array_multisort(array_column($intervals, 1),SORT_ASC,$intervals);
        if(!$intervals) return 0;
        $low = $intervals[0][0];
        $high = $intervals[0][1];
        $count = 0;
        foreach ($intervals as $key => $value) {
        	if($key == 0) continue;
        	if($value[0] >= $high){
        		$low = $value[0];
        		$high = $value[1];
        	}else{
        		$count++;
        	}
        }
        return $count;
    }
}

$intervals = [ [1,2], [2,3], [3,4], [1,3] ];
$intervals = [[1,100],[11,22],[1,11],[2,12]];
$intervals = [[1,2],[2,3],[3,4],[-100,-2],[5,7]];

$obj = new Solution;
$res = $obj->eraseOverlapIntervals($intervals);
print_r($res);