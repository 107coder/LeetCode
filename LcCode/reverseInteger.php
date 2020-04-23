<?php 

class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
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
}



$x = 2147483646;
$y = 1534236469;
$z = -123;

var_dump($x);
$s = new Solution;
echo $s->reverse($z);


