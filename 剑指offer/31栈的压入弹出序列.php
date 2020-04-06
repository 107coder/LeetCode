<?php
/**
 * Create by PhpStorm.
 * FileName: 31栈的压入弹出序列.php
 * User: CSF
 * Date: 2020/4/6
 * Time: 19:38
 */

class Solution_jz31
{

    /**
     * @param Integer[] $pushed
     * @param Integer[] $popped
     * @return Boolean
     */
    function validateStackSequences($pushed, $popped)
    {
        $len = 0;
        $stack = [];
        $i = 0;
        for ($j = 0; $j < count($pushed); $j++) {
            if ($pushed[$j] == $popped[$i]) {
                $i++;
            } elseif ($len > 0 && $stack[$len - 1] == $popped[$i]) {
                $i++;
                array_pop($stack);
                $len--;
                $j--;
            } else {
                $stack[] = $pushed[$j];
                $len++;
            }
        }

        while ($stack) {
            if (array_pop($stack) != $popped[$i++]) {
                return false;
            }

        }
        return true;
    }
}

$obj = new Solution_jz31();

$pushed = [1, 2, 3, 4, 5];
$popped = [4, 5, 3, 2, 1];

//$pushed = [1, 2, 3, 4, 5];
//$popped = [4, 3, 5, 1, 2];

$pushed = [2, 1, 0];
$popped = [1, 2, 0];

$pushed = [1, 2, 3, 0];
$popped = [2, 1, 3, 0];
$res = $obj->validateStackSequences($pushed, $popped);

var_dump($res);