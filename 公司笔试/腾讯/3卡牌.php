<?php
/**
 * Create by PhpStorm.
 * FileName: 3卡牌.php
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

$n = (int)rtrim(fgets($handle));

$input = rtrim(fgets($handle));
$a = str2arr($input);

$input = rtrim(fgets($handle));
$b = str2arr($input);
fclose($handle);

$count = 0;
for ($i = 1; $i < $n; $i++) {
    if ($a[$i] < $a[$i - 1]){
        if($b[$i] > $b[$i-1]){
            $count++;
        }else{
            printf("%d\n",-1);
            exit;
        }
    }
}

print_r("%d\n",$count);
function swap(&$a, &$b)
{
    $t = $a;
    $a = $b;
    $b = $t;
}