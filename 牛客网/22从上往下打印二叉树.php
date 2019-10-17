<?php
/*
题目描述
从上往下打印出二叉树的每个节点，同层节点从左至右打印。

层序遍历二叉树
 */
include "CreateTree.php";
$queue = [];
$res = [];
function PrintFromTopToBottom_1($root)
{
    global $queue,$res;
    if($root == NULL)
    {
    	return NULL;
    }
	array_push($queue,$root);
	action();
	return $res;
}

function action()
{
	 global $queue,$res;
     if(!empty($queue))
    {
   		$temp = array_shift($queue);
   			
   		array_push($res,$temp->val);
    	if($temp->left != NULL)
    	array_push($queue,$temp->left);
	     if($temp->right != NULL)
    	array_push($queue,$temp->right);
    	action();
    }
    else
    {
    	return NULL;
    }
}

function PrintFromTopToBottom($root)
{
	$queue = [];
	$res = [];
    if($root == NULL)
    {
    	return $res;
    }
    array_push($queue,$root);
    while(!empty($queue))
    {
   		$temp = array_shift($queue);
   			
   		array_push($res,$temp->val);
    	if($temp->left != NULL)
    		array_push($queue,$temp->left);
	     if($temp->right != NULL)
    		array_push($queue,$temp->right);
    }
    return $res;
}

/*
使用循环实现，上面的方法不知道为啥不能通过网上的检测
 */


$array = ['8','8','7','9','2','#','#','#','#','4','7'];
$array = ['5','4','#','3','#','2','#','1'];
$root = CreateTree($array);
// print_r($root->left);
$result = PrintFromTopToBottom($root);
// $a = [1];

// queueay_push($a,NULL);
// print_r($a);
print_r($result);