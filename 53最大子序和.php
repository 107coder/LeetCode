<?php 

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $array = $nums;
          // write code here
        if(empty($array) || $array==NULL)
        {
            return 0;
        }

        $returnMax = $array[0];
        $curMax = 0;

        foreach ($array as $key => $value) {
            if($curMax < 0)
            {
                $curMax = $value;
            }
            else 
            {
                $curMax += $value;
            }
            if($curMax>$returnMax)
            {
                $returnMax = $curMax;
            }
        }

        return $returnMax;
    }
}

$nums = [-2,1,-3,4,-1,2,1,-5,4];
$obj = new Solution;
$res = $obj->maxSubArray($nums);
print_r($res);