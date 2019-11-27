<?php
/*
题目描述
输入两个链表，找出它们的第一个公共结点。
*/
/*class ListNode{
    var $val;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}*/

include("CreateLinkList.php");
function FindFirstCommonNode($pHead1, $pHead2)
{
    if($pHead2 == NULL || $pHead2 == NULL){
    	return NULL;
    }

    $len1 = GetLinkListLength($pHead1);
    $len2 = GetLinkListLength($pHead2);

    while ($len1>$len2) {
    	$pHead1 = $pHead1->next;
    	$len1--;
    }

    while($len1<$len2){
    	$pHead2 = $pHead2->next;
    	$len2--;
    }

    while($pHead1!=NULL || $pHead2!=NULL){
    	if($pHead1->val == $pHead2->val){
    		return $pHead1;
    	}
    	$pHead1 = $pHead1->next;
    	$pHead2 = $pHead2->next;
    }

    return NULL;
}

function GetLinkListLength($linkList){
	if($linkList == NULL){
		return 0;
	}

	$pNode = $linkList;
	$len = 0;
	while ($pNode != NULL) {
		$len++;
		$pNode = $pNode->next;
	}
	return $len;
}
$data = [1,2,3,6,7];
$link1 = CreateLinkList($data);
$data = [4,5,6,7];
$link2 = CreateLinkList($data);

$result = FindFirstCommonNode($link1,$link2);

print_r($result);
// print_r(GetLinkListLength($link2));