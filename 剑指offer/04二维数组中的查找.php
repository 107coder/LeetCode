<?php 

class Solution {

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    function findNumberIn2DArray($matrix, $target) {
        if(!$matrix) return false;

        $row = count($matrix);
        $col = count($matrix[0]);

        $i=0;$j=$col-1;
        while($i<$row && $j>=0){
             if($target == $matrix[$i][$j]){
                 return true;
             }elseif($target < $matrix[$i][$j]){
                 $j--;
             }else{
                 $i++;
             }
        }
        return false;
    }
}

$matrix = [
    [1,   4,  7, 11, 15],
    [2,   5,  8, 12, 19],
    [3,   6,  9, 16, 22],
    [10, 13, 14, 17, 24],
    [18, 21, 23, 26, 30]
];

$target = 20;
$obj = new Solution;
$res = $obj->findNumberIn2DArray($matrix,$target);

var_dump($res);