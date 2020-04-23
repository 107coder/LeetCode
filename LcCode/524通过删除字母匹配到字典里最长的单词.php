<?php
/*
给定一个字符串和一个字符串字典，找到字典里面最长的字符串，该字符串可以通过删除给定字符串的某些字符来得到。如果答案不止一个，返回长度最长且字典顺序最小的字符串。如果答案不存在，则返回空字符串。
*/

class Solution {

    /**
     * @param String $s
     * @param String[] $d
     * @return String
     */
    function findLongestWord($s, $d) {
        $len = 0;
        $res = "";
        foreach ($d as $key => $value) {
        	if($this->checkWord2($s,$value)){
        		if(strlen($value) > $len){
					$len = strlen($value);
        			$res = $value;
        		}else if(strlen($value) == $len && $value < $res){
        			$res = $value;
        		}else{

        		}
        	}
        }
        // return 'ab' < 'ba';
        return $res;
    }

    function checkWord($s,$word){
    	$sIndex = 0;
    	$sLen = strlen($s);
    	$i = 0;
    	for($i=0; $i<strlen($word);$i++){
    		while($word[$i] != $s[$sIndex]){
    			if($sIndex<$sLen-1){
					$sIndex++;    				
    			}else{
    				return false;
    			}
    		}
    	}
    	return true;
    }
    function checkWord2($s,$word){
    	$i = 0;
    	$j = 0;
    	while ($i < strlen($s) && $j < strlen($word)) {
    		if($s[$i] == $word[$j]){
    			$j++;
    		}
    		$i++;
    	}
    	return $j == strlen($word);
    }
}

$s = "abpcplea";
$d = ["ale","apple","monkey","plea"];

$d = ["a","b","c"];

$s = 'bab';
$d = ["ba","ab","a","b"];
$obj = new Solution();
$res = $obj->findLongestWord($s,$d);
var_dump($res);

