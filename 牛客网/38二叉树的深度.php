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
    array_push($stack,$pRoot);
    TreeDepthCore($pRoot,$high,$stack);
    return $high;
}

function TreeDepthCore($TreeNode,&$high,&$stack){
	if($TreeNode->left != NULL){
		// $high++;
		array_push($stack, $TreeNode->left);
		TreeDepthCore($TreeNode->left,$high,$stack);
	}
	if($TreeNode->right != NULL){
		// $high++;
		array_push($stack, $TreeNode->right);
		TreeDepthCore($TreeNode->right,$high,$stack);
	}
	if($TreeNode->left==NULL && $TreeNode->right==NULL){
		$high = $high>count($stack)?$high:count($stack);
	}
	return array_pop($stack);
}


// 直接使用递归的写法
function TreeDepth_2($pRoot){
	if($pRoot == NULL){
		return 0;
	}
	$left = TreeDepth_2($pRoot->left);
	$right = TreeDepth_2($pRoot->right);
	return max($left,$right)+1;
}

/**
 * [TreeDepth_3 层序遍历树，求得最大值]
 * @param [type] $pRoot [description]
 */
function TreeDepth_3($pRoot){
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
$pRoot =CreateTree($array);

// $res = TreeDepth($pRoot);
$res = TreeDepth_3($pRoot);
print_r($res);