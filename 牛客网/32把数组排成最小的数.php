<?php
/*
题目描述
输入一个正整数数组，把数组里所有数字拼接起来排成一个数，打印能拼接出的所有数字中最小的一个。例如输入数组{3，32，321}，则打印出这三个数字能排成的最小数字为321323。
*/
function PrintMinNumber($numbers)
{
    // write code here
    if($numbers == NULL || empty($numbers))
    {
    	return 0;
    }

    $len = strlen(max($numbers));
    // echo $len;
    var_dump(strchr($numbers[1]));

}

$numbers = [3,32,321];

PrintMinNumber($numbers);