<?php
/*
题目描述
输入一棵二叉搜索树，将该二叉搜索树转换成一个排序的双向链表。要求不能创建任何新的结点，只能调整树中结点指针的指向。
 */

require('./CreateTree.php');
function Convert($pRootOfTree)
{
	// global $result;
    if($pRootOfTree == NULL)
    {
    	return NULL;
    }

    if($pRootOfTree->left==NULL && $pRootOfTree->right==NULL)
    {
    	return $pRootOfTree;
    }
   //将左子树变化
   	$left = Convert($pRootOfTree->left);

   	// 找到左子树的最后的结尾
   	$leftEnd = $left;
   	while($leftEnd != NULL && $leftEnd->right!=NULL){
   		$leftEnd = $leftEnd->right;
   	}
   	if($left != NULL)
   	{
   		$leftEnd->right = $pRootOfTree;
   		$pRootOfTree->left = $leftEnd;
   	}


   	// 右子树上的变化
   	$right = Convert($pRootOfTree->right);

   	if($right!=NULL)
   	{
   		$pRootOfTree->right = $right;
   		$right->left = $pRootOfTree;
   	}

   	return $left!=NULL?$left:$pRootOfTree;

}


// 首先自己实现一下后续遍历二叉树的结果
$result = [];
$minNode; 
function PrintRev($pRootOfTree)
{
	if($pRootOfTree == NULL){
		return NULL;
	}
	global $result;
	if($pRootOfTree->left != NULL)
	{
		PrintRev($pRootOfTree->left);
	}

	array_push($result,$pRootOfTree);


	if($pRootOfTree->right != NULL)
	{
		PrintRev($pRootOfTree->right);
	}

}

function PrintRev_xunhuan($pRootOfTree)
{
	if($pRootOfTree == NULL){
		return NULL;
	}
	global $result,$minNode;
	array_push($result,$pRootOfTree);

	while($pRootOfTree!=NULL){
		
		array_push($result,$pRootOfTree);
	}

}
$array = [4,2,1,'#','#',3,'#','#',6,5,'#','#',7];

$pRootOfTree = CreateTree($array);

$r = Convert($pRootOfTree);

// print_r($result);

print_r($r);