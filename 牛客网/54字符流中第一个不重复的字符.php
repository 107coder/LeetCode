<?php
/*
题目描述
请实现一个函数用来找出字符流中第一个只出现一次的字符。例如，当从字符流中只读出前两个字符"go"时，第一个只出现一次的字符是"g"。当从该字符流中读出前六个字符“google"时，第一个只出现一次的字符是"l"。
输出描述:
如果当前字符流没有存在出现一次的字符，返回#字符。
*/
global $stringstream;
//Init module if you need
function Init(){
	global $stringstream;
	$stringstream = "";
}
//Insert one char from stringstream
function Insert($ch)
{
	global $stringstream;
	$stringstream .= $ch;
    // write code here
}
//return the first appearence once char in current stringstream
function FirstAppearingOnce()
{
    // write code here
	global $stringstream;
	$charArr = [];
	for($i=0; $i<strlen($stringstream); $i++){
		if(!isset($charArr[$stringstream[$i]])){
			$charArr[$stringstream[$i]] = 1;
		}else{
			$charArr[$stringstream[$i]]++;
		}
	}

	foreach ($charArr as $key => $value) {
		if($value == 1){
			return $key;
		}
	}
	return '#';
}

Init();
Insert('g');
Insert('o');
Insert('o');
Insert('g');
Insert('l');
Insert('e');

$res = FirstAppearingOnce();
var_dump($res);