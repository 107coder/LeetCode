<?php
/**
 * Create by PhpStorm.
 * FileName: 32从上到下打印二叉树.php
 * User: CSF
 * Date: 2020/4/7
 * Time: 20:11
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
class Solution_jz32
{

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function levelOrder($root)
    {
        if ($root === NULL) return [];
        $result = [];
        $queue = [];
        $queue[] = $root;
        while ($queue) {
            $node = array_shift($queue);
            $result[] = $node->val;
            if($node->left != NULL){
                $queue[] = $node->left;
            }
            if($node->right != NULL){
                $queue[] = $node->right;
            }
        }
        return $result;
    }
}

include "../Common/CreateTree.php";
$obj = new Solution_jz32();

$arr = [3, 9, '#', '#', 20, 15, '#', '#', 7];

$root = CreateTree($arr);

$result = $obj->levelOrder($root);

print_r($result);

