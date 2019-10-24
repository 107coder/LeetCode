<?php
class RandomListNode{
    var $label;
    var $next = NULL;
    var $random = NULL;
    function __construct($x){
        $this->label = $x;
    }
}
/*
题目描述
输入一个复杂链表（每个节点中有节点值，以及两个指针，一个指向下一个节点，另一个特殊指针指向任意一个节点），返回结果为复制后复杂链表的head。（注意，输出结果中请不要返回参数中的节点引用，否则判题程序会直接返回空）
*/
function MyClone($pHead)
{
    // write code here
    if($pHead == NULL)
    	return NULL;
    $originalHead = $pHead;
    // 复制结点
    while($pHead != NULL)
    {
    	$_pHead = new RandomListNode($pHead->label);
    	$_pHead->next = $pHead->next;
    	$pHead->next = $_pHead;
    	$pHead = $_pHead->next;
    }
    // 重新规定结点的随机结点
    $pHead = $originalHead;
    while($pHead != NULL)
    {
    	$_pHead = $pHead->next;
    	$_pHead->random = $pHead->random==NULL?NULL:$pHead->random->next;
    	$pHead = $_pHead->next;
    }
// print_r($originalHead);exit();

    //链表的拆分
    $pHead = $originalHead;
    $pHead_later = $pHead;
    $pHead_now = $pHead->next;
    $_pHead = $pHead_now;
    while($pHead != NULL)
    {
    	$pHead->next = $_pHead->next;
    	$pHead = $_pHead->next;
    	$_pHead->next = $pHead==NULL?NULL:$pHead->next;

    	$_pHead = $pHead==NULL?NULL:$pHead->next;
    }
    return $pHead_now;
}

$node1 = new RandomListNode(1);
$node2 = new RandomListNode(2);
$node3 = new RandomListNode(3);
$node4 = new RandomListNode(4);
$node1->next = $node2;
$node1->random = $node3;
$node2->next = $node3;
$node2->random = $node4;
$node3->next = $node4;
$node3->random = $node1;
$pHead = $node1;

// 1->2->3->4

// 1->_1->2->_2->3->_3->4->_4

$result = MyClone($pHead);
echo "<pre>";
print_r($pHead);
echo "</pre>";
echo "----------------------------------";
echo "<pre>";
print_r($result);
echo "</pre>";

if($result === $pHead)
{
	echo "success";
}else 
{
	echo "error";
}