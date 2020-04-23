<?php
/*
编写一个函数，以字符串作为输入，反转该字符串中的元音字母。
*/
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function reverseVowels($s) {
        $array = ['a','e','i','o','u','A','E','I','O','U'];
        $lIndex = 0;
        $rIndex = strlen($s)-1;

        while ($lIndex < $rIndex) {
        	if(in_array($s[$lIndex], $array) && in_array($s[$rIndex], $array)){
        		$temp = $s[$lIndex];
        		$s[$lIndex] = $s[$rIndex];
        		$s[$rIndex] = $temp;
        		$lIndex++;
        		$rIndex--;
        	}

        	if(!in_array($s[$lIndex],$array)){
        		$lIndex++;
        	}

        	if(!in_array($s[$rIndex],$array)){
        		$rIndex--;
        	}
        }
        return $s;
    }
}

$s = "hello";

$obj = new Solution();
$res = $obj->reverseVowels($s);
print_r($res);