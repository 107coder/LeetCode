<?php
/**
 * Create by PhpStorm.
 * FileName: 2集合间的最短距离.php
 * User: CSF
 * Date: 2020/4/26
 * Time: 20:29
 */


//$setA = [[0, 0], [0, 1], [1, 0], [1, 1]];
//$setB = [[2, 2], [2, 3], [3, 2], [3, 3]];
//$res = action($setA, $setB);
//echo sprintf("%01.3f", $res);
//exit();
function str2arr($str)
{
    if ($str == '') return [];
    return explode(' ', $str);
}

$handle = fopen("php://stdin", "r");

$n = (int)rtrim(fgets($handle));

while ($n != 0) {
    $n--;
    $k = (int)rtrim(fgets($handle));
    $pointsA = [];
    $pointsB = [];
    $i = $k;
    $j = $k;
    while ($i != 0) {
        $i--;
        $item = rtrim(fgets($handle));
        $item = str2arr($item);
        $pointsA[] = $item;
    }

    while ($j != 0) {
        $j--;
        $item = rtrim(fgets($handle));
        $item = str2arr($item);
        $pointsB[] = $item;
    }
    $res = action($pointsA, $pointsB);
    echo sprintf("%01.3f", $res) . PHP_EOL;
}

fclose($handle);


function action($setA, $setB)
{

    $res = null;
    $pointA = [];
    $pointB = [];
    foreach ($setA as $valA) {
        foreach ($setB as $valB) {
            $cX = $valA[0] - $valB[0];
            $cY = $valA[1] - $valB[1];
            $cX = $cX > 0 ? $cX : -$cX;
            $cY = $cY > 0 ? $cY : -$cY;
            $tmp = $cX + $cY;
//            echo "[$valA[0],$valA[1]], [$valB[0],$valB[1]], tmp = $tmp, res = $res";
            if ($res != null && $res > $tmp) {
//                echo "  in";
                $res = $tmp;
                $pointA = $valA;
                $pointB = $valB;
            }
            if ($res == null) {
                $pointA = $valA;
                $pointB = $valB;
                $res = $tmp;
            }
//            echo "\n";

        }
    }
//    print_r($pointA);
//    print_r($pointB);
    $res = ($pointA[0] - $pointB[0]) * ($pointA[0] - $pointB[0]) + ($pointA[1] - $pointB[1]) * ($pointA[1] - $pointB[1]);
    $res = sqrt($res);
//    return 1.414;
    return $res;
}

$setA = [[0, 0], [0, 1], [1, 0], [1, 1]];
$setB = [[2, 2], [2, 3], [3, 2], [3, 3]];

//$res = action($setA, $setB);
//echo sprintf("%01.3f", $res);
//var_dump($x);