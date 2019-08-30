<?php 


	$nums = [2, 7, 11, 15];
	$target = 9;
	// $nums = [3,2,4];
	// $target = 6;

class Solution {


//function_1
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum1($nums, $target) {
        $length = count($nums);
        for($i=0;$i<$length;$i++){
        	for($j=0;$j<$length;$j++){
        		if($i!=$j && $nums[$i]+$nums[$j]==$target){
        			return [$i,$j];
        		}
        	}
        }
    }

    //这个里面的数组必须是有序数组，才能使用双指针法
    /**
     * @param Integer[] $numbers
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($numbers, $target) {
        $length = count($numbers)-1;
        $i=0;
        while($i<$length){
        	if($numbers[$i]+$numbers[$length] == $target)
    		{
    			return [$i+1,$length+1];	
    		}else if($numbers[$i]+$numbers[$length] < $target)
    		{
    			$i++;
    		}else if($numbers[$i]+$numbers[$length] > $target)
    		{
    			$length--;
    		}
        }
    }



    //使用哈希
    function twoSum2($nums,$target)
    {
    	$length = count($nums);
    	for($i=0;$i<$length;$i++)
    	{
    		$val = $target-$nums[$i];
    		if(in_array($val, $nums))
    		{
    			for($j=0;$j<$length;$j++)
    			{
    				if($val == $nums[$j] && $i!=$j)
    					return [$i,$j];
    			}
    		}
    	}
    }
}

$solu = new Solution();

print_r($solu->twoSum2($nums,$target));

// var_dump(in_array(, $nums));