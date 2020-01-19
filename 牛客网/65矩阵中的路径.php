<?php
/*
题目描述
请设计一个函数，用来判断在一个矩阵中是否存在一条包含某字符串所有字符的路径。路径可以从矩阵中的任意一个格子开始，每一步可以在矩阵中向左，向右，向上，向下移动一个格子。如果一条路径经过了矩阵中的某一个格子，则该路径不能再进入该格子。 例如 a b c e s f c s a d e e 矩阵中包含一条字符串"bcced"的路径，但是矩阵中不包含"abcb"路径，因为字符串的第一个字符b占据了矩阵中的第一行第二个格子之后，路径不能再次进入该格子。
*/
/*
	解题思路：
		1. 建立一个标志的列表
		2. 找到第一个 字符的位置，找不到，直接返回找不到 ，如果有多个开始的位置，那就分别开始吧
		3. 从字符开始，回溯法查找
	*/
function hasPath($matrix, $rows, $cols, $path)
{
	if(empty($matrix) || $cols<=0 || $rows<=0){
		return false;
	}
	if(strlen($path)==0){
		return false;
	}
    // write code here
	$isOK = array();
	for($i=0; $i<count($matrix); $i++){
		$isOK[$i] = 0;
	}
    for($row=0; $row<$rows; $row++){
    	for($col=0; $col<$cols; $col++){
    		if(hasPathCore($matrix,$isOK,$rows,$cols,$row,$col,$path,0))
    			return true;
    	}
    }
    return false;
}

function hasPathCore($matrix,&$isOK,$rows,$cols,$curx,$cury,$path,$index){
	if($index >= strlen($path)){
		return true;
	}
	// 如果y轴的坐标值 == 列数
	if($cury == $cols){
		$curx++;
		$cury = 0;
	}
	// 如果cury == -1  
	if($cury == -1){
		$curx--;
		$cury = $cols-1;
	}

	if($curx<0 || $curx>=$cols){
		return false;
	}
	// 首先判断这个点的值是否被访问过
	if($isOK[$curx*$cols+$cury]!=0 || $matrix[$curx*$cols+$cury] != $path[$index]){
		return false;
	}
	
	$isOK[$curx*$cols+$cury] = 1;

	$sign = hasPathCore($matrix,$isOK,$rows,$cols,$curx+1,$cury,$path,$index+1)
			|| hasPathCore($matrix,$isOK,$rows,$cols,$curx-1,$cury,$path,$index+1)
			|| hasPathCore($matrix,$isOK,$rows,$cols,$curx,$cury+1,$path,$index+1)
			|| hasPathCore($matrix,$isOK,$rows,$cols,$curx,$cury-1,$path,$index+1);
	$isOK[$curx*$cols+$cury] = 0;

	return $sign;
}

$matrix = ['a','b','c','e','s','f','c','s','a','d','e','e'];
$rows = 3;
$cols = 4;
$path = 'bcced';


$matrix = "ABCESFCSADEE";
$rows = 3;
$cols = 4;
$path = "ABCCED";
$path = "ABCB";
$res = hasPath($matrix,$rows,$cols,$path);
var_dump($res);