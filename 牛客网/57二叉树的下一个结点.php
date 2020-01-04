<?php
/*
题目描述
给定一个二叉树和其中的一个结点，请找出中序遍历顺序的下一个结点并且返回。注意，树中的结点不仅包含左右子结点，同时包含指向父结点的指针。
*/

/*
 *  解题思路：
 *      拿到一个结点，判断是否存在右子树，如果存在右子树，中序下一个结点为右子树的左子树
 *                                  如果不存在右子树，并且该结点为做子树，中序下一个结点为其父亲结点
 *                                  如果该节点为右子树，并且无右孩子，那么其中序下一个结点为 父结点的父结点 需要先判断父亲结点有没有左子树，找到
 *                                      第一个是父结点做子树的结点
 *
 * */
class TreeLinkNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    var $next = NULL;
    function __construct($x){
        $this->val = $x;
    }
}
function GetNext($pNode)
{
    if($pNode==null){
        return null;
    }
    // write code here
    // 首先判断是否存在右子树
    if($pNode->right==null){
        // 判断该结点为左子树还是为右子树
        if($pNode->next->left == $pNode){   // 左子树
            return $pNode->next;
        }else{                              // 右子树
            while($pNode != $pNode->next->left){
                $pNode = $pNode->next;
            }
            return $pNode->next;
        }
    }else{
        // 如果 存在 右子树，找到右子树的最左子树
        $pNode = $pNode->right;
        while ($pNode->left != null){
            $pNode = $pNode->left;
        }
        return $pNode;
    }
    return null;
}

/**
 * 中序遍历这棵树
 * @param $pNode
 */
function ReadTreeZ($pNode){
    if($pNode == null){
        return null;
    }

    if($pNode->left != null){
        ReadTreeZ($pNode->left);
    }
    echo "$pNode->val ";
    if($pNode->right != null){
        ReadTreeZ($pNode->right);
    }
}
// 创建一棵树
/*          1
 *        /   \
 *       2     3
 *      /  \
 *     4    5
 *    /
 *   6
 * */
$TRoot = new TreeLinkNode(1);
$TNode_2 = new TreeLinkNode(2);
$TNode_3 = new TreeLinkNode(3);
$TNode_4 = new TreeLinkNode(4);
$TNode_5 = new TreeLinkNode(5);
$TNode_6 = new TreeLinkNode(6);

$TRoot->left = $TNode_2;
$TRoot->right = $TNode_3;

$TNode_2->left = $TNode_4;
$TNode_2->right = $TNode_5;
$TNode_2->next = $TRoot;

$TNode_3->next = $TRoot;

$TNode_4->left = $TNode_6;
$TNode_4->next = $TNode_2;

$TNode_5->next = $TNode_2;

$TNode_6->next = $TNode_4;

ReadTreeZ($TRoot);

$res = GetNext($TNode_5);
print_r($res);


//用例:
//{8,6,10,5,7,9,11},8
//
//对应输出应该为:
//
//9
//
//你的输出为:
//
//10