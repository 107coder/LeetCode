<?php
/*
题目描述
从上到下按层打印二叉树，同一层结点从左至右输出。每一层输出一行。
 */
/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}*/
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

			array_push($res, $tempArr);
			$tempArr = [];
		}
		
	}
	return $res;
}