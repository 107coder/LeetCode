<?php

/*题目描述
输入一颗二叉树的根节点和一个整数，打印出二叉树中结点值的和为输入整数的所有路径。路径定义为从树的根结点开始往下一直到叶结点所经过的结点形成一条路径。(注意: 在返回值的list中，数组长度大的数组靠前)
}*/
require("CreateTree.php");
function FindPath($root, $expectNumber)
{
     $resArray = [];
     $tempArray = [];
     find($root,$resArray,$tempArray);

     print_r($resArray);
}

function find($root,&$resArray,&$tempArray)
{
	if($root != NULL)
		array_push($tempArray, $root->val);
	
	if($root->left == NULL && $root->right == NULL)
	{
		array_push($resArray, $tempArray);
		// $tempArray = [];
		return;
	}	

	if($root->left != NULL)
	{
		find($root->left,$resArray,$tempArray);
	}
	if($root->right != NULL)
	{
		find($root->right,$resArray,$tempArray);
	}
}

$array = [8,8,7,9,2,'#','#','#','#',4,7];
$array = [1,2,'#','#',3];
$root = CreateTree($array);
print_r($root);
$expectNumber = 5;
FindPath($root,$expectNumber);
