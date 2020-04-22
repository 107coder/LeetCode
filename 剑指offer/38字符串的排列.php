<?php
/**
 * Create by PhpStorm.
 * FileName: 38字符串的排列.php
 * User: CSF
 * Date: 2020/4/22
 * Time: 20:06
 */

class Solution_jz38
{

    /**
     * @param String $s
     * @return String[]
     */
    function permutation($s)
    {
        $result = [];
        if ($s == '') {
            return $result;
        }
        $this->action($result,$s,0,strlen($s)-1);
        return $result;
    }

    function action(&$res, &$str, $start, $end)
    {
        echo "str = $str, start = $start, end = $end\n";
        if($start >= $end && strlen($str) == $end+1){
            $res[] = $str;
        }else{
            for($i = $start; $i < $end; $i++){
                list($str[$start],$str[$i]) = array($str[$i],$str[$start]);
                $this->action($res,$str,$start+1,$end);
                list($str[$i],$str[$start]) = array($str[$start],$str[$i]);
            }
        }
    }
}

$obj = new Solution_jz38();
$s = 'abc';

$res = $obj->permutation($s);

print_r($res);