<?php

/*
题目描述
输入一个整数数组，判断该数组是不是某二叉搜索树的后序遍历的结果。如果是则输出Yes,否则输出No。假设输入的数组的任意两个数字都互不相同。

二叉搜索树：左子树上的元素小于右子树上的元素
思路：后序遍历的时候结果是根节点在最后
    可以通过左子树上的元素和右子树上的元素分别与最后的根节点元素进行比较
 */
function VerifySquenceOfBST($sequence)
{
    if(!empty($sequence))
    {
        return judge($sequence,0,count($sequence)-1);
    }
    return false;
}

//使用引用传递，传入数组，左边界的值，右边界点得值（右边界的值就为根节点）
function judge(&$sequence,$l,$r)
{
    if($l >= $r)     // 如果左边界大于等于右边界，直接返回true,程序递归的边界 
        return true;
    $i = $r; //
    while($i>$l && $sequence[$i-1] > $sequence[$r])   //为了找到右子树的边界
    {       
        --$i;
    }

    //  循环遍历是否左子树的每个元素都小于最右边的根节点元素
    for($j=$i-1; $j>=$l;$j--)
    {
        if($sequence[$j] > $sequence[$r])
            return false;
    }
    // 递归判断左子树和右子树上的元素是否符合规范
    return judge($sequence,$l,$i-1) && judge($sequence,$i,$r-1);

}



$sequence = [7,4,6,5];
$sequence = [4,8,6,12,16,14,10];
// 				6
// 			  /  \
// 			 4    7
// 			  \
// 			   5
// 			
// 			   10
//           / 	  \
// 			6	   14
// 		  /   \   /   \
// 		 4     8 12   16
$result = VerifySquenceOfBST($sequence);

var_dump($result);