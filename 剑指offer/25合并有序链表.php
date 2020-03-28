<?php
/**
 * Create by PhpStorm.
 * FileName: 25合并有序链表.php
 * User: CSF
 * Date: 2020/3/28
 * Time: 18:32
 */


include "../Common/CreateLinkList.php";
class Solution_jz25 {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {

        $res = new linkNode(0);
        $head = $res;
        while ($l1 != NULL && $l2 != NULL){
            if($l1->val > $l2->val){
                $res->next = $l2;
                $l2 = $l2->next;
            }else{
                $res->next = $l1;
                $l1 = $l1->next;
            }
            $res = $res->next;
        }
        while ($l1){
            $res->next = $l1;
            $l1 = $l1->next;
            $res = $res->next;
        }
        while ($l2){
            $res->next = $l2;
            $l2 = $l2->next;
            $res = $res->next;
        }
        return $head->next;
    }
}

$arr1 = [1,2,3];
$arr2 = [1,3,4];
$head1 = CreateLinkList($arr1);
$head2 = CreateLinkList($arr2);

$obj = new Solution_jz25();

$res = $obj->mergeTwoLists($head1,$head2);

print_r($res);