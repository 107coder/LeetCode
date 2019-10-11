<?php

// 这个文件中方法可以直接传入数组返回一个树

class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}



class CreateTree
{
	private $nodeArray = NULL;
	private $result = NULL;
	// 根据先序遍历结果创建二叉树

	function __construct($array = NULL)
	{
		$this->nodeArray = $array;
		// 传入的数组为空或者是不传入数组是直接返回NULL
		if(empty($this->nodeArray))
		{
			return NULL;
		}
		
		$Root = $this->CreateNode($this->nodeArray);
		// 返回根节点
		
		// print_r($Root);
		$this->result = $Root;
	}

	function GetTree()
	{
		return $this->result;
	}



	function CreateNode($array)
	{
		if(empty($this->nodeArray))
		{
			return NULL;
		}
		if($this->nodeArray[0] != '#')
		{
			$Root = new TreeNode($this->nodeArray[0]);
		}
		else 
		{
			return NULL;
		}
		

		array_shift($this->nodeArray);
		$Root->left = $this->CreateNode($this->nodeArray);
		
		array_shift($this->nodeArray);
		$Root->right = $this->CreateNode($this->nodeArray);

		return $Root;
	}
}

// $array = [1,'#',2,3];

// $array = [8,8,7,9,2,'#','#','#','#',4,7];
// print_r($array);
// array_shift($array);
// print_r($array);

// $result = new CreateTree($array);

// print_r($result->GetTree());

