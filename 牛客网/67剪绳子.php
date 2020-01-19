<?php
/*
题目描述
给你一根长度为n的绳子，请把绳子剪成整数长的m段（m、n都是整数，n>1并且m>1），每段绳子的长度记为k[0],k[1],...,k[m]。请问k[0]xk[1]x...xk[m]可能的最大乘积是多少？例如，当绳子的长度是8时，我们把它剪成长度分别为2、3、3的三段，此时得到的最大乘积是18。
输入描述:
输入一个数n，意义见题面。（2 <= n <= 60）
	输出描述:
	输出答案。
	示例1
		输入
			8
		输出
			18
	贪心 和 动态规划 吧
*/
/**
* 实际上题目转换为，看看一个整数到底可以分成几个 2  和 3
*/

function cutRope($number)
{
	if($number<=1){
		return 0;
	}
	if($number==2){
		return 1;
	}
	if($number == 3){
		return 2;
	}
    // write code here
    $res = 1;

    $number3 = intval($number/3);
    $yu = $number%3;

    if($yu == 1){
    	$number3 = $number3-1;
    	$yu = 4;
    }else if($yu == 0){
    	$yu = 1;
    }

    $res = pow(3,$number3) * $yu;
    return $res;
}

$number = 8;
$res = cutRope($number);
print_r($res);