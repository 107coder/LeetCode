<?php
/**
 * Create by PhpStorm.
 * FileName: 876链表的中间结点.php
 * User: CSF
 * Date: 2020/3/23
 * Time: 14:53
 */

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
require_once 'Common/CreateLinkList.php';

class Solution_lc876
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function middleNode($head)
    {
        if ($head == NULL) return NULL;

        $index1 = $head;
        $index2 = $head;
        while ($index1 != NULL && $index1->next != NULL) {
            $index1 = $index1->next->next;
            $index2 = $index2->next;
        }
        if ($index1) {
            $index2 = $index2->next;
        }
        return $index2;
    }
}

$s = new Solution_lc876();
$arr = [1, 2, 3, 4, 5];

$head = new linkNode(null);
$head->next = CreateLinkList($arr);

$res = $s->middleNode($head);

print_r($res);