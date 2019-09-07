<?php

//function_1
function replaceSpace($str)
{
    return str_replace(' ', '%20', $str);
}

/*
 *	function_2
 *
 *  字符串匹配方法最优解，时间复杂度O(n)
 *  1.求出字符串长度，求出空格个数，计算出替换之后的新字符串的长度
 *  2.设置两个指针进行移动，复制和替换值
 */
function replaceSpace_2($str)
{
	// 求字符串的长度
	$str_len = strlen($str);

	if($str_len <= 0) return;

	$i = 0;
	$spaceOfNumber = 0;
	while($i < $str_len)
	{
		if($str[$i] == ' ') 
		{
			$spaceOfNumber++;
		}
		$i++;
	}

	$str_len_new = $str_len + 2*$spaceOfNumber;

	$index_old = $str_len-1;
	$index_new = $str_len_new-1;

	while ($index_old >= 0 && $index_new > $index_old) {
		if($str[$index_old] == ' ')
		{
			// $spaceOfNumber--;
			$str[$index_new--] = '0';
			$str[$index_new--] = '2';
			$str[$index_new--] = '%';
		}else {
			$str[$index_new--] = $str[$index_old];
		}
		$index_old--;
	}

	return $str;
}

$str = 'We Are Happy';
$str = 'hello ';

echo replaceSpace_2($str);