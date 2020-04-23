<?php
/**
 * Create by PhpStorm.
 * FileName: 39数组中出现次数超过一半的数字.php
 * User: CSF
 * Date: 2020/4/23
 * Time: 17:20
 */

class Solution_jz39 {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $tmp = [];
        $len = count($nums);
        foreach ($nums as $val){
            if(!isset($tmp[$val])){
                $tmp[$val] = 1;
            }else{
                $tmp[$val]++;
            }
            if($tmp[$val] > ($len>>1)){
                return $val;
            }
        }
        return -1;
    }
}

$obj = new Solution_jz39();

$nums = [1, 2, 3, 2, 2, 2, 5, 4, 2];

$res = $obj->majorityElement($nums);
print_r($res);