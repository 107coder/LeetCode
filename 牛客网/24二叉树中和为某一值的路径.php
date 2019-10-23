<?php

/*题目描述
输入一颗二叉树的根节点和一个整数，打印出二叉树中结点值的和为输入整数的所有路径。路径定义为从树的根结点开始往下一直到叶结点所经过的结点形成一条路径。(注意: 在返回值的list中，数组长度大的数组靠前)
}*/
require("CreateTree.php");

 $resArray = [];
 $tempArray = [];

/*
方法一
 */
function FindPath($root, $expectNumber)
{
	global $resArray,$tempArray;  // 设置全局的变量

    if($root == NULL)
		return $resArray;
		
	array_push($tempArray, $root->val);
	$expectNumber -= $root->val;
	if($root->left == NULL && $root->right == NULL && $expectNumber==0)
	{
		array_push($resArray, $tempArray);
		if(!empty($resArray))
		{
			for($i=0; $i<count($resArray)-1; $i++)
			{
				if(count($resArray[$i]) < count($resArray[$i+1]))
				{
					$temp = $resArray[$i];
					$resArray[$i] = $resArray[$i+1];
					$resArray[$i+1] = $temp;
				}
			}
		}
	}	

	if($root->left != NULL)
	{
		FindPath($root->left,$expectNumber);
	}
	if($root->right != NULL)
	{
		FindPath($root->right,$expectNumber);
	}
	array_pop($tempArray); // 这里不是直接给将暂时的数组给置空，因该是删除最后的元素，实现序列的回退
	// $expectNumber += $root->val;
	return $resArray;
}


/*
以下内容为方法二
 */
function find($root,&$resArray,&$tempArray)
{
	if($root == NULL)
		return $resArray;
		
	array_push($tempArray, $root->val);
	
	if($root->left == NULL && $root->right == NULL)
	{
		array_push($resArray, $tempArray);
		
		// return;
	}	

	if($root->left != NULL)
	{
		find($root->left,$resArray,$tempArray);
	}
	if($root->right != NULL)
	{
		find($root->right,$resArray,$tempArray);
	}
	array_pop($tempArray); // 这里不是直接给将暂时的数组给置空，因该是删除最后的元素，实现序列的回退
	return $resArray;
}

function test($root,$expectNumber){
	if($root==NULL) return [];
	$paths = [];
	$path = [];
	$resArray = [];
	find($root,$paths,$path);

	foreach($paths as $k=>$p)
	{
		if(array_sum($p) == $expectNumber)
		{
			array_push($resArray, $p);
		}	

	}
	return $resArray;

}
$array = [8,8,7,9,2,'#','#','#','#',4,7];
// $array = [1,4,'#','#',3,1];
// $array = [10,5,12,4,7];
$root = CreateTree($array);
print_r($root);
$expectNumber = 34;
$result = FindPath($root,$expectNumber);

$result = test($root,$expectNumber);
var_dump($result);

$t = [1,2,3,4,5];

unset($t[2]);
print_r($t);