<?php
/**
 * Create by PhpStorm.
 * FileName: ms0106字符串压缩.php
 * User: CSF
 * Date: 2020/3/16
 * Time: 8:45
 */

/**
 * @param String $S
 * @return String
 */
function compressString($S)
{
    if (!$S) return $S;
    $sLen = strlen($S);
    $res = '';
    $count = 1;
    $pre = $S[0];
    for ($i = 1; $i < $sLen; $i++) {
        if ($S[$i] == $pre) {
            $count++;
        } else {
            $res .= $pre . $count;
            $pre = $S[$i];
            $count = 1;
        }
    }
    $res .= $pre . $count;
    return strlen($S) > strlen($res) ? $res : $S;
}

$S = "aabcccccaaa";
$S = "abbccd";

$res = compressString($S);

var_dump($res);
