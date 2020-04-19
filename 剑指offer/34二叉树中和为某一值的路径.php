<?php
/**
 * Create by PhpStorm.
 * FileName: 34二叉树中和为某一值的路径.php
 * User: CSF
 * Date: 2020/4/14
 * Time: 16:34
 */

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution_jz34
{

    /**
     * @param TreeNode $root
     * @param Integer $sum
     * @return Integer[][]
     */
    function pathSum($root, $sum)
    {
        $result = [];
        if ($root == NULL) return $result;
        $tmp = [];


//        $this->pathSumCore($root, $sum, $tmp, $result);

        $result = $this->pathSumCore2($root,$sum);

        return $result;

    }

    /**
     * 使用循环实现
     * @param $root
     * @param $sum
     * @return array
     */
    private function pathSumCore2($root, $sum)
    {
        $result = [];
        $tmp = [];
        $stack = [];

        $stack[] = $root;
        while($stack){
            $len = count($stack);
            $node = $stack[$len-1];
            $tmp[] = $node->val;
            if($node->left){
                $stack[] = $node->left;
            }elseif($node->right){
                $stack[] = $node->right;
            }else{
                array_pop($stack);
                array_pop($tmp);
                $node = $stack[count($stack)-1];
                if($node->right)
                    $stack[] = $node->right;
            }
            print_r($tmp);
            echo '<br/>';
        }
        return $result;
    }

    /**
     * 使用递归实现
     * @param $root
     * @param $sum
     * @param $tmp
     * @param $result
     */
    private function pathSumCore($root, $sum, &$tmp, &$result)
    {

        if ($root) {
            $tmp[] = $root->val;
        }
        if (!$root->left && !$root->right) {
            if (array_sum($tmp) == $sum) {
                $result[] = $tmp;
            }
        }
        if ($root->left) {
            $this->pathSumCore($root->left, $sum, $tmp, $result);
            array_pop($tmp);
        }
        if ($root->right) {
            $this->pathSumCore($root->right, $sum, $tmp, $result);
            array_pop($tmp);
        }
    }
}

$obj = new Solution_jz34();

include "../Common/CreateTree.php";

$arr = [5, 4, 11, 7, '#', '#', 2, '#', '#', '#', 8, 13, '#', '#', 4, 5, '#', '#', 1];

$root = CreateTree($arr);

//print_r($root);
$sum = 26;
$result = $obj->pathSum($root, $sum);

print_r($result);