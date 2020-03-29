<?php
/**
 * Create by PhpStorm.
 * FileName: 28对称的二叉树.php
 * User: CSF
 * Date: 2020/3/29
 * Time: 14:15
 */

include '../Common/CreateTree.php';

class Solution_jz28
{

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root)
    {
        if ($root == NULL) return true;
        return $this->isEqualTree($root, $root);
    }

    function isEqualTree($A, $B)
    {
        if ($A == NULL && $B == NULL) {
            return true;
        } elseif (($A != NULL && $B != NULL) && $A->val == $B->val) {
            return $this->isEqualTree($A->left, $B->right) && $this->isEqualTree($A->right, $B->left);
        } else {
            return false;
        }
    }
}

$obj = new Solution_jz28();

$arr = [1, 2, 3, '#', '#', 4, '#', '#', 2, 4, '#', '#', 3];
$arr = [1, 2, '#', 3, '#', '#', 2, 3];

$root = CreateTree($arr);

$res = $obj->isSymmetric($root);

var_dump($res);
