<?php

// 输入两棵二叉树A，B，判断B是不是A的子结构。（ps：我们约定空树不是任意一个树的子结构）

/*class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}
*/


include('./CreateTree.php');


function HasSubtree($pRoot1, $pRoot2)
{
	$result = false;
	// 如果两个根节点为空直接返回false
    if($pRoot2 == NULL || $pRoot1 == NULL)
    {
    	return false;
    }

    if($pRoot1->val == $pRoot2->val)
    {
    	$result = CheckNode($pRoot1,$pRoot2);
    }
    // 递归判断左子树和root2
    if(!$result)
    {
    	$result = HasSubtree($pRoot1->left,$pRoot2);
    }

    // 递归判断右子树和root2
    if(!$result)
    {
    	$result = HasSubtree($pRoot1->right,$pRoot2);
    }

    return $result;
}


function CheckNode($pRoot1,$pRoot2)
{
    // 如果 tree2 遍历完了，返回true
    if($pRoot2 == NULL)
    {
        return true;
    }

	// 如果 tree1 遍历完了，返回false
	if($pRoot1 == NULL)
	{
		return false;
	}

	// 如果两个节点元素不相同返回false
	if($pRoot1->val != $pRoot2->val)
	{
		return false;
	}

	return CheckNode($pRoot1->left,$pRoot2->left) && CheckNode($pRoot1->right,$pRoot2->right);
}
$pRoot1 = new TreeNode(8);
$TreeNode1_2 = new TreeNode(8);
$TreeNode1_3 = new TreeNode(7);
$TreeNode1_4 = new TreeNode(9);
$TreeNode1_5 = new TreeNode(2);
$TreeNode1_6 = new TreeNode(4);
$TreeNode1_7 = new TreeNode(7);

$pRoot1->left = $TreeNode1_2;
$pRoot1->right = $TreeNode1_3;

$TreeNode1_2->left = $TreeNode1_4;
$TreeNode1_2->right = $TreeNode1_5;

$TreeNode1_5->left = $TreeNode1_6;
$TreeNode1_5->right = $TreeNode1_7;


$pRoot2 = new TreeNode(8);
$TreeNode2_2 = new TreeNode(9);
$TreeNode2_3 = new TreeNode(2);
// $TreeNode2_4 = new TreeNode(4);
// $TreeNode2_5 = new TreeNode(5);
// $TreeNode2_6 = new TreeNode(6);

$pRoot2->left = $TreeNode2_2;
$pRoot1->right = $TreeNode1_3;

// $TreeNode1_2->left = $TreeNode1_4;
// $TreeNode1_2->right = $TreeNode1_5;

// $TreeNode1_5->right = $TreeNode1_6;
// print_r($pRoot2);

// $pRoot2 = NULL;

/*
$arr1 = [8,8,7,9,2,'#','#','#','#',4,7];
$result = new CreateTree($arr1);
$pRoot1 = $result->getTree();

$arr2 = [8,9,2];
$result = new CreateTree($arr2);
$pRoot2 = $result->getTree();*/

$result = HasSubtree($pRoot1, $pRoot2);


// {8,8,7,9,2,#,#,#,#,4,7},{8,9,2}
//                 8
//                /  
//               8    
//              /  \  
//             7    4 
//            / \  /
//           9    7
//          / \
//         2
//         
//         8 
//        / 
//       9
//      /
//     2
// print_r($pRoot2);

/*TreeNode Object
(
    [val] => 8
    [left] => TreeNode Object
        (
            [val] => 8
            [left] => TreeNode Object
                (
                    [val] => 7
                    [left] => TreeNode Object
                        (
                            [val] => 9
                            [left] => TreeNode Object
                                (
                                    [val] => 2
                                    [left] =>
                                    [right] =>
                                )

                            [right] =>
                        )

                    [right] =>
                )

            [right] => TreeNode Object
                (
                    [val] => 4
                    [left] => TreeNode Object
                        (
                            [val] => 7
                            [left] =>
                            [right] =>
                        )

                    [right] =>
                )

        )

    [right] =>
)*/

var_dump($result);