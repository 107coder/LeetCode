<?php

/*
 * 题目描述
   给定一棵二叉搜索树，请找出其中的第k小的结点。例如， （5，3，7，2，4，6，8）    中，按结点数值大小顺序第三小结点的值为4。
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
// 二叉排序树进行 先序遍历就可以得到一个从小到大的序列，就求第k 个数
function KthNode($pRoot, $k)
{
    // write code here
    if($pRoot == NULL){
        return "";
    }
    if($k<0){
        return NULL;
    }
    $stack = array();
    $index = 0;
    while($pRoot != NULL || !empty($stack)){
        if($pRoot != NULL){
            array_push($stack,$pRoot);
            $pRoot = $pRoot->left;
        }else{
            $node = array_pop($stack);
            $index++;
            if($index >= $k) return $node->val;
            $pRoot = $node->right;
        }
    }
    return NULL;
}

// 使用循环结构 中序遍历二叉树  需要借助栈的结构

function findTree($pRoot){
    if($pRoot == NULL){
        return "";
    }
    $stack = array();
    while($pRoot != NULL || !empty($stack)){
        if($pRoot != NULL){
            array_push($stack,$pRoot);
            $pRoot = $pRoot->left;
        }else{
            $node = array_pop($stack);
            echo $node->val." ";
            $pRoot = $node->right;

        }
    }
}

$array = [4,2,1,'#','#',3,'#','#',6,5,'#','#',7];
$pRoot = CreateTree($array);

$res = KthNode($pRoot,1);

print_r($res);