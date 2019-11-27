<?php
/*
题目描述
输入一棵二叉树，求该树的深度。从根结点到叶结点依次经过的结点（含根、叶结点）形成树的一条路径，最长路径的长度为树的深度。
*/
/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
require 'CreateTree.php';
function TreeDepth($pRoot)
{
	if($pRoot == NULL){
		return 0;
	}
    // write code here
    $high = 0;
    $stack = [];

}

function TreeDepthCore($TreeNode,&$high,&$stack){
	if($TreeNode->left != NULL){
		$high++;
		array_push($stack, $TreeNode->left);
		TreeNodeCore($TreeNode->left,$high,$stack);
	}
	if($TreeNode->right != NULL){
		$high++;
		array_push($stack, $TreeNode->right);
		TreeNodeCore($TreeNode->right,$high,$stack);
	}
	if($TreeNode->left==NULL && $TreeNode->right==NULL){
		return array_pop($stack);
	}
}

$array = [8,8,7,9,2,'#','#','#','#',4,7];
$pRoot =CreateTree($array);

print_r($pRoot);