<?php
/**
 * Create by PhpStorm.
 * FileName: 27二叉树镜像.php
 * User: CSF
 * Date: 2020/3/29
 * Time: 14:03
 */

include '../Common/CreateTree.php';

class Solution_jz27
{

    /**
     * @param TreeNode $root
     * @return TreeNode
     */
    function mirrorTree($root)
    {
        if($root == NULL){
            return NULL;
        }
        $queue = [];
        $queue[] = $root;

        while(!empty($queue)){
            $node = array_shift($queue);
            $tmp = $node->left;
            $node->left = $node->right;
            $node->right = $tmp;
            if($node->left != NULL){
                $queue[] = $node->left;
            }
            if($node->right != NULL){
                $queue[] = $node->right;
            }
        }
        return $root;
    }
}

$obj = new Solution_jz27();

$arr = [4, 2, 1, '#', '#', 3, '#', '#',7, 6, '#', '#', 9];

$root = CreateTree($arr);

//print_r($root);

$res = $obj->mirrorTree($root);

print_r($res);