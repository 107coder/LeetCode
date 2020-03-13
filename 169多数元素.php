<?php
/**
 * Create by PhpStorm.
 * FileName: 169多数元素.php
 * User: CSF
 * Date: 2020/3/13
 * Time: 8:14
 */

/**
 * @param Integer[] $nums
 * @return Integer
 */
function majorityElement($nums) {
    $map = [];
    foreach ($nums as $val) {
        if (!isset($map[$val])) {
            $map[$val] = 1;
        } else {
            $map[$val]++;
        }
        if ($map[$val] > intval(count($nums) / 2)) {
            return $val;
        }
    }
}

$nums = [2,2,1,1,1,2,2];
$nums = [1];

$res = majorityElement($nums);

print_r($res);