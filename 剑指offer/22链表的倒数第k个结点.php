<?php
/**
 * Create by PhpStorm.
 * FileName: 22链表的倒数第k个结点.php
 * User: CSF
 * Date: 2020/3/28
 * Time: 17:47
 */


include "../Common/CreateLinkList.php";

class Solution_jz22
{

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function getKthFromEnd($head, $k)
    {
        if($head == NULL){
            return NULL;
        }
        $quick = $head;
        $slow = $head;

        while ($k != 0 && $quick != NULL){
            $quick = $quick->next;
            $k--;
        }
//        if($quick == NULL){
//            return NULL;
//        }
        while ($quick!= NULL && $slow != NULL){
            $quick = $quick->next;
            $slow = $slow->next;
        }

        return $slow;
    }
}

$obj = new Solution_jz22();

$arr = [1, 2, 3, 4, 5, 6, 7];
$arr = [1];
$head = CreateLinkList($arr);

$k = 1;

$res = $obj->getKthFromEnd($head,$k);

var_dump($res);