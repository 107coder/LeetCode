<?php
/**
 * Create by PhpStorm.
 * FileName: 1修建城市.php
 * User: CSF
 * Date: 2020/3/23
 * Time: 17:43
 */


function str2arr($str)
{
    if ($str == '') return [];
    return explode(' ', $str);
}


$handle = fopen("php://stdin", "r");

$n = rtrim(fgets($handle));
$point = [];
for ($i = 0; $i < $n; $i++) {
    $tmp = rtrim(fgets($handle));
    $point[] = str2arr($tmp);
}
fclose($handle);

if(empty($point)){
    return 0;
}

$minX = $maxX = $point[0][0];
$minY = $maxY = $point[0][1];
foreach ($point as $value){
    $minX = $minX > $value[0] ? $value[0]:$minX;
    $maxX = $maxX < $value[0] ? $value[0]:$maxX;
    $minY = $minY > $value[1] ? $value[1]:$minY;
    $maxY = $maxY < $value[1] ? $value[1]:$maxY;
}


$b = max(($maxX-$minX+1),($maxY - $minY));
echo $b*$b;