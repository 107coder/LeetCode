<?php
/*
题目描述
请实现一个函数用来判断字符串是否表示数值（包括整数和小数）。例如，字符串"+100","5e2","-123","3.1416"和"-1E-16"都表示数值。 但是"12e","1a3.14","1.2.3","+-5"和"12e+4.3"都不是。

题目分析：
	如上图的字符串，转化为数字，字符串的额要求是：
	1. 如果没有E 或者 e，只允许有一个 + 或者 -，且只能在第一个
	2. 不能出现E 或者 e 以外的其他字符
	3. 如果存在E或者e，可以有两个 符号位 ，但是必须是在开始
	4. e后面的数表示指数 ，不能出现小数点


	格式：A[.[B]][e|E[C]]
*/
function isNumeric($s)
{
    if($s === NULL || $s ==="")
    {
    	return false;
    }
    $index = 0;
  	$numeric = scanInter($s,$index);

  	if($s[$index] == '.'){
  		$index ++;
  		$numeric = scanUnsingedInter($s,$index) || $numeric;
  	}

  	if($s[$index]=='e' || $s[$index]=='E'){
  		$index++;
  		$numeric =  $numeric && scanInter($s,$index);
  	}

  	return $numeric && $index == strlen($s);
}

function scanInter($s,&$index){
	if($s[$index]=='+' || $s[$index]=='-')
		$index++;
	return scanUnsingedInter($s,$index);
}

function scanUnsingedInter($s,&$index){
	$before = $index;
	while($s[$index]>='0' && $s[$index]<='9'){
		$index++;
	}
	return $index > $before;
}

$s = '5e2';
$s = '3.1416';
$s = '-1E-16';

$s = '1a3.14';
$res = isNumeric($s);

var_dump($res);

// var_dump(($s<='9' && $s>='0'));
// $s = '2';
