<?php
/**
 * Create by PhpStorm.
 * FileName: 58I反转单词顺序.php
 * User: CSF
 * Date: 2020/4/24
 * Time: 9:29
 */

class Solution_jz58I
{

    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s)
    {
//        $flag = ' ';
        $flag = '.';
//        $pattern = '/^ +$/';
//        $s = preg_replace($pattern,' ',$s);
        $len = strlen($s);
        if ($len < 1) {
            return $s;
        }
//        for($i = 0; $i < $len; $i++){
//
//        }
        $this->revert($s, 0, $len - 1);
        $left = $right = 0;
        $i = 0;
        while(true){
            if($i == 0 || $s[$i-1] == $flag){
                $left = $i;
            }
            if($i == $len-1 || $s[$i+1] == $flag){
                $right = $i;
                if($left < $right){
                    $this->revert($s,$left,$right);
                }
            }
            $i++;
            if($i >= $len) break;
        }
        return $s;
    }

    private function revert(&$url, $left, $right)
    {
        while ($left <= $right) {
            list($url[$left], $url[$right]) = [$url[$right], $url[$left]];
            $left++;
            $right--;
        }
    }
}

$obj = new Solution_jz58I();

$s = 'the sky is blue';
$s = 'I am a student. ';
$s = 'a good   example    ';
$s = 'www.toutiao.com';
$res = $obj->reverseWords($s);

var_dump($res);