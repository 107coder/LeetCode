<?php
/**
 * Create by PhpStorm.
 * FileName: 14-II剪绳子.php
 * User: CSF
 * Date: 2020/3/18
 * Time: 9:20
 */

class Solution_jz14II
{

    /**
     * @param Integer $n
     * @return Integer
     */
    function cuttingRope($n)
    {
        if ($n <= 3) return $n - 1;
        $a = $n % 3;
        $b = intval($n / 3);
        if ($a == 0) $res = $this->myPow(3, $b);
        elseif ($a == 1) $res = $this->myPow(3, $b - 1) * 4;
        else $res = $this->myPow(3, $b) * 2;
        return $res % 1000000007;
    }

    public function myPow($base, $exp)
    {
        $res = 1;
        while ($exp) {
            $res *= $base;
            $res = $res % 1000000007;
            $exp--;
        }
        return $res;
    }
}

$s = new Solution_jz14II();
$n = 127;
$res = $s->cuttingRope($n);

print_r($res);

//print_r($s->myPow(3,2));