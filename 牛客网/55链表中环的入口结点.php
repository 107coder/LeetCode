<?php
/*
题目描述
给一个链表，若其中包含环，请找出该链表的环的入口结点，否则，输出null。
*/
class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
function EntryNodeOfLoop($pHead)
{
    
}

function isLoop($pHead){
	$p1 = $pHead;
	$p2 = $p1;

	while($p1->next != NULL){
		$p1 = $p1->next->next;
		$p2 = $p2->next;
		if($p1 == $p2){
			return true;
		}
	}
}
$pHead = new ListNode(1);
$node2 = new ListNode(2);
$node3 = new ListNode(3);
$node4 = new ListNode(4);
$node5 = new ListNode(5);
$node6 = new ListNode(6);

$pHead->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
$node5->next = $node6;
$ndoe6->next = $node3;

$res = isLoop($pHead);
var_dump($res);