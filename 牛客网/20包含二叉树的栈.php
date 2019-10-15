<?php
/*
题目描述
定义栈的数据结构，请在该类型中实现一个能够得到栈中所含最小元素的min函数（时间复杂度应为O（1））。
*/


// 解题思路，使用空间换时间，只是说要实现一个栈，任何时间都能得到该栈的最小值，
// 直接使用两个栈，一个栈正常的存储数据，另一个栈去存当前的最小值，每次求的最小的值的时候，直接取出第二个栈的栈顶元素即可
$stack1 = [];
$stack2 = [];
function init()
{
	global $stack1,$stack2;
	global $stack1;
}
function mypush($node)
{
	global $stack1,$stack2;
	// 添加node到第一个栈
    array_push($stack1, $node);
    // 如果stack2为空，添加元素，即默认第一数为最小值
    if(empty($stack2))
    {
    	array_push($stack2,$node);
    }
    else if(end($stack2) > $node)
    {
    	array_push($stack2,$node);
    }
    else
    {
    	array_push($stack2,end($stack2));
    }
}
function mypop()
{
	global $stack1,$stack2;
	if(empty($stack1))
	{
		return NULL;
	}
    // 出栈操作
    array_pop($stack2);
    return array_pop($stack1);
}
function mytop()
{
	global $stack1,$stack2;
    if(empty($stack1))
    {
    	return NULL;
    }

    return end($stack1);
}
function mymin()
{
	global $stack1,$stack2;
    if(empty($stack2))
    {
    	return NULL;
    }

    return end($stack2);
}

mypush(4);
mypush(6);
mypush(1);
mypush(7);
mypush(1);
mypush(10);
mypush(1);

mypop();
mypop();
mypop();
mypop();
mypop();
mypop();
// print_r($stack1);

$result = mymin();

print_r($result);
