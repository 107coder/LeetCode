<?php
/**
 * Create by PhpStorm.
 * FileName: 046全排列.php
 * User: CSF
 * Date: 2020/4/25
 * Time: 10:25
 */

class Solution_lc046
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums)
    {
        $res = [];
        $len = count($nums);
        if ($len < 2) {
            $res[] = $nums;
            return $res;
        }
        $this->action($nums, 0, $len - 1, $res);
        return $res;
    }

    private function action(&$nums, $s, $e, &$result)
    {
        if ($s > $e) {
            $result[] = $nums;
        }

        for ($i = $s; $i <= $e; $i++) {
            list($nums[$s], $nums[$i]) = [$nums[$i], $nums[$s]];
            $this->action($nums, $s + 1, $e, $result);
            list($nums[$i], $nums[$s]) = [$nums[$s], $nums[$i]];
        }
    }
}

$obj = new Solution_lc046();

$nums = [1, 2, 3];

$res = $obj->permute($nums);

print_r($res);