<?php
/*
题目描述
在一个排序的链表中，存在重复的结点，请删除该链表中重复的结点，重复的结点不保留，返回链表头指针。 例如，链表1->2->3->3->4->4->5 处理后为 1->2->5
*/
/*class ListNode{
    var $val;
    var $next = NULL;  
    function __construct($x){
        $this->val = $x;
    }
}*/
require "CreateLinkList.php";
/*
	判断当前的这个值 与 下一个值是不是相等，
		如果想相等，将这个值保存到temp中，然后删除当前的这个值
		如果不相等，判断temp中是否有值，如果有值，删除当前结点，如果不想等，不进行删除

	循环比较，知道链表结束

	循环遍历 比较，只要遇到相同的值，就开始删除 ，直到把所有的重复的值都删除干净

*/
function deleteDuplication($pHead)
{
	// 判断头结点是否为空
    if($pHead == NULL){
    	return $pHead;
    }

    $pNode = $pHead;  // 记录头结点
    $pPreNode = NULL;  // 记录前一个结点
    while($pNode != NULL){   // 开始循环遍历 在链表中查找是否存在需要删除的结点
    	$pNext = $pNode->next;   // 记录下一个结点
    	$needDelete = false;     // 记录是否需要删除 结点（是否检测到有重复的结点）
    	
    	// 判断是否存在重复的节点      
    	if($pNext != NULL && $pNext->val == $pNode->val){
    		$needDelete = true;
    	}
    	// 如果没有重复的结点 。直接往下进行，前一个结点 = 当前结点，当前结点=下一个结点
    	if(!$needDelete){
    		$pPreNode = $pNode;
    		$pNode = $pNext;
    	}else{     // 如果需要删除结点，开始删除结点    		
    		$deleteValue = $pNode->val;   // 记录需要删除的 重复的结点的值
    		$pToBeDel = $pNode;           // 记录需要删除的结点
    		
    		// 循环 遍历需要删除的结点。   循环条件： 当前的结点的不为空，并且要删除的结点的值与记录的重复值相等
    		while ($pToBeDel != NULL && $pToBeDel->val == $deleteValue) {
    			/*
					删除方法：
						刚开始删除的时候，要删除的结点就是，当前循环中的结点、  
						下一个结点 = 要删除的的结点的下一个结点。  因为删除了之后，出现循环的结点
						删除要删除的结点
						要删除的结点 = 下一个结点
						再次循环判断
    			*/
    			$pNext = $pToBeDel->next;
    			unset($pToBeDel);
    			$pToBeDel = $pNext;
    		}

    		// 如果前一个结点为空，，第一次循环中就开始删除，也就是删除的结点是头结点 ，让头结点直接指向删除之后的下一个结点
    		if($pPreNode == NULL){
				$pHead = $pNext;    			
    		}else{
    			$pPreNode->next = $pNext;
    		}
    		$pNode = $pNext;
    	}
    }


    return $pHead;
}



/**
	错误版本，重复的不删除完
*/
function myFun($pHead){

	if($pHead == NULL){
    	return $pHead;
    }
    $pindex = $pHead;
    // 不能只存一个值，需要把整个结点都存起来
	$temp = $pindex;
    while ($pindex->next != NULL) {
    	$pindex = $pindex->next;
    	if($temp->val == $pindex->val){
			$temp->next = $pindex->next;
    		$pindex = $temp;
    	}else{
	    	// 再存起来这个值，等待下次使用
			$temp = $pindex;
    	}
    }
    return $pHead;
}


$arr = [1,2,2,3,3,4,4,4,4,4,6];
$arr = [1,2,3,3,4,4,5];
$pHead = CreateLinkList($arr);

$res = deleteDuplication($pHead);

print_r($res);

