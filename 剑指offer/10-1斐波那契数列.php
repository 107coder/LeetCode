<?php
/**
 * Create by PhpStorm.
 * FileName: 10-1斐波那契数列.php
 * User: CSF
 * Date: 2020/3/6
 * Time: 8:22
 */


/**
 * @param Integer $n
 * @return Integer
 */
function fib($n) {
    if($n < 2){
        return $n;
    }else{
        return fib($n-1)+fib($n-2);
    }
}

function fib2($n){
    $temp1 = 0;
    $temp2 = 0;
    $res = 0;
    $i = 0;
    while ($i <= $n){
        if($i == 0){
            $temp2 = $i;
            $res = $temp2;
        }elseif($i == 1){
            $temp1 = $i;
            $res = $temp1;
        }else{
            $res = $temp1+$temp2;
            $temp2 = $temp1;
            $temp1 = $res;
        }
        $i++;
    }
    return $res%1000000007;
}
// n：  0 1 2 3 4 5 6 7  8  9
// fib：0 1 1 2 3 5 8 13 21 34
$n = 9;
//print_r(fib($n));
echo PHP_EOL;
for ($i=0; $i<50; $i++){
    if($i < 2){
        continue;
    }
    if(fib2($i) != fib2($i-1) + fib2($i-2)){
        echo $i.'--stop';
    }
}



