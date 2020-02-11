<?php
/*
为了表示给定链表中的环，我们使用整数 pos 来表示链表尾连接到链表中的位置（索引从 0 开始）。 如果 pos 是 -1，则在该链表中没有环。
*/

require "./Common/CreateLinkList.php";
class Solution {

    function hasCycle($head) {
        if($head == NULL){
        	return false;
        }

        $index1 = $head;
        $index2 = $index1;
        while($index1 != NULL && $index2->next != NULL && $index2->next->next!=NULL){
        	$index1 = $index1->next;
        	$index2 =$index2->next->next;
        	if($index1 == $index2){
        		return true;
        	}
        }
        return false;
    }
}

$node1 = new linkNode(1);
$node2 = new linkNode(2);
$node3 = new linkNode(3);
$node4 = new linkNode(4);
$node5 = new linkNode(5);
$node6 = new linkNode(6);
$node1->next = $node2;
$node2->next = $node3;
$node3->next = $node4;
$node4->next = $node5;
$node5->next = $node6;

// $node6->next = $node3; 

$head = $node1;

$obj = new Solution();
$res = $obj->hasCycle($head);
var_dump($res);