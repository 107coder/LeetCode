<?php
/**
 * Create by PhpStorm.
 * FileName: 33二叉搜索树的后序遍历序列.php
 * User: CSF
 * Date: 2020/4/8
 * Time: 9:12
 */

class Solution_jz33
{

    /**
     * @param Integer[] $postorder
     * @return Boolean
     */
    function verifyPostorder($postorder)
    {
        return $this->verify($postorder, 0, count($postorder) - 1);
    }

    public function verify($postorder, $s, $e)
    {
        $root = $postorder[$e];
        $i = $s;
        for (; $i < $e; $i++) {
            if ($postorder[$i] > $root) {
                break;
            }
        }

        $j = $i;
        for (; $j < $e; $j++) {
            if ($postorder[$j] < $root) {
                return false;
            }
        }

        $left = true;
        if ($i > $s) {
            $left = $this->verify($postorder, $s, $i - 1);
        }

        $right = true;
        if ($j > $i) {
            $right = $this->verify($postorder, $i, $j-1);
        }
        return $left && $right;
    }
}

include "../Common/CreateTree.php";
$obj = new Solution_jz33();

$arr = [5, 2, 1, '#', '#', 3, '#', '#', 6];

$postorder = [1, 3, 2, 6, 5];
// [1, 3, 2, 6, 5]  倒序
// [1, 2, 3, 5, 6]  中序
$postorder = [1, 6, 3, 2, 5];
$res = $obj->verifyPostorder($postorder);

var_dump($res);