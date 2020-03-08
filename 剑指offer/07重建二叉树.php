<?php
/**
 * Create by PhpStorm.
 * FileName: 07重建二叉树.php
 * User: CSF
 * Date: 2020/3/7
 * Time: 8:42
 */

include_once '../Common/CreateTree.php';


/**
 * @param Integer[] $preorder
 * @param Integer[] $inorder
 * @return TreeNode
 */
function buildTree($preorder, $inorder)
{
    /**
     * 首先分析不同顺序的遍历的特点
     * 前序遍历，第一个元素肯定是根结点
     * 中序遍历，根据前序遍历中的根结点的元素分开，左边是左子树，右边是右子树
     */
    if (empty($preorder) || empty($inorder) || (count($preorder) != count($inorder))) {
        return NULL;
    }
    return buildTreeCore($preorder, 0, count($preorder) - 1, $inorder, 0, count($inorder) - 1);
}

/**
 * @param $preorder
 * @param $preLeft
 * @param $preRight
 * @param $inorder
 * @param $inLeft
 * @param $inRight
 * @return TreeNode
 */
function buildTreeCore($preorder, $preLeft, $preRight, $inorder, $inLeft, $inRight)
{

    if ($preLeft > $preRight || $inLeft > $inRight) {
        return NULL;
    }
    // 建立第一个节点
    $root = new TreeNode($preorder[$preLeft]);


    $rootIndex = findRoot($inorder, $preorder[$preLeft]);

    $leftLen = $rootIndex - $inLeft;
    $root->left = buildTreeCore($preorder, $preLeft + 1, $preLeft + $leftLen, $inorder, $inLeft, $rootIndex - 1);
    $root->right = buildTreeCore($preorder, $preLeft + $leftLen + 1, $preRight, $inorder, $rootIndex + 1, $inRight);
    return $root;
}

/**
 *  从中序遍历中找根结点位置
 * @param $inorder
 * @param $root
 * @return int|string
 */
function findRoot($inorder, $root)
{
    foreach ($inorder as $key => $item) {
        if ($root == $item) {
            return $key;
        }
    }
    return -1;
}

// 前序遍历
$preorder = [3, 9, 20, 15, 7];
$preorder = [1,2];
// 中序遍历
$inorder = [9, 3, 15, 20, 7];
$inorder = [2,1];
$res = buildTree($preorder, $inorder);
print_r($res);
