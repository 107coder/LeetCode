<?php
/**
 * Create by PhpStorm.
 * FileName: 12矩阵中的路径.php
 * User: CSF
 * Date: 2020/3/13
 * Time: 8:32
 */
/**
 * @param String[][] $board
 * @param String $word
 * @return Boolean
 */
function exist($board, $word)
{

    foreach ($board as $i => $value) {
        foreach ($value as $j => $val) {
            if (dfs($board, $word, $i, $j, 0)) return true;
        }
    }
    return false;

}

/**
 * @param $board
 * @param $word
 * @param $i
 * @param $j
 * @param $k
 * @return bool
 */
function dfs($board, $word, $i, $j, $k)
{
    if ($k == strlen($word)) return true;
    if ($i < 0 || $i > count($board) - 1 || $j < 0 || $j > count($board[0]) - 1) return false;

    $tmp = $board[$i][$j];
    if($tmp != $word[$k]) return false;
    $board[$i][$j] = '/';
    $res = dfs($board, $word, $i + 1, $j, $k + 1) ||
        dfs($board, $word, $i - 1, $j, $k + 1) ||
        dfs($board, $word, $i, $j + 1, $k + 1) ||
        dfs($board, $word, $i, $j - 1, $k + 1);
    $board[$i][$j] = $tmp;
    return $res;
}

$board = [["A", "B", "C", "E"],
    ["S", "F", "C", "S"],
    ["A", "D", "E", "E"]];
$word = "ABCCED";

$board = [['a','b']];
$word = 'ba';
$res = exist($board, $word);

var_dump($res);

/**
 * 解题思路：
 * 1. 判断字符是否为空
 * 2. 判断数组是否为空
 * 3. 构建一个同样大的数据，然后记录是否位置是否被访问过
 * 4. 找到第一个字符在数组中出现的所有的位置，然后尝试每一个位置是否可行
 *
 * 另一个函数
 * 1. 判断测试字符 当前测试位置的前后左右是否相等，如果不相等尝试下一个，如果相等，就用走下一步。
 */
