<?php
/*
给定一个非空字符串 s，最多删除一个字符。判断是否能成为回文字符串。
*/

class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function validPalindrome($s) {
        if(strlen($s) <= 1){
        	return true;
        }
        $flag = 0;
        $left = 0;
        $right = strlen($s)-1;
        while ($left < $right) {
    		if ($s[$left] != $s[$right]){
    			return $this->isPalindrome($s,$left+1,$right) || $this->isPalindrome($s,$left,$right-1);
    		}
    		$left++;
    		$right--;
        }
    	return true;
    }

    function isPalindrome($s,$left,$right){
    	while($left < $right){
    		if ($s[$left] != $s[$right]){
    			return false;
    		}
    		$left++;
    		$right--;
    	}
    	return true;
    }
}

$s = "abcbfa";
$s = "abcdefgfedecba";
$obj = new Solution();
$res = $obj->validPalindrome($s);
var_dump($res);
