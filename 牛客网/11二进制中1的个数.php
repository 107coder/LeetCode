<?php

/*输入一个整数，输出该数二进制表示中1的个数。其中负数用补码表示。*/
function NumberOf1($n)
{
    $count = 0;
    while($n != 0){
    	$count++;
    	$n = ($n-1) & $n;
    }
    return $count;
    	
}

$n = -4;
//-100    1100    0100  

echo NumberOf1($n);