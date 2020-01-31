<?php

/**
 * 12. 整数转罗马数字
 */

class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {
    	// 最终要返回的数据
    	$ren_value = 0;
	    //准备数据
	    //总共表示的字符
		$lm_keys = ['I','V','X','L','C','D','M'];
		// 每个罗马数字所表示的数值大小
		$lm_val = [1,5,10,50,100,500,1000];

		// 特殊情况数据
		$case_keys = ['IV','IX','XL','XC','CD','CM'];
		$case_val = [4,9,40,90,400,900];
		//特殊情况下直接匹配直接返回
		
    }
}

$Solution = new Solution;

$num = 3;
var_dump($Solution->romanToInt($num));