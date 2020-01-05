<?php
/*
题目描述
请实现一个函数按照之字形打印二叉树，即第一行按照从左到右的顺序打印，第二层按照从右至左的顺序打印，第三行按照从左到右的顺序打印，其他行以此类推。
*/
/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
require "CreateTree.php";
// 改进层序遍历二茶树，使之可以之字形打印
function MyPrint($pRoot)
{
	if($pRoot == NULL){
		return [];
	}
    $queue = array();
    $res = array();
    $tempArr = array();

	array_unshift($queue, $pRoot);
	$cur_num = 1;
	$next_num = 0;
	$cindex = 1;
	while(!empty($queue)){
		$node = array_pop($queue);
		$cur_num--;
		
		if($node->left != NULL){
			array_unshift($queue, $node->left);
			$next_num++;
		}
		if($node->right != NULL){
			array_unshift($queue, $node->right);
			$next_num++;
		}
		array_push($tempArr, $node->val);
		if($cur_num==0){
			$cur_num = $next_num;
			$next_num = 0;
			if($cindex%2==1){
				array_push($res, $tempArr);
				$tempArr = [];
			}else{
				array_push($res, array_reverse($tempArr));
				$tempArr = [];
			}
			$cindex++;
		}
		
	}
	return $res;
}

// 层序遍历 二叉树
function PrintTree($pRoot){
	$queue = array();

	array_unshift($queue, $pRoot);
	while(!empty($queue)){
		$node = array_pop($queue);
		if($node->left != NULL){
			array_unshift($queue, $node->left);
		}
		if($node->right != NULL){
			array_unshift($queue, $node->right);
		}
		echo $node->val," ";
	}
}

$array = [8,8,7,9,2,'#','#','#','#',4,7];
$array = [1,2,4,'#','#',5,'#','#',3,6,'#','#',7];
$pRoot = CreateTree($array);

// PrintTree($pRoot);
MyPrint($pRoot);


