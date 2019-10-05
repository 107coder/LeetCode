<?php

// 输入一个链表，反转链表后，输出新链表的表头。

class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}

function ReverseList($pHead)
{
    if($pHead == NULL && $pHead->next == NULL)
    {
    	return $pHead;
    }

    $cur = $pHead;
    $pre = NULL;
    $tmp = NULL;
    while ($cur != NULL) {
    	$tmp = $cur->next;
    	$cur->next = $pre;
    	if($tmp == NULL)
    		$reverHead = $cur;
    	$pre = $cur;
    	$cur = $tmp;
    }
    return $reverHead;
}

$l0 = new ListNode(1);
$l1 = new ListNode(2);
$l2 = new ListNode(3);
$l3 = new ListNode(4);
$l4 = new ListNode(5);
$pHead = $l0;
$l0->next = $l1;
$l1->next = $l2;
$l2->next = $l3;
$l3->next = $l4;

$result = ReverseList($pHead);
// print_r($l0);
// $a = $l1;
// $a->next = NULL;
// print_r($l0);

print_r($result);
