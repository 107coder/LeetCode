<?php
/**
 * Create by PhpStorm.
 * FileName: ms040最小的k个数.php
 * User: CSF
 * Date: 2020/3/20
 * Time: 17:42
 */

class Solution_ms40
{

    /**
     * @param Integer[] $arr
     * @param Integer $k
     * @return Integer[]
     */
    function getLeastNumbers($arr, $k)
    {
        // 试着使用快速排序吧
        $arr = $this->quickSort($arr, 0, count($arr)-1);
        return array_slice($arr, 0, $k);
    }

    function quickSort(&$arr, $start, $end)
    {

        if ($start < $end) {
            $pIndex = $this->pattern($arr, $start , $end);
            $this->quickSort($arr, $start, $pIndex - 1);
            $this->quickSort($arr, $pIndex + 1, $end);
        }

        return $arr;
    }

    function pattern(&$arr, $start, $end)
    {
        $pIndex = 0;
        try{
            $pIndex = random_int($start, $end);
        }catch (Exception $e){}

        $this->swap($arr, $pIndex, $start);
        $index = $start + 1;
        for ($i = $index; $i <= $end; $i++) {
            if ($arr[$i] < $arr[$start]) {
                $this->swap($arr, $i, $index);
                $index++;
            }
        }
        $index--;
        $this->swap($arr, $start, $index);
        return $index;
    }

    function swap(&$arr, $i, $j)
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    function fun01($arr, $k)
    {
        // 使用了一个选择排序，只选择前k 位，时间负责度太高，不通过
        if (empty($arr) || $k == 0) return [];
        $p = 0;

        for ($i = 0; $i < $k; $i++) {
            $min = $arr[$i];
            $minIndex = $p;
            for ($j = $p; $j < count($arr); $j++) {
                if ($min > $arr[$j]) {
                    $min = $arr[$j];
                    $minIndex = $j;
                }
            }
            if ($minIndex != $p) {
                list($arr[$p], $arr[$minIndex]) = array($arr[$minIndex], $arr[$p]);
            }
            $p++;
        }
        return array_slice($arr, 0, $k);
    }
}

$s = new Solution_ms40();
$arr = [0, 1, 2, 1];
//$arr = [4, 3, 2, 1];
//$arr = [5,4,3,2,1];
$k = 3;

$res = $s->getLeastNumbers($arr, $k);

print_r($res);