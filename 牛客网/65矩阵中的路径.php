<?php
/*
题目描述
请设计一个函数，用来判断在一个矩阵中是否存在一条包含某字符串所有字符的路径。路径可以从矩阵中的任意一个格子开始，每一步可以在矩阵中向左，向右，向上，向下移动一个格子。如果一条路径经过了矩阵中的某一个格子，则该路径不能再进入该格子。 例如 a b c e s f c s a d e e 矩阵中包含一条字符串"bcced"的路径，但是矩阵中不包含"abcb"路径，因为字符串的第一个字符b占据了矩阵中的第一行第二个格子之后，路径不能再次进入该格子。
*/
/*
	解题思路：
		1. 建立二维数组，同时建立一个位置表，标识路径是否被访问过
		2. 找到第一个 字符的位置，找不到，直接返回找不到 ，如果有多个开始的位置，那就分别开始吧
		3. 从字符开始，回溯法查找
	*/
function hasPath($matrix, $rows, $cols, $path)
{
	if(empty($matrix) || count($matrix)!=$rows*$cols){
		return false;
	}
    // write code here
    $arr_arr = [[]];
    $arr_arr2 = [[]];
    for($row=0; $row<$rows; $row++){
    	for($col=0; $col<$cols; $col++){
    		$index = $row*$rows+$col;
    		$arr_arr[$row][$col] = $matrix[$index];	
			$arr_arr2[$row][$col] = 0;
    	}
    }
    print_r($arr_arr);
}

$matrix = ['a','b','c','e','s','f','c','s','a','d','e','e'];
$rows = 3;
$cols = 4;
$path = 'bcced';

$res = hasPath($matrix,$rows,$cols,$path);
var_dump($res);