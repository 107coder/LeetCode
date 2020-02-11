<?php
/*
给定一个非负整数 c ，你要判断是否存在两个整数 a 和 b，使得 a2 + b2 = c。
*/
class Solution {

    /**
     * @param Integer $c
     * @return Boolean
     */
    function judgeSquareSum($c) {
        if($c < 0){
        	return false;
        }
        $a = 0;
        $b = intval(sqrt($c));
        while($a <= $b){
        	$t = $a*$a + $b*$b;
        	if($t == $c){
        		echo "a = $a, b = $b";
        		return true;
        	}else if($t < $c){
        		$a++;
        	}else if($t > $c){
        		$b--;
        	}
        }
        echo "a = $a, b = $b";
        return false;
    }
}

$c = 1000000000;
$s = new Solution();
$res = $s->judgeSquareSum($c);

var_dump($res);