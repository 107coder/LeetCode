<?php
/*输入一个链表，输出该链表中倒数第k个结点。*/

class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}

// 方法一，首先计算出链表的总长度，然后再从头开始遍历到 $len - $k 个值返回
function FindKthToTail($head, $k)
{
	$_head = $head;
    if($_head == NULL){
    	return NULL;
    }

    $len = 0;
    while($_head  != NULL){
    	$len++;
    	$_head = $_head->next;
    }

    if($k > $len){
    	return NULL;
    }
    $index = $len-$k;
    $_head = $head;
    while($_head != NULL){
    	if($index <= 0){
    		return $_head->val;
    	}
    	$_head = $_head->next;
    	$index--;
    }
}

// function_2   youjie
// 使用快慢指针，先让快指针移动k次。然后两个指针一起移动，等快指针到最后的时候，返回慢指针的值
function FindKthToTail_2($head, $k)
{
	if($head == NULL && $k < 0)
	{
		return NULL;
	}

	$index = $head;
	while($k > 0)
	{
		$head = $head->next;
		$k--;
		if($head == NULL)
		{
			return NULL;
		}
	}
	if($head == NULL)
		return $head;
	while($head != NULL)
	{
		$head = $head->next;
		$index = $index->next;
	}
	return $index;
}
$l0 = new ListNode(1);
$l1 = new ListNode(2);
$l2 = new ListNode(3);
$l3 = new ListNode(4);
$l4 = new ListNode(5);
$head = $l0;
$l0->next = $l1;
$l1->next = $l2;
$l2->next = $l3;
$l3->next = $l4;

$k = 8;
$result = FindKthToTail_2($head,$k);

print_r($result);

// $k      5  4  3  2  1
// $index  
