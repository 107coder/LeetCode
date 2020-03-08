<?php

class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}

/*
 * function_1:将每个数组都求出来他的左子树和右子树的前序和中序遍历的结果，在前序的第一个元素为根节点
 * 
 */
$count = 1;
function reConstructBinaryTree_1($pre, $vin)
{

	if(!empty($pre)) {
        //求得构建二叉树所用的根节点
        $rootVal = $pre[0];
        //创建根节点
        $root = new TreeNode($rootVal);

        foreach ($vin as $key => $value) {
        	if($rootVal == $value) break;
        }
        $rootIndex = $key;

        //前序左子树 和 中序左子树
        $leftChildPre = [];
        $leftChildVin = [];

        // 前序右子树 和 中序右子树
        $rightChildPre = [];
        $rightChildVin = [];

        foreach ($pre as $key => $value) {
        	//去掉第一个元素
        	if($key == 0) continue;
    		if($key <= $rootIndex)
    		{
    			array_push($leftChildPre,$value);
    		}
    		else
    		{
    			array_push($rightChildPre,$value);
    		}
        }
        foreach ($vin as $key => $value) {
        	if($key < $rootIndex)
        	{
        		array_push($leftChildVin,$value);
        	}
        	else if($key > $rootIndex)
        	{
        		array_push($rightChildVin,$value);
        	}
        }

        if($GLOBALS['count'] <= 8)
        {
    	    $root->left = reConstructBinaryTree_1($leftChildPre,$leftChildVin);
    	    $root->right = reConstructBinaryTree_1($rightChildPre,$rightChildVin);
        }
        
        return $root;
	}
}

/*
 * function_2：还是传同一个数组直接通过键值的偏移确定树的左子树和右子树的前序遍历和中序遍历 
 */
function reConstructBinaryTree($pre,$vin)
{
	$root = createTree($pre,0,count($pre)-1,$vin,0,count($vin)-1);
	return $root;
}

function createTree($pre,$preStart,$preEnd,$vin,$vinStart,$vinEnd)
{
	if($preStart > $preEnd || $vinStart > $vinEnd)
	{
		return NULL;
	}
	if(!empty($pre))
	{
		$root = new TreeNode($pre[$preStart]);
	}

	for($i=$vinStart; $i <= $vinEnd; $i++)
	{
		if($vin[$i] == $pre[$preStart])
		{
			$root->left = createTree($pre, $preStart+1, $preStart+$i-$vinStart, $vin, $vinStart, $i-1 );
			//						前序序列，前序开始位置+1，前序开始位置+i-中序开始位置，中序遍历序列，中序遍历起始位置，i-1
			$root->right = createTree($pre, $i-$vinStart+$preStart+1, $preEnd, $vin, $i+1, $vinEnd);
			//                      前序序列，i-中序结束位置+前序开始位置+1，前序结束位置，中序序列，i-1，中序结束位置
			break;
		}
	}

	return $root;

}

$pre = [1,2,4,7,3,5,6,8];
$vin = [4,7,2,1,5,3,8,6];

$result = reConstructBinaryTree($pre,$vin);

echo "<pre>";
print_r($result);   
echo "</pre>";



/*
 * 总结：方法二不是太理解为什么那么取值，自己想不出来，但是，使用方法二还没有我使用方法一的运行时间快和占用内存少
 */
/*
public class Solution {
    public TreeNode reConstructBinaryTree(int [] pre,int [] in) {
        TreeNode root=reConstructBinaryTree(pre,0,pre.length-1,in,0,in.length-1);
        return root;
    }
    //前序遍历{1,2,4,7,3,5,6,8}和中序遍历序列{4,7,2,1,5,3,8,6}
    private TreeNode reConstructBinaryTree(int [] pre,int startPre,int endPre,int [] in,int startIn,int endIn) {
         
        if(startPre>endPre||startIn>endIn)
            return null;
        TreeNode root=new TreeNode(pre[startPre]);
         
        for(int i=startIn;i<=endIn;i++)
            if(in[i]==pre[startPre]){
                root.left=reConstructBinaryTree(pre,startPre+1,startPre+i-startIn,in,startIn,i-1);
                root.right=reConstructBinaryTree(pre,i-startIn+startPre+1,endPre,in,i+1,endIn);
                      break;
            }
                 
        return root;
    }
}*/