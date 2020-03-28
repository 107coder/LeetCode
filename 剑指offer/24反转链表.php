<?php
/**
 * Create by PhpStorm.
 * FileName: 23反转链表.php
 * User: CSF
 * Date: 2020/3/28
 * Time: 18:22
 */


include "../Common/CreateLinkList.php";
class Solution_jz23 {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        if($head == NULL) return NULL;
        $pre = NULL;
        $cur = $head;
        $next = $head->next;
        while($cur != NULL && $next != NULL){
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;
            $next = $next->next;
        }
        $cur->next = $pre;
        return $cur;
    }
}

$arr = [1,2,3,4,5];
$arr = [1];
$head = CreateLinkList($arr);

$obj = new Solution_jz23();
$res = $obj->reverseList($head);

print_r($res);