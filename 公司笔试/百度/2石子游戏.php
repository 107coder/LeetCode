<?php
/**
 * Create by PhpStorm.
 * FileName: 2石子游戏.php
 * User: CSF
 * Date: 2020/3/29
 * Time: 19:59
 */

function str2arr($str)
{
    if ($str == '') return [];
    return explode(' ', $str);
}

$handle = fopen("php://stdin", "r");

$t = (int)rtrim(fgets($handle));

$game = [];
while ($t-- != 0) {
    $n = (int)rtrim(fgets($handle));
    $str = rtrim(fgets($handle));
    $game[] = array_slice(str2arr($str), 0, $n);
}
fclose($handle);

function stoneGame($game)
{
    $gamer = ['man', 'woman'];
    $winner = [];
    foreach ($game as $key => $g) {
        $i = 0;
        $j = 0;
        $sum = array_sum($g);
        while (!isset($winner[$key])) {
            $flag = false;
            // 检查是不是所有的石碓都是空了
            foreach ($g as $stone) {
                if ($stone != 0) {
                    $flag = true;
                    break;
                }
            }
            // 如果所有的石子堆都是空的，他就输了
            if (!$flag) {
                $winner[$key] = $gamer[1 - $i];
                break;
            }
            $flag = false;
            // 模拟玩家用所有的石堆中取出一个石子的操作
            foreach ($g as &$s) {
                if ($s != 0) {
                    if (!in_array($s - 1, $g)) {
                        $s--;
                        $flag = true;
                        break;
                    }
                }
            }
            if (!$flag) {
                $winner[$key] = $gamer[1 - $i];
                break;
            }
            // 判断是不是拿了之后存在两个相等的，主要是为了本来就有两个以上的元素相等的情况
            for($k = 0; $k < count($g) ; $k++) {
                if (array_search($g[$k], $g) >= 2) {
                    $winner[$key] = $gamer[1 - $i];
                    break 2;
                }
            }
            $i = ($i + 1) % 2;


        }
    }
    foreach ($winner as $v) {
        printf("%s\n", $v);
    }
}

stoneGame($game);


//$a = [1,2,3,3,4];
//
//var_dump(array_search(2,$a));