<?php
/*
题目描述
将一个字符串转换成一个整数，要求不能使用字符串转换整数的库函数。 数值为0或者字符串不是一个合法的数值则返回0
输入描述:
输入一个字符串,包括数字字母符号,可以为空
输出描述:
如果是合法的数值表达则返回该数字，否则返回0
示例1
输入
+2147483647
    1a33
输出
2147483647
    0
 */
function StrToInt($str) 
{
    // write code here
    if(is_null($str)){
    	return 0;
    }
    if(is_numeric($str)){
    	$str = $str + 0;
    	if($str > 2147483647 || $str < -2147483648){
    		return 0;
    	}else{
    		return $str;
    	}
    }else{
    	return 0;
    }
}

// function StrToInt_2($str){
// 	$len = strlen($str);
// 	if($str==null || $len<1){
// 		return 0;
// 	}
// 	$s = 1;
	
// }

// var_dump(is_numeric('2147483647'));
// var_dump(2147483648);