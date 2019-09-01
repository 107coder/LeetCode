<?php
class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
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

$node0 = new ListNode(0);
$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node3 = new ListNode(3);
$head = $node0;
$node0->next = $node1;
$node1->next = $node2;
$node2->next = $node3;

// $head = null;
printListFromTailToHead($head);