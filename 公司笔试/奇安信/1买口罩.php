<?php
/**
 * Create by PhpStorm.
 * FileName: 1买口罩.php
 * User: CSF
 * Date: 2020/3/28
 * Time: 19:46
 */

//只有80%的AC
if (fscanf(STDIN, "%d", $n) == 1) {

    $kz = [
        'D' => [5, 1],
        'B' => [3, 2],
        'F' => [3, 2],
        'E' => [4, 5],
        'A' => [2, 2],
        'C' => [1, 3],
    ];

    $count = 0;

    foreach ($kz as $key => $value) {
        if ($n >= $value[1]) {
            $n -= $value[1];
            $count += $value[0];
            unset($kz[$key]);
        }
    }

    echo $count;
} else {
    exit;
}