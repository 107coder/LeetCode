<?php

/*
 * 实现 strStr() 函数。

给定一个 haystack 字符串和一个 needle 字符串，在 haystack 字符串中找出 needle 字符串出现的第一个位置 (从0开始)。如果不存在，则返回  -1。

 * */
class Solution {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        if(($haystack=="" && $needle!="")){
            echo "a";
            return -1;
        }else if($needle=="" || $haystack == $needle){
            return 0;
        }else{
            $len = strlen($needle);
            if($len>strlen($haystack)) return -1;
            for($i=0;$i<=strlen($haystack)-$len;$i++){
                $temp = substr($haystack,$i,$len);
                echo $temp.PHP_EOL;
                if($needle==$temp){
                    return $i;
                }
            }
            return -1;
        }
    }
}

$haystack = "hello";
$needle = "ll";

$haystack = "aaaaa";
$needle = "bba";

$haystack = "a";
$needle = "a";

$haystack = "mississippi";
$needle = "pi";
$s = new Solution();
$res = $s->strStr($haystack,$needle);
print_r($res);
