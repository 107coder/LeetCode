<?php
/**
 * Create by PhpStorm.
 * FileName: 300最长升序子序列.php
 * User: CSF
 * Date: 2020/3/14
 * Time: 8:53
 */

/**
 * @param Integer[] $nums
 * @return Integer
 */
function lengthOfLIS($nums)
{
    if (!count($nums)) return 0;
    $res = 0;
    $db = array_fill(0, count($nums), 1);

    for ($i = 0; $i < count($nums); $i++) {
        for ($j = 0; $j < $i; $j++) {
            if ($nums[$j] < $nums[$i]) $db[$i] = max($db[$i], $db[$j] + 1);
        }
        $res = max($res,$db[$i]);
    }
    return $res;
}

$nums = [10, 9, 2, 5, 3, 7, 101, 18];
$nums = [1, 3, 6, 7, 9, 4, 10, 5, 6];
$res = lengthOfLIS($nums);

print_r($res);