<?php
/**
 * Create by PhpStorm.
 * FileName: 有序数组中某数字出现的次数.php
 * User: CSF
 * Date: 2020/4/24
 * Time: 20:46
 */

//从课程标准谈人教版物理课程的编写特点


function findNOfNumber($nums, $n)
{
    if (empty($nums)) {
        return 0;
    }

    $left = findFirst($nums, $n);
    $right = findFirst($nums, $n + 1) - 1;

    return $right - $left + 1;
}

function findFirst($nums, $n)
{
    $left = 0;
    $right = count($nums) - 1;
    while ($left < $right) {
        $mid = $left + (($right - $left) >> 1);
        if ($nums[$mid] >= $n) {
            $right = $mid;
        } else {
            $left = $mid + 1;
        }
    }
    return $left;
}

$nums = [1, 3, 4, 5, 22, 22, 22, 22, 22, 45, 66, 78];

$res = findNOfNumber($nums, 22);

print_r($res);