<?php 

require 'CreateTree.php';


function sequenceTraversal($pRoot){
	if($pRoot == NULL){
		return NULL;
	}
	// 创建一个队列
	$queue = [];
	// 首先先把根节点放入队列
	array_unshift($queue, $pRoot);
	// 队列不为空是循环
	while(!empty($queue)){
		$node = array_pop($queue);
		echo $node->val,' ';
		if($node->left != NULL){
			array_unshift($queue, $node->left);
		}
		if($node->right != NULL){
			array_unshift($queue, $node->right);
		}
	}
}


$array = [8,8,7,9,2,'#','#','#','#',4,7];
$pRoot =CreateTree($array);

sequenceTraversal($pRoot);

// print_r($pRoot);

