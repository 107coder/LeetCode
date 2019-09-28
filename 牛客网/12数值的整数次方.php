<?php
/*
给定一个double类型的浮点数base和int类型的整数exponent。求base的exponent次方。

保证base和exponent不同时为0*/

function Power($base, $exponent)
{
    $res = 1;
 	$top = $exponent>0?$exponent:(-$exponent);
    for($i=0; $i<$top; $i++)
    {
    	$res = $res * $base;
    }
    $res = $exponent>0?$res:(1/$res);
    return $res;
}

$base = 2;
$exponent = -3;

echo Power($base,$exponent);