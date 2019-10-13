<?php
/*
操作给定的二叉树，将其变换为源二叉树的镜像。
输入描述:
二叉树的镜像定义：源二叉树 
    	    8
    	   /  \
    	  6   10
    	 / \  / \
    	5  7 9 11
    	镜像二叉树
    	    8
    	   /  \
    	  10   6
    	 / \  / \
    	11 9 7  5
*/
class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
function Mirror(&$root){
    if($root == NULL)
    {
    	return NULL;
    }

    Mirror($root->left);
    Mirror($root->right);

    $temp = $root->left;
    $root->left = $root->right;
    $root->right = $temp; 
}
    
    

$root = new TreeNode(8);
$node1 = new TreeNode(6);
$node2 = new TreeNode(10);
$node3 = new TreeNode(5);
$node4 = new TreeNode(7);
$node5 = new TreeNode(9);
$node6 = new TreeNode(11);

$root->left = $node1;
$root->right = $node2;

$node1->left = $node3;
$node1->right = $node4;

$node2->left = $node5;
$node2->right = $node6;

print_r($root);

Mirror($root);

print_r($root);
