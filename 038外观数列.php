<?php
/*「外观数列」是一个整数序列，从数字 1 开始，序列中的每一项都是对前一项的描述。前五项如下：

1.     1
2.     11
3.     21
4.     1211
5.     111221
1 被读作  "one 1"  ("一个一") , 即 11。
11 被读作 "two 1s" ("两个一"）, 即 21。
21 被读作 "one 2",  "one 1" （"一个二" ,  "一个一") , 即 1211。

给定一个正整数 n（1 ≤ n ≤ 30），输出外观数列的第 n 项。

注意：整数序列中的每一项将表示为一个字符串。*/

class Solution {

    /**
     * @param Integer $n
     * @return String
     */
    function countAndSay($n) {
    	if($n<0){
    		return "";
    	}
    	if($n == 1){
    		return "1";
    	}
    	$base = '1';
    	while($n > 1){
    		$base = $this->readNumber($base);
    		$n--;
    	}
    	return $base;
    }

    function readNumber($number){
    	$len = strlen($number);
    	$count = 0;
    	$res = "";
    	$temp = $number[0];
    	for($i=0; $i<$len; $i++){
    		if($number[$i] == $temp){
    			$count++;
    		}else{
    			$res .= $count.$temp;
    			$temp = $number[$i];
    			$count = 1;
    		}
    	}
    	$res .= $count.$temp;
    	return $res;
    }
}

$number = 5;

$s = new Solution();
$res = $s->countAndSay($number);
print_r($res);