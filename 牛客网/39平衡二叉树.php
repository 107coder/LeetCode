<?php

/*
题目描述
输入一棵二叉树，判断该二叉树是否是平衡二叉树。
 */
require 'CreateTree.php';
function IsBalanced_Solution($pRoot)
{
	if($pRoot == NULL){
		return true;
	}
    // write code here
    $left = TreeDepth($pRoot->left);
    $right = TreeDepth($pRoot->right);
    if(abs($left-$right) > 1){
    	return false;
    }
    IsBalanced_Solution($pRoot->left);
    IsBalanced_Solution($pRoot->right);

    return true; 
}
/**
 * 层序遍历二叉树
 * @param [type] $pRoot [description]
 */
function TreeDepth($pRoot){
	if($pRoot == NULL){
		return NULL;
	}
	$hight = 0;  // 树高
	$i = 0;	     // 当前层还剩几个数
	$j = 0;      // 下层的节点数
	// 创建一个队列
	$queue = [];
	// 首先先把根节点放入队列
	array_unshift($queue, $pRoot);
	$i=1;
	// 队列不为空是循环
	while(!empty($queue)){
		$node = array_pop($queue);
		$i--;
		if($node->left != NULL){
			$j++;
			array_unshift($queue, $node->left);
		}
		if($node->right != NULL){
			$j++;
			array_unshift($queue, $node->right);
		}
		if($i == 0){
			$i = $j;
			$j = 0;
			$hight++;
		}
	}
	return $hight;
}

$array = [8,8,7,9,2,'#','#','#','#',4,7];
$array = [1,2];
$pRoot =CreateTree($array);

$res = IsBalanced_Solution($pRoot);

var_dump($res);
