<?php
/*
输入一个矩阵，按照从外向里以顺时针的顺序依次打印出每一个数字，例如，如果输入如下4 X 4矩阵： 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 则依次打印出数字1,2,3,4,8,12,16,15,14,13,9,5,6,7,11,10.
*/
function printMatrix($matrix)
{
    $result = array();
    $row = sizeof($matrix);
    $col = sizeof($matrix[0]);

    if($row == 0 || $col == 0)
    {
    	return NULL;
    }

    $top = 0;$bottom = $row-1;
    $left = 0; $right = $col-1;

    while($left <= $right && $bottom >= $top)
    {
    	//从左向右打印
    	for($i=$left; $i<=$right; $i++)
    	{
    		array_push($result, $matrix[$top][$i]);
    	}
    	// 从上向下打印
    	for($i=$top+1; $i<=$bottom; $i++)
    	{
    		array_push($result, $matrix[$i][$right]);
    	}
    	// 从右向左打印
    	if($top != $bottom)// 判断当该行没有被打印过的时候才打印该行数据
    	{
    		for($i=$right-1; $i>=$left; $i--)
    		{
    			array_push($result, $matrix[$bottom][$i]);
    		}
    	}
    	// 从下往上打印
    	if($left != $right) // 判断当前列没有被打印的时候打印该列
    	{
    		for($i=$bottom-1; $i>$top; $i--)
    		{
    			array_push($result, $matrix[$i][$left]);
    		}
    	}

    	$top++;$bottom--;$left++;$right--;

    }
    // return implode(',',$result);
    return $result;
}

$matrix = [[1,2,3,4],
		   [5,6,7,8],
		   [9,10,11,12],
		   [13,14,15,16]];

// $matrix = [[1]];
// print_r($matrix);

/*
 (0,0) (0,1) (0,2) (0,3) | (1,3) (2,3) (3,3) | (3,2) (3,1) | (3,0) (2,0) | (1,0) (1,1) (1,2)  (2,2) (2,1)  

 */

$result = printMatrix($matrix);

print_r($result);