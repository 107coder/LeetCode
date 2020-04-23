<?php
/*
编写一个函数来查找字符串数组中的最长公共前缀。

如果不存在公共前缀，返回空字符串 ""。

示例 1:

输入: ["flower","flow","flight"]
输出: "fl"
示例 2:

输入: ["dog","racecar","car"]
输出: ""
解释: 输入不存在公共前缀。  
*/
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        if(empty($strs)){
        	return "";
        }
        $prefix = $strs[0];
        foreach ($strs as $key => $value) {
        	if($key == 0){
        		continue;
        	}
        	$prefix = $this->findPrefix($prefix,$value);
        	if($prefix == "") return $prefix;
        }
        return $prefix;
    }

    function findPrefix($str1,$str2){
    	if($str1=="" || $str2==""){
    		return "";
    	}
    	$len1 = strlen($str1);
    	$len2 = strlen($str2);
    	$minLen = min($len1,$len2);
    	$prefix = "";
    	for($i=0; $i<$minLen; $i++){
    		if($str1[$i] == $str2[$i]){
    			$prefix .= $str1[$i];
    		}else{
    			return $prefix;
    		}
    	}
    	return $prefix;
    }
}

$str1 = "flower";
$str2 = "flight";

$strs = ["flower","flow","flight"];
$strs = ["dog","racecar","car"];
$obj = new Solution();
$res = $obj->longestCommonPrefix($strs);

var_dump($res);