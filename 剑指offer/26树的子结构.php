<?php
/**
 * Create by PhpStorm.
 * FileName: 26树的子结构.php
 * User: CSF
 * Date: 2020/3/29
 * Time: 11:21
 */


include "../Common/CreateTree.php";

class Solution_jz26
{

    /**
     * @param TreeNode $A
     * @param TreeNode $B
     * @return Boolean
     */
    function isSubStructure($A, $B)
    {
        if ($B == NULL) return false;

        $stack = [];
        $stack[] = $A;
        $res = false;
//        return $res || $this->isEqualTree($A->left, $B);
        while (!empty($stack)) {
            $node = array_pop($stack);
            $res = $res || $this->isEqualTree($node, $B);
            if ($node->right != NULL)
                $stack[] = $node->right;
            if ($node->left != NULL)
                $stack[] = $node->left;
        }
        return $res;
    }

    function isEqualTree($A, $B)
    {

        if ($A != NULL && $B != NULL) {
            if ($A->val == $B->val) {
                return $this->isEqualTree($A->left, $B->left) && $this->isEqualTree($A->right, $B->right);
            } else {
                return false;
            }
        } elseif ($B == NULL) {
            return true;
        } else {
            return false;
        }

    }
}

$obj = new Solution_jz26();

$a = [3, 4, 1, '#', '#', 2, '#', '#', 5];
$b = [4, 1];
$c = [4, 1, 2];
$A = CreateTree($a);
$B = CreateTree($b);
$C = CreateTree($c);
$res = $obj->isSubStructure($A, $B);
var_dump($res);

//var_dump($obj->isEqualTree($B, $C));