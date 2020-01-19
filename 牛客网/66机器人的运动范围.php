<?php
/*
题目描述
地上有一个m行和n列的方格。一个机器人从坐标0,0的格子开始移动，每一次只能向左，右，上，下四个方向移动一格，但是不能进入行坐标和列坐标的数位之和大于k的格子。 例如，当k为18时，机器人能够进入方格（35,37），因为3+5+3+7 = 18。但是，它不能进入方格（35,38），因为3+5+3+8 = 19。请问该机器人能够达到多少个格子？
*/
/**
* $threshold 阈值
* $rows 行数
* $cols 列数
*/
function movingCount($threshold, $rows, $cols)
{
    // write code here
    if($threshold<0 || $rows<=0 || $cols<=0){
    	return 0;
    }
    $flag = [[]];
    for($i=0; $i<$rows; $i++){
    	for($j=0; $j<$cols; $j++){
    		$flag[$i][$j] = 0;
    	}
    }
	return movingCountCore($threshold, $rows, $cols, 0, 0, $flag);
    
}

function movingCountCore($threshold, $rows, $cols, $curx, $cury, &$flag){

	if($curx<0 || $curx>=$rows || $cury<0 || $cury>=$cols || addTwoNumber($curx,$cury) > $threshold || $flag[$curx][$cury]!=0){
		return 0;
	}
	
	$flag[$curx][$cury] = 1;

	return movingCountCore($threshold, $rows, $cols, $curx+1, $cury, $flag)
			+ movingCountCore($threshold, $rows, $cols, $curx-1, $cury, $flag)
			+ movingCountCore($threshold, $rows, $cols, $curx, $cury+1, $flag)
			+ movingCountCore($threshold, $rows, $cols, $curx, $cury-1, $flag)
			+ 1;
}

function addTwoNumber($num1,$num2){
	$res = 0;
	while($num1!=0){
		$res += $num1%10;
		$num1 = $num1/10;
	}
	while($num2!=0){
		$res += $num2%10;
		$num2 = $num2/10;
	}
	return $res;
} 


$threshold = 38;
$rows = 50;
$cols = 50;
$res = movingCount($threshold,$rows,$cols);

print_r($res);