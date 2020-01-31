<?php 
// 通过数组创建一个链表

/**
 * 调用CreateLinkList()方法，传入一个数组的值，返回一个链表 
 */


class linkNode
{
	public $val;
	public $next = NULL;
	function __construct($val)
	{
		$this->val = $val;
	}
}

function CreateLinkList($array)
{
	if(empty($array))
	{
		return NULL;
	}
	$length = count($array);
	$index = 0;
	$linkHead = CreateNode($array,$length,$index);
	return $linkHead;
}

function CreateNode($array,$length,$index)
{
	if($index >= $length)
	{
		return NULL;
	}
	else
	{
		$linkNode = new linkNode($array[$index]);
		$linkNode->next = CreateNode($array,$length,++$index);
		return $linkNode;
	}
}
