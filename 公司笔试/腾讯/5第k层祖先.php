<?php
/**
 * Create by PhpStorm.
 * FileName: 5第k层祖先.php
 * User: CSF
 * Date: 2020/4/26
 * Time: 21:41
 */

function str2arr($str)
{
    if ($str == '') return [];
    return explode(' ', $str);
}

$handle = fopen("php://stdin", "r");

$q = (int)rtrim(fgets($handle));


while($q > 0){
    $q--;
    $input = rtrim(fgets($handle));
    $inputArr = str2arr($input);
    $x = $inputArr[0];
    $k = $inputArr[1];

    $father = [];
    while ($x > 1){
        $x = $x >> 1;
        $father[] = $x;
    }
    $len = count($father);
    if($k > $len){
        printf("%d\n",-1);
    }else{
        printf("%d\n",$father[$len-$k]);
    }
//    print_r($father);
}
fclose($handle);