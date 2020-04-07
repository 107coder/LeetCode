<?php
/**
 * Create by PhpStorm.
 * FileName: 32III从上到下打印二叉树.php
 * User: CSF
 * Date: 2020/4/7
 * Time: 20:54
 * 其实就是之字形打印
 */
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution_jz32III {

    /**
     * @param TreeNode $root
     * @return Integer[][]
     */
    function levelOrder($root) {
        if ($root === NULL) return [];
        $result = [];
        $tmp = [];
        $queue = [];
        $queue[] = $root;
        $nextQueue = [];
        $flag = 1;
        while ($queue) {
            $node = array_shift($queue);
            $tmp[] = $node->val;
            if($node->left != NULL){
                $nextQueue[] = $node->left;
            }
            if($node->right != NULL){
                $nextQueue[] = $node->right;
            }
            if(empty($queue)){
                if(($flag & 1) == 0){
                    $tmp = array_reverse($tmp);
                }
                $flag++;
                $result[] = $tmp;
                $queue = $nextQueue;
                $nextQueue = [];
                $tmp = [];
            }
        }
        return $result;
    }
}

include "../Common/CreateTree.php";
$obj = new Solution_jz32III();

$arr = [3, 9, '#', '#', 20, 15, '#', '#', 7];

$root = CreateTree($arr);

$result = $obj->levelOrder($root);

print_r($result);