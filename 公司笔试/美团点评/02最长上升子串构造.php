<?php
/**
 * Create by PhpStorm.
 * FileName: 02最长上升子串构造.php
 * User: CSF
 * Date: 2020/3/19
 * Time: 19:42
 */

/**
 * 只有64% 的AC
 */
/**
 * @param $nums
 * @param $n
 * @return int|mixed
 */
function fun2($nums, $n)
{

    $res = 0;
    $db = array_fill(0, count($nums), 1);

    for ($i = 0; $i < $n; $i++) {
        $flag = true;
        for ($j = 0; $j < $i; $j++) {
            if ($nums[$j] < $nums[$i]) {
                $db[$i] = max($db[$i], $db[$j] + 1);
            } else {
                if ($flag) {
                    continue;
                }
            }
        }
        $res = max($res, $db[$i]);
    }
    return $res;
}

function fun22($nums, $n)
{
    if($n < 2) return $n;
    $maxLen = 1;
    $len = count($nums);
    $index = 0;
    $end = false;
    while ($index < $len - 1) {
        $maxLen = max($maxLen, core($nums, $index, $n, $end));
        echo "index = $index,max = $maxLen\n";
        if($end) break;
    }
    return $maxLen;

}

//5
//2 1 3 2 5
function core($nums, &$index, $len, &$end)
{
    $maxLen = 1;
    $flag = true;
    for ($i = $index; $i < $len - 1; $i++) {
        if ($nums[$i] < $nums[$i + 1]) {
            $maxLen++;
        } elseif ($flag) {
            $flag = false;
            $index = $i + 1;
            if (isset($nums[$i + 2]) && $nums[$i] < $nums[$i + 2]) {
                $maxLen++;
                $i++;
            } else {
                break;
            }
        } else {
            break;
        }
    }
    if($i == $len-1) $end= true;
    return $maxLen;
}

function str2arr($str)
{
    if ($str == '') return [];
    return explode(' ', $str);
}

$handle = fopen("php://stdin", "r");
$n = (int)fgets($handle);
$str = fgets($handle);
$str = rtrim($str);

$nums = str2arr($str);
fclose($handle);
//print_r($nums);
echo fun22($nums, $n);