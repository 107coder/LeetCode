<?php
/**
 * 13.罗马数字转整数
 */

class Solution {


    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {

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

		// 普通情况下
		//开始判断
		if($s !== null && $s !== "")
		{
			$length = strlen($s);
			for($i=0; $i<$length; $i=$i+1)
			{
				$char_two = substr($s, $i, 2);
 				$key = array_search($char_two,$case_keys);
				if($key || $key === 0)
				{
					$ren_value += $case_val[$key];
					$i++;
				}
				else
				{
					$char = substr($char_two,0,1);
					$key = array_search($char,$lm_keys);
					if($key || $key === 0)
					{
						$ren_value += $lm_val[$key];
					}
				}

			}			
		}
		
    	
        return $ren_value;
    }
}

$Solution = new Solution;

// $s = 'III';
// $s = 'IV';
// $s = 'IX';
// $s = 'LVIII';
$s = 'MCMXCIV';

// $Solution->romanToInt($s);
var_dump($Solution->romanToInt($s));