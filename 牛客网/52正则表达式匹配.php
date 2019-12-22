<?php
/*
题目描述
请实现一个函数用来匹配包括'.'和'*'的正则表达式。模式中的字符'.'表示任意一个字符，而'*'表示它前面的字符可以出现任意次（包含0次）。 在本题中，匹配是指字符串的所有字符匹配整个模式。例如，字符串"aaa"与模式"a.a"和"ab*ac*a"匹配，但是与"aa.a"和"ab*a"均不匹配
*/

/*
 我的基本思路：
 	根据字符串s去匹配：分一下情况
 	1. 如果检测到，pattern 的对应位置为'.' 直接s 和p 均 进行下一位匹配
 	2. 如果匹配到，不相同，检测下一位的值。如果不是* 直接返回false；如果是* 当做匹配0次处理，pattern跳过两个值，继续匹配
 	3. 如果检测到相等，直接两个均向下一位继续匹配；
 	4. 匹配到对应的位置为* 这时候也需要分不同的情况判断
 		1）如果前面的一位仍然为* （不知道是否存在这个情况，暂时这么处理吧）,直接在pattern跳到下一位，s上保持在原地
 		2）如果前面的一位是

 看过解析之后，重新整理一下思路：
 	1. 当模式的比较字符后面的一个字符不是 * 的时候
 	    1）直接进行匹配当前字符，如果模式当前字符为"."，无论字符串当前字符是什么，模式和字符串都指向下一个
 	    2）如果字符串的当前字符和模式当前字符相同，模式和字符串指向下一个
 	    3）当前字符串和模式的当前字符不相同，退出，返回false
 	2. 模式当前字符的下一个字符为 "*" 的时候
 		1）如果字符串的字符和模式的字符不相同，字符串后移一个，模式后移两个
 		2）如果字符串的字符和模式的字符相同，模式后移两个，字符串可以后移一个，也可以不移动

 这个题中，有两个比较大的坑：
 	当字符串为 ""时 ，与null使用 == 可以匹配成功
	在判断字符串是否到达末尾的时候，指针不需要进行 +1 的操作
*/

function match($s, $pattern)
{
	if($s===NULL || $pattern===NULL){
		return false;
	}
	return matchCore($s,$pattern,0,0);
}

function matchCore($s,$pattern,$sindex,$pindex){
	// 当两个字符串同时到达末尾的时候，就返回true，匹配成功
	if($sindex==strlen($s) && $pindex==strlen($pattern)){
		return true;
	}
	// 字符串为到达末尾，但是模式到达末尾，返回false，退出匹配
	if($sindex!=strlen($s) && $pindex==strlen($pattern)){
		return false;
	}

	if($pattern[$pindex+1] != '*'){      // 情况一，后一个字符不是 * 
		if(($s[$sindex] == $pattern[$pindex]) || ($pattern[$pindex]=='.' && $sindex!=strlen($s))) {
			return matchCore($s,$pattern,$sindex+1,$pindex+1);
		}else{
			return false;
		}
	}else{                               // 情况二。后一个字符不是 *
		if(($s[$sindex] == $pattern[$pindex]) || ($pattern[$pindex]=='.' && $sindex!=strlen($s) )) 
			return matchCore($s,$pattern,$sindex,$pindex+2) 
				|| matchCore($s,$pattern,$sindex+1,$pindex+2)
			 	|| matchCore($s,$pattern,$sindex+1,$pindex);
		else
			return matchCore($s,$pattern,$sindex,$pindex+2);
	}
	
}

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
$s = '';
$pattern = 'a.a';
// $pattern = 'ab*ac*a';
$pattern = 'ab*a';
$pattern = ".*";
// $res = myFun($s,$pattern);
$res = match($s,$pattern);
var_dump($res);