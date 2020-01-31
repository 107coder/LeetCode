<?php

/*
给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。

有效字符串需满足：

左括号必须用相同类型的右括号闭合。
左括号必须以正确的顺序闭合。
注意空字符串可被认为是有效字符串。
*/
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        if($s == "")
        	return true;

        $len = strlen($s);

        if($len % 2 != 0)
        	return false;

        $array = array(
        	')' => '(',
        	']' => '[',
        	'}' => '{'
        );
        $stack = [];
        for($i=0; $i<$len; $i++){
        	if(in_array($s[$i], $array)){
        		array_push($stack, $s[$i]);
        	}
        	else
        	{
        		if(empty($stack)){
        			return false;
        		}
        		if($array[$s[$i]] != array_pop($stack)){
        			return false;
        		} 
        	}
        }
        if(empty($stack)){
        	return true;
        }
        return false;
    }

}

$s = "()";
$s = "()[]{}";
$s = "(]";
$s = "([)]";
$s = "{[]}";
$solution = new Solution();
$res = $solution->isValid($s);

var_dump($res);