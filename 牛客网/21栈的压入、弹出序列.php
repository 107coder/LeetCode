<?php
/*
题目描述
输入两个整数序列，第一个序列表示栈的压入顺序，请判断第二个序列是否可能为该栈的弹出顺序。假设压入栈的所有数字均不相等。例如序列1,2,3,4,5是某栈的压入顺序，序列4,5,3,2,1是该压栈序列对应的一个弹出序列，但4,3,5,1,2就不可能是该压栈序列的弹出序列。（注意：这两个序列的长度是相等的）
 */

/*
解题思路：
设置两个指针，分别指向push序列的第一个值和pop序列的第一个值，
然后从入栈的序列开始，判断入栈的数和出栈的数是否相同，（所以该方法只适合于序列中无重复元素）
如果不相同，就把push中的该数进行入栈操作push指针向后移动，pop序列中指针不动
如果相同，就将push和pop的指针同时向后移动，不进行入栈操作，（其实相当于对比较的数据进行了入栈和出栈的两个操作，栈中无变化）

最后将栈中的元素出栈，分别与pop序列中剩余的元素做比较，只要是遇到不同的元素，直接返回false，只有当全相等时，才返回true
 */
function IsPopOrder_success($pushV, $popV)
{
	// 分别获取两个序列的长度
	$lenPush = count($pushV);
	$lenPop = count($popV);
	// 如果两个序列不相同，直接返回false
	if($lenPop != $lenPush)
	{
		return FALSE;
	}
	// 定义一个线性栈
	$stack = array();
	// 设置pop序列的指针
	$popIndex = 0;
	// 设置push的指针，并使用for循环，移动该指针
	for($i=0; $i<$lenPush; $i++)
	{
		if($pushV[$i] != $popV[$popIndex])
		{
			array_push($stack,$pushV[$i]);
		}
		else
		{
			$popIndex++;
		}
	}
	while(!empty($stack))
	{
		if(array_pop($stack) != $popV[$popIndex])
		{
			return FALSE;
		}
		$popIndex++;
	}
	return TRUE;
}

function IsPopOrder($pushV, $popV)
{
	// 分别获取两个序列的长度
	$lenPush = count($pushV);
	$lenPop = count($popV);
	// 如果两个序列不相同，直接返回false
	if($lenPop != $lenPush)
	{
		return FALSE;
	}
	// 定义一个线性栈
	$stack = array();
	// 设置pop序列的指针
	$popIndex = 0;
	// 设置push的指针，并使用for循环，移动该指针
	for($i=0; $i<$lenPush; $i++)
	{
		array_push($stack,$pushV[$i]);
		while(!empty($stack) && end($stack) == $popV[$popIndex])
		{
			array_pop($stack);
			$popIndex++;
		}
	}
	
	return empty($stack);
}

$pushV = [1,2,3,4,5];
$popV = [4,5,3,1,2];

$result = IsPopOrder($pushV, $popV);

var_dump($result);