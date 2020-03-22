<?php
/**
 * Create by PhpStorm.
 * FileName: 18删除链表的节点.php
 * User: CSF
 * Date: 2020/3/22
 * Time: 11:33
 */

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
require '../Common/CreateLinkList.php';

class Solution_jz18
{

    /**
     * @param ListNode $head
     * @param Integer $val
     * @return ListNode
     */
    function deleteNode($head, $val)
    {
        if($head == NULL) return NULL;
        $res = new linkNode(0);
        $res->next = $head;
        $node = $res;

        while($node->next != NULL){
            $pre = $node;
            $node = $node->next;
            if($node->val == $val){
                $pre->next = $node->next;
                break;
            }
        }
        return $res->next;
    }
}

$s = new Solution_jz18();

$arr = [4, 5, 1, 9];
$val = 5;
$head = CreateLinkList($arr);

$res = $s->deleteNode($head, $val);

print_r($res);