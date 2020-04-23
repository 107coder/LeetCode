<?php
/**
 * Create by PhpStorm.
 * FileName: 409最长回文串.php
 * User: CSF
 * Date: 2020/3/19
 * Time: 8:29
 */

class Solution_lc409
{

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindrome($s)
    {
        if (!$s) return 0;
        $slen = strlen($s);
        $charArr = [];
        for ($i = 0; $i < $slen; $i++) {
            if (!isset($charArr[$s[$i]])) {
                $charArr[$s[$i]] = 1;
            } else {
                $charArr[$s[$i]]++;
            }
        }
        $res = 0;
        $addOne = 0;
        foreach ($charArr as $key => $value) {
            if ($value <= 1) {
                $addOne = 1;
            } elseif ($value % 2 == 1) {
                $addOne = 1;
                $res += ($value - 1);
            } else {
                $res += $value;
            }
        }
        $res += $addOne;
        return $res;
    }
}

$s = new Solution_lc409();

$ss = "abccccdd";

$res = $s->longestPalindrome($ss);

print_r($res);