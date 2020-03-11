<?php
/**
 * Create by PhpStorm.
 * FileName: 11旋转数组的最小数字.php
 * User: CSF
 * Date: 2020/3/11
 * Time: 9:27
 */

/**
 * @param Integer[] $numbers
 * @return Integer
 */
function minArray($numbers)
{
    if ($numbers == NULL) return NULL;

    $l = 0;
    $h = count($numbers) - 1;

    while ($l < $h) {
        $m = $l + intval(($h - $l) / 2);
        echo "l = $l h = $h m = $m" . PHP_EOL;
        sleep(1);
        if ($numbers[$m] > $numbers[$h]) {
            $l = $m + 1;
        } elseif($numbers[$m] < $numbers[$h]) {
            $h = $m;
        }else{
            $h--;
        }
    }
    return $numbers[$l];
}

function minArray2($numbers){
    if ($numbers == NULL) return NULL;
    $pre = $numbers[0];
    foreach ($numbers as $val){
        if($pre > $val){
            return $val;
        }else{
            $pre = $val;
        }
    }
    return $numbers[0];
}
$numbers = [3, 4, 5, 1, 2];
$numbers = [2, 2, 2, 0, 1];

$numbers = [3,3,1,3];
$res = minArray($numbers);

print_r($res);