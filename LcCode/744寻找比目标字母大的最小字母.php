<?php

class Solution {

    /**
     * @param String[] $letters
     * @param String $target
     * @return String
     */
    function nextGreatestLetter($letters, $target) {
        if(!$letters) return '';

        $l = 0;
        $h = count($letters)-1;

        // 如果字母大于最后一个字母，则直接返回第一个字母
        if($target >= $letters[$h]) 
            return $letters[0];

        while($l <= $h){
            $m = $l + intval(($h-$l)/2);
            if($letters[$m] > $target){
                $h = $m-1;
            }elseif($letters[$m] < $target){
                $l = $m+1;
            }else{
                $l = $m+1;
                // return $letters[$m+1];
            }
        }
        echo "l = $l".PHP_EOL;
        return $letters[$l];
    }
}

$letters = ["c", "f", "j"];
$target = 'a';

// $letters = ["e","e","e","e","e","e","n","n","n","n"];
// $target = 'e';

$obj = new Solution;
$res = $obj->nextGreatestLetter($letters,$target);

var_dump($res);
