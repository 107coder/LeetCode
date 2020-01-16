<?php
/*
题目描述
请实现两个函数，分别用来序列化和反序列化二叉树

二叉树的序列化是指：把一棵二叉树按照某种遍历方式的结果以某种格式保存为字符串，从而使得内存中建立起来的二叉树可以持久保存。序列化可以基于先序、中序、后序、层序的二叉树遍历方式来进行修改，序列化的结果是一个字符串，序列化时通过 某种符号表示空节点（#），以 ！ 表示一个结点值的结束（value!）。

二叉树的反序列化是指：根据某种遍历顺序得到的序列化字符串结果str，重构二叉树。
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
// 根据先序遍历的顺序 序列化二叉树
function MySerialize($pRoot)
{
    $res = '';
    $temp = '';
    SerializeCore($res,$temp,$pRoot);
    return $res.'!';
}
function SerializeCore(&$res,&$temp,$pRoot){
	if($pRoot==NULL){
    	return NULL;
    }
    $res .= $temp;
    $temp = '';
    $res .= $pRoot->val;
    if($pRoot->left != NULL){
    	SerializeCore($res,$temp,$pRoot->left);
    }else{
    	$temp .= '#';
    }
    if($pRoot->right != NULL){
    	SerializeCore($res,$temp,$pRoot->right);
    }else{
    	$temp .= '#';
    }

}
function MyDeserialize($s)
{
	$i = 0;
	$pRoot = DeserializeCore($s,$i);
	return $pRoot;
}
function DeserializeCore($s,&$i){
	if($i>=strlen($s) || $s[$i]=='!' || $s[$i]=='#'){
		return NULL;
	}
	$pRoot = new TreeNode($s[$i]);

	if($i < strlen($s)){
        $i++;
        $pRoot->left = DeserializeCore($s,$i);
    }
	if($i < strlen($s)){
        $i++;
        $pRoot->right = DeserializeCore($s,$i);
    }

	return $pRoot;
}
$array = [8,8,7,9,2,'#','#','#','#',4,7];
$array = [1,2,4,'#','#','#',3,5,'#','#',6,'#','#'];

$pRoot = CreateTree($array);
echo "原来的树：<br/>";
print_r($pRoot);
$s = MySerialize($pRoot);
echo "序列化之后的结果为：<br/>";
print_r($s);
echo "序列化之后重新生成的树：<br/>";
$res = MyDeserialize($s);
print_r($res);