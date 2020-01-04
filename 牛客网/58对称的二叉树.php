<?php
/*
 * 题目描述
 * 请实现一个函数，用来判断一颗二叉树是不是对称的。注意，如果一个二叉树同此二叉树的镜像是同样的，定义其为对称的。
 * */
/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
require "CreateTree.php";
function isSymmetrical($pRoot)
{
    // write code here
	return isSymmetricalCore($pRoot,$pRoot);
}
function isSymmetricalCore($pRoot1,$pRoot2)
{
	if($pRoot1==NULL && $pRoot2==NULL){
		return true;
	}
	if($pRoot1==NULL || $pRoot2==NULL){
		return false;
	}
	if($pRoot1->val != $pRoot2->val){
		return false;
	}
	return isSymmetricalCore($pRoot1->left,$pRoot2->right) && isSymmetricalCore($pRoot1->right,$pRoot2->left);
}

// 以上代码为通过测试的代码
function Mirror(&$pRoot){
	if($pRoot == NULL){
		return NULL;
	}

	Mirror($pRoot->left);
	Mirror($pRoot->right);

	$temp = $pRoot->left;
	$pRoot->left = $pRoot->right;
	$pRoot->right = $temp;
}
function Mirror_2(&$newTree,$pRoot){
	if($pRoot == NULL){
		return NULL;
	}

	Mirror_2($newTree->right,$pRoot->left);
	Mirror_2($newTree->left,$pRoot->right);

	$newTree->left = $pRoot->left;
	$newTree->right = $pRoot->right;
}

$array = [8,8,7,9,2,'#','#','#','#',4,7];
$tree = CreateTree($array);

echo "<pre>";
$res = isSymmetrical($tree);
var_dump($res);
// $v = $tree->val;
// $newTree = new TreeNode($v);
// print_r($newTree);
// print_r($tree);
// Mirror_2($newTree,$tree);
// echo "----------";
// print_r($newTree);
// print_r($tree);
echo "</pre>";
