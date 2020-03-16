<?php
/**
 * Create by PhpStorm.
 * FileName: 13机器人的运动范围.php
 * User: CSF
 * Date: 2020/3/16
 * Time: 8:58
 */

class Solution_jz13
{

    /**
     * @param Integer $m
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function movingCount($m, $n, $k)
    {
        $count = [];
        for ($i = 0; $i < $m; $i++) {
            $count[] = [];
            $count[$i] = array_fill(0 , $n, 0);
        }

        $res = $this->moving($m, $n, $k, 0, 0, $count);
        return $res;
    }

    /**
     * @param $m
     * @param $n
     * @param $k
     * @param $x
     * @param $y
     * @param $count
     */
    function moving($m, $n, $k, $x, $y, &$count)
    {
        if ($x >= $m || $x < 0 || $y >= $n || $y < 0) return 0;
        if (!$this->checkPoint($x, $y, $k)) return 0;
        if ($count[$x][$y] == 1) return 0;
        $count[$x][$y] = 1;

        return 1 + $this->moving($m, $n, $k, $x, $y + 1, $count)
            + $this->moving($m, $n, $k, $x + 1, $y, $count);

    }

    /**
     * @param $x
     * @param $y
     * @param $k
     * @return bool
     */
    function checkPoint($x, $y, $k)
    {
//        echo "Come in checkPoint...".PHP_EOL;
//        echo "x = $x,y = $y,k = $k".PHP_EOL;
//        sleep(1);
        $tmp = 0;
        while ($x != 0) {
            $tmp += $x % 10;
            $x = intval($x / 10);
        }
        while ($y != 0) {
            $tmp += $y % 10;
            $y = intval($y / 10);
        }
        return $tmp <= $k;
    }
}

$s = new Solution_jz13();
$m = 3;
$n = 2;
$k = 17;

$res = $s->movingCount($m, $n, $k);
var_dump($res);
