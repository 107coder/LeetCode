<?php
/*
题目描述
在一个字符串(0<=字符串长度<=10000，全部由字母组成)中找到第一个只出现一次的字符,并返回它的位置, 如果没有则返回 -1（需要区分大小写）.
*/
function FirstNotRepeatingChar($str)
{
    // write code here
    if($str == "" || $str==null || strlen($str)==0)
    {
    	return -1;
    }

    for($i=0; $i<strlen($str); $i++)
    {
    	if(!isset($str_arr[$str[$i]]))
    	{
    		$str_arr[$str[$i]]=1;
    	}else
    	{
    		$str_arr[$str[$i]]++;
    	}
    }

    $char = null;
    foreach ($str_arr as $key => $value) {
    	if($value == 1)
    		{
    			$char = $key;
    			break;
    		} 
    }

    if($char == null)
    {
    	return -1;
    }
    else
    {
	    for($i=0; $i<strlen($str); $i++)
	    {
	    	if($str[$i]==$char)
	    		return $i;
	    }
    }

    // print_r($str_arr);
}

$str = 'GadndfajlgjfdaslgjaHdsajlgdfndsafkldsakg';

$result = FirstNotRepeatingChar($str);

var_dump($result);