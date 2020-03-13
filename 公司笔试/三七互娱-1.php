<?php
/**
 * Create by PhpStorm.
 * FileName: 三七互娱-1.php
 * User: CSF
 * Date: 2020/3/13
 * Time: 14:53
 */

/**
 * 题目描述：
 * str = 'abcabcbb' 3
 * 判断字符串中有个多少个连续不重复的字符，
 *
 */

/**
 * @param $str
 * @return int
 */
function checkStr($str)
{
    if ($str == '') return 0;
    $tmp = [];
    $slen = strlen($str);
    for ($i = 0;$i<$slen;$i++){
        if(!isset($tmp[$str[$i]])){
            $tmp[$str[$i]] = 1;
        }else{
            return count($tmp);
        }
    }
    return count($tmp);
}

$str = 'abcabcbb';

$res = checkStr($str);

print_r($res);