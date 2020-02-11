<?php
// 给定一个字符串，请将字符串里的字符按照出现的频率降序排列。
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function frequencySort($s) {
      	$charArr = [];
      	$len = strlen($s);
      	for ($i=0; $i<$len; $i++){
      		if(!isset($charArr[$s[$i]])){
      			$charArr[$s[$i]] = 1;
      		}else{
      			$charArr[$s[$i]]++;
      		}
      	}

        arsort($charArr,SORT_DESC);

        $res = "";
        foreach ($charArr as $key => $value) {
        	for($j=$value;$j>0;$j--){
        		$res .= $key;
        	}
        }
        return $res;
    }
}

$s = 'tree';
$s = 'cccaaa';
$s = 'Aabb';
$obj = new Solution;
$res = $obj->frequencySort($s);

print_r($res);