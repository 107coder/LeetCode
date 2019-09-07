<?php
class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
/*
 * function_1 ：直接将链表遍历出来，存储到一个数组中，将这个数组倒置，直接返回就完成题目要求
 */
function printListFromTailToHead($head)
{
	if($head === null)
	{
		return [];
	}
	$key = 0;
    $res_arr = array();
    while($head->next != null)
    {
    	$res_arr[$key] = $head->val;
    	$head = $head->next;
    	$key++;
    }
    $res_arr[$key] = $head->val;
    $res_arr = array_reverse($res_arr);
    return $res_arr;
}

/*
 * function_2: 使用递归方法输出
 */
function printListFromTailToHead_2($head)
{
    $res_arr = array();
    doaction($head,$res_arr);
    return $res_arr;
}

function doaction($head,&$res_arr)
{
    if($head != NULL)
    {
        if($head->next != NULL)
        {
            doaction($head->next,$res_arr);
        }
        array_push($res_arr,$head->val);
    }
}

/*
 * 
 */

$node0 = new ListNode(0);
$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node3 = new ListNode(3);
$head = $node0;
$node0->next = $node1;
$node1->next = $node2;
$node2->next = $node3;

// 0->1->2->3
// $head = null;
$res = printListFromTailToHead_2($head);

// print_r($head);
// print_r($res);

$tese = time();
var_dump(date('Y-m-d H:m:s',$tese));