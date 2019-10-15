<?php

$stack1 = array();
$stack2 = array();

/*
* 思路：使用线性栈，
* 	入栈：直接将所有的元素都入栈到 栈1 中 
* 	出栈：用 栈2 来进行出栈操作，判断 栈2 是否为空栈，如果为空栈，就将栈1 中的元素出栈，然后对于栈2入栈，最后再对栈2出栈；
* 			如果栈2中有元素，那就直接出栈栈2 中的元素
*/

function mypush($node)
{
    array_push($GLOBALS['stack1'],$node);
}
function mypop()
{
	if(empty($GLOBALS['stack2']))
	{
		while(!empty($GLOBALS['stack1']))
		{
	    	$temp = array_pop($GLOBALS['stack1']);
	    	array_push($GLOBALS['stack2'],$temp);
		}		
	}

    return array_pop($GLOBALS['stack2']);
}

mypush(1);
echo mypop();
mypush(2);
mypush(3);
echo mypop();
mypush(4);

echo mypop();
echo mypop();