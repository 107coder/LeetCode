<?php 

function replaceSpace($s){
    // 如果字符串为空，直接返回
    if(!$s) return $s;
    // 首先统计字符串中空格的个数，并且增加字符串的长度
    $len = strlen($s);
    for($i=0;$i<$len;$i++){
        if($s[$i] == ' '){
            $s.='  ';
        }
    }
    // 对新字符串进行处理
    $newLen = strlen($s);
    $i=$len-1;
    $j=$newLen-1;
    // return $s;
    while($i!=$j){
        if($s[$i] != ' '){
            $s[$j--] = $s[$i];
        }else{
            $s[$j--] = '0';
            $s[$j--] = '2';
            $s[$j--] = '%';
        }
        $i--;
    }
    return $s;
}

$s = "We are happy.";

$res = replaceSpace($s);

var_dump($res);