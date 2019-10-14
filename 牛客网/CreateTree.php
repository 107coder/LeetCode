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


function CreateTree(&$array)
{
	if($array[0] == '#' || empty($array))
	{
		return NULL;
	}

	$root = new TreeNode($array[0]);

	array_shift($array);
	$root->left = CreateTree($array);
	array_shift($array);
	$root->right = CreateTree($array);

	return $root;
}   

// $array = [8,8,7,9,2,'#','#','#','#',4,7];
// print_r(test($array));
