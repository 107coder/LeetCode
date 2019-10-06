<?php

// 输入两个单调递增的链表，输出两个链表合成后的链表，当然我们需要合成后的链表满足单调不减规则。

class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
function Merge($pHead1, $pHead2)
{
	$newHead = new ListNode(0);
   	$result = $newHead;

   	while($pHead1 != NULL && $pHead2 != NULL)
   	{
   		$val1 = $pHead1->val;
   		$val2 = $pHead2->val;
   		if($val1 > $val2)
   		{
   			$tmp = $pHead2;
   			$pHead2 = $pHead2->next;
   			$tmp->next = NULL;
   			$newHead->next = $tmp;
   			$newHead = $$newHead->next;
   		}
   		else if($val1 < $val2)
   		{
   			$tmp = $pHead1;
   			$pHead1 = $pHead1->next;
   			$tmp->next = NULL;
   			$newHead->next = $tmp;
   			$newHead = $$newHead->next;
   		}
   		else if($val1 == $val2)
   		{
   			$tmp = $pHead1;
   			$pHead1 = $pHead1->next;
   			$tmp->next = NULL;
   			$newHead->next = $tmp;
   			$newHead = $$newHead->next;

   			$tmp = $pHead2;
   			$pHead2 = $pHead2->next;
   			$tmp->next = NULL;
   			$newHead->next = $tmp;
   			$newHead = $$newHead->next;
   		}
   		else 
   		{

   		}

   		if($pHead1 == NULL)
   		{
   			$newHead->next = $pHead2;
   		}

   		if($pHead2 == NULL)
   		{
   			$newHead->next = $pHead1;
   		}

   		return $result;
   	}
}

$l0 = new ListNode(1);
$l1 = new ListNode(4);
$l2 = new ListNode(7);
$l3 = new ListNode(8);
$l4 = new ListNode(10);
$pHead1 = $l0;
$l0->next = $l1;
$l1->next = $l2;
$l2->next = $l3;
$l3->next = $l4;

$l5 = new ListNode(2);
$l6 = new ListNode(3);
$l7 = new ListNode(5);
$l8 = new ListNode(6);
$l9 = new ListNode(9);
$pHead2 = $l5;
$l5->next = $l6;
$l6->next = $l7;
$l7->next = $l8;
$l8->next = $l9;

$result = Merge($pHead1,$pHead2);

print_r($result);


// $tmp = $pHead1;
// $pHead1 = $pHead1->next;
// $tmp->next = NULL;

// print_r($pHead1);

// print_r($tmp);



