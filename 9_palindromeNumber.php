<?php 
/*
* 9、判断回文数
*/
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if($x < 0) 
    	{
    		return FALSE;
    	}
        else if($x == $this->reverse($x))
        {
        		return true;
        }
        else
        {
        	return false;
        }
      
    }

    function reverse($x) {
        $result = 0;
        if($x <= -2147483648 || $x >= 2147483647)
        {
        	return 0;
        }
        while(intval($x/10))
        {
        	$result = $result * 10 + $x%10;
        	$x = intval($x/10);
        }
        $result = $result * 10 + $x%10;
        if($result <= -2147483648 || $result >= 2147483647)
        {
        	return 0;
        }
        return $result;
    }


    function useString($x)
    {
    	$length = strlen($x);
    	$j=$length-1;
    	if($j==0) return true;
    	for($i=0;$i<intval($length/2);$i++)
    	{
    		if(substr($x, $i,1) != substr($x, $j-$i,1))
    			return false;
    	}
    	return true;
    }

}


$x = 123123;

$s = new Solution;
// var_dump($s->isPalindrome($x));
var_dump($s->useString($x));


// echo strlen($x);
// var_dump(substr($x, 0,1) === substr($x,5,1));