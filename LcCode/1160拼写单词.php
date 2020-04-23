<?php
/**
 * Create by PhpStorm.
 * FileName: 1160拼写单词.php
 * User: CSF
 * Date: 2020/3/17
 * Time: 8:31
 */

class Solution_lc1160
{

    /**
     * @param String[] $words
     * @param String $chars
     * @return Integer
     */
    function countCharacters($words, $chars)
    {
        if ($chars == '') return 0;
        $charsArr = [];
        for ($i = 0; $i < strlen($chars); $i++) {
            $charsArr[$chars[$i]] = isset($charsArr[$chars[$i]]) ? $charsArr[$chars[$i]] + 1 : 1;
        }

        $res = 0;
        foreach ($words as $val) {
            $tmp = [];
            for ($j = 0; $j < strlen($val); $j++) {
                $tmp[$val[$j]] = isset($tmp[$val[$j]])?$tmp[$val[$j]]+1:1;
            }
            $flag = true;
            foreach ($tmp as $k => $v){
                if((!isset($charsArr[$k])) || $v > $charsArr[$k]){
                    $flag = false;
                    break;
                }
            }
            if($flag){
                $res += strlen($val);
            }
        }
        return $res;
    }
}

$s = new Solution_lc1160();

$words = ["cat", "bt", "hat", "tree"];
$chars = "atach";
$res = $s->countCharacters($words, $chars);

var_dump($res);