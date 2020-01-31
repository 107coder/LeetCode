<?php
/*
将两个有序链表合并为一个新的有序链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。 

示例：

输入：1->2->4, 1->3->4
输出：1->1->2->3->4->4
*/
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
require "Common/CreateLinkList.php";
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        if($l2==NULL && $l1==NULL){
        	return NULL;
        }
        $cur = new linkNode(0);
        // $cur = NULL;
        $res = $cur;
        $i = 0;
        while($l1!=NULL && $l2!=NULL){
        	if($l1->val > $l2->val){
        		$temp = $l2;
        		$l2 = $l2->next;
        		$temp->next = NULL;
        		$cur->next = $temp;
        	}else{
        		$temp = $l1;
        		$l1 = $l1->next;
        		$temp->next = NULL;
        		$cur->next = $temp;
        	}	
        	$cur = $cur->next;
        }

        if ($l1 != NULL) {
        	$cur->next = $l1;
        }


        if ($l2 != NULL) {
			$cur->next = $l2;
        }

        return $res->next;
    }
}

$arr1= [1,2,4];
$arr2= [1,3,4];

$arr1 = [1];
$arr2 = [];
$l1 = CreateLinkList($arr1);
$l2 = CreateLinkList($arr2);

// print_r($l1);

$s = new Solution();
$res = $s->mergeTwoLists($l1,$l2);

print_r($res);