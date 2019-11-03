<?php
/*
题目描述
输入一个字符串,按字典序打印出该字符串中字符的所有排列。例如输入字符串abc,则打印出由字符a,b,c所能排列出来的所有字符串abc,acb,bac,bca,cab和cba。
输入描述:
输入一个字符串,长度不超过9(可能有字符重复),字符只包括大小写字母。
*/
/**
     * 1、递归算法
     *
     * 解析：http://www.cnblogs.com/cxjchen/p/3932949.html  (感谢该文作者！)
     *
     * 对于无重复值的情况
     *
     * 固定第一个字符，递归取得首位后面的各种字符串组合；
     * 再把第一个字符与后面每一个字符交换，并同样递归获得首位后面的字符串组合； *递归的出口，就是只剩一个字符的时候，递归的循环过程，就是从每个子串的第二个字符开始依次与第一个字符交换，然后继续处理子串。
     *
     * 假如有重复值呢？
     * *由于全排列就是从第一个数字起，每个数分别与它后面的数字交换，我们先尝试加个这样的判断——如果一个数与后面的数字相同那么这两个数就不交换了。
     * 例如abb，第一个数与后面两个数交换得bab，bba。然后abb中第二个数和第三个数相同，就不用交换了。
     * 但是对bab，第二个数和第三个数不 同，则需要交换，得到bba。
     * 由于这里的bba和开始第一个数与第三个数交换的结果相同了，因此这个方法不行。
     *
     * 换种思维，对abb，第一个数a与第二个数b交换得到bab，然后考虑第一个数与第三个数交换，此时由于第三个数等于第二个数，
     * 所以第一个数就不再用与第三个数交换了。再考虑bab，它的第二个数与第三个数交换可以解决bba。此时全排列生成完毕！
     *
     *
     * @param str
     * @return
     */
$return_arr = [];
function Permutation($str)
{
    // write code here
    global $return_arr;
    if($str == '')
    {
    	return [];
    }
    $start = 0;
    $end = strlen($str)-1;
	action($str,$start,$end);
	return $return_arr;
	return array_values(array_unique($return_arr));
}


function action(&$str,$start,$end){
	global $return_arr;
	if($start >= $end)
	{

		if(strlen($str) == $end+1)
			array_push($return_arr, $str);
	}
	else 
	{		
		$arraySet = array();
		for ($pch=$start; $pch<strlen($str); $pch++) {
			if($pch==$start || !in_array($str[$pch],$arraySet))
			{
				array_push($arraySet, $str[$pch]);
				$temp = $str[$pch];
				$str[$pch] = $str[$start];
				$str[$start] = $temp;
					
				action($str,$start+1,$end);

				$temp = $str[$pch];
				$str[$pch] = $str[$start];
				$str[$start] = $temp;
			} 
			
		}
	}

}

// 别人的代码 
function Permutation2($str)
{
    // write code here
    if(strlen($str)==0) return [];
    $arr = str_split($str);
    sort($arr);
    $res = [];
    recursion($arr,$res,'');
    return $res;
}
 
function recursion($arr, &$res, $str) {
    $len = count($arr);
    if ($len == 1) {
        $res[] = $str . $arr[0];
        return;
    }
 
    for ($i = 0; $i < $len; $i++) {
        if ($i != 0 && $arr[0] == $arr[$i]) {
            continue;
        }
 
        list($arr[$i], $arr[0]) = [$arr[0], $arr[$i]];
        recursion(array_slice($arr, 1), $res, $str . $arr[0]);
    }
 
}

$str = 'aa';

$result = Permutation2($str);

print_r($result);
// print_r($return_arr);