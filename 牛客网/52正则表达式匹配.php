<?php
/*
题目描述
请实现一个函数用来匹配包括'.'和'*'的正则表达式。模式中的字符'.'表示任意一个字符，而'*'表示它前面的字符可以出现任意次（包含0次）。 在本题中，匹配是指字符串的所有字符匹配整个模式。例如，字符串"aaa"与模式"a.a"和"ab*ac*a"匹配，但是与"aa.a"和"ab*a"均不匹配
*/
function match($s, $pattern)
{
    // write code here
}

/*
 我的基本思路：
 	根据字符串s去匹配：分一下情况
 	1. 如果检测到，pattern 的对应位置为'.' 直接s 和p 均 进行下一位匹配
 	2. 如果匹配到，不相同，检测下一位的值。如果不是* 直接返回false；如果是* 当做匹配0次处理，pattern跳过两个值，继续匹配
 	3. 如果检测到相等，直接两个均向下一位继续匹配；
 	4. 匹配到对应的位置为* 这时候也需要分不同的情况判断
 		1）如果前面的一位仍然为* （不知道是否存在这个情况，暂时这么处理吧）,直接在pattern跳到下一位，s上保持在原地
 		2）如果前面的一位是
*/
function myFun($s,$pattern){
	$sLen = strlen($s);
	$pLen = strlen($pattern);
	$j=0;
	$i=0;
	while($i<$sLen){
		echo $pattern[$j].$j.PHP_EOL;
		if($pattern[$j] == '.'){
			$j++;
			$i++;
		}else if($pattern[$j] == '*'){
			$j++;
		}else if($s[$i] != $pattern[$j]){
			if($pattern[$j+1] == '*'){
				$j += 2;
			}else{
				return false;
			}
		}else{
			$j++;
			$i++;
		}
	}

	echo "j=$j".PHP_EOL;

	if($j < $pLen-1){
		return false;
	}else{
		return true;
	}
}

$s = 'aaa';
$pattern = 'a.a';
$pattern = 'ab*ac*ad';

$res = myFun($s,$pattern);
var_dump($res);