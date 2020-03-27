<?php
/**
 * Create by PhpStorm.
 * FileName: 914卡牌分组.php
 * User: CSF
 * Date: 2020/3/27
 * Time: 19:48
 */

class Solution_lc914
{

    /**
     * @param Integer[] $deck
     * @return Boolean
     */
    function hasGroupsSizeX($deck)
    {
        $tmpArr = [];
        foreach ($deck as $val) {
            if (isset($tmpArr[$val])) {
                $tmpArr[$val]++;
            } else {
                $tmpArr[$val] = 1;
            }
        }
        $min = min($tmpArr);

        if ($min < 2) {
            return false;
        }
        $b = 2;
        $tmp = current($tmpArr);
        while ($tmp !== false) {
//            echo "b = $b\n";
            if ($b > $min) return false;
            if (($tmp % $b) != 0) {
                $b++;
                reset($tmpArr);
            }else{
                next($tmpArr);
            }
            $tmp = current($tmpArr);
        }
        return true;
    }
}

$obj = new Solution_lc914();

$deck = [1, 2, 3, 4, 4, 3, 2, 1];

$deck = [1, 1, 1, 2, 2, 2, 3, 3];
$deck = [1, 1, 2, 2, 2, 2];
$deck = [0, 0, 0, 1, 1, 1, 2, 2, 2];
$deck = [1, 1, 1, 2, 2, 2, 2, 2, 2];
$deck = [1, 1, 1, 1, 1, 0, 0, 0];
$res = $obj->hasGroupsSizeX($deck);

var_dump($res);
