<?php
/**
 * Create by PhpStorm.
 * FileName: 20表示数值的字符串.php
 * User: CSF
 * Date: 2020/3/24
 * Time: 9:26
 */


class Solution_jz20
{

    /**
     * @param String $s
     * @return Boolean
     */
    function isNumber($s)
    {
        if ($s == '' || $s == NULL) return false;
        $index = 0;
        while($s[$index] == ' '){
            $index++;
        }
        $res = $this->scanInteger($s, $index);

        if ($index < strlen($s) && $s[$index] == '.') {
            $index++;
            $res = $this->scanUnInteger($s, $index) || $res;
        }

        if ( $index < strlen($s) && ($s[$index] == 'e' || $s[$index] == 'E')) {
            $index++;
            $res = $this->scanInteger($s, $index) && $res;
        }
        while($s[$index] == ' '){
            $index++;
            if($index >= strlen($s)) break;
        }
        return $res && $index == strlen($s);
    }

    function scanInteger($s, &$index)
    {
        if ($s[$index] == '-' || $s[$index] == '+') {
            $index++;
        }
        return $this->scanUnInteger($s, $index);
    }

    function scanUnInteger($s, &$index)
    {

        $i = $index;
        while ($s[$index] >= '0' && $s[$index] <= '9') {
            $index++;
            if ($index >= strlen($s))
                break;
        }
        return $index > $i;
    }
}

$so = new Solution_jz20();

$s = '-90e3';
$s = ' 0 ';
$s = '1  0 3 ';
$s = '.-4';
$res = $so->isNumber($s);

var_dump($res);