<?php
/**
 * Create by PhpStorm.
 * FileName: 19正则表达式匹配.php
 * User: CSF
 * Date: 2020/3/23
 * Time: 15:12
 */

class Solution_jz19
{

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p)
    {
        if ($s === NULL && $p === NULL) {
            return false;
        }

        return $this->match($s, $p, 0, 0);
    }

    function match($s, $p, $sIndex, $pIndex)
    {
        $sLen = strlen($s); // 3
        $pLen = strlen($p); // 5
//        sleep(1);

        // 首先判断当前字符串是不是到达末尾了,当模式和字符串同时到达末尾，匹配成功
        if ($pIndex == $pLen && $sIndex == $sLen) {
            return true;
        }

        if ($sIndex != $sLen && $pIndex == $pLen) {
            return false;
        }
        echo "sIndex = $sIndex, sLen = $sLen, pIndex = $pIndex, pLen = $pLen\n";
        // 判断当前位置的后一位是不是为 *
        if ($p[$pIndex + 1] == '*') {
            if (($p[$pIndex] == '.' && $sIndex != $sLen) || $s[$sIndex] == $p[$pIndex]) {
                return $this->match($s, $p, $sIndex + 1, $pIndex + 2)
                    || $this->match($s, $p, $sIndex + 1, $pIndex)
                    || $this->match($s, $p, $sIndex, $pIndex + 2);
            } else {
                return $this->match($s, $p, $sIndex, $pIndex + 2);
            }
        }

        // 判断当前位是不是 . 并且，当前的位置的字符也不相同
        if (($p[$pIndex] == '.' && $sIndex != $sLen) || $s[$sIndex] == $p[$pIndex])
            return $this->match($s, $p, $sIndex + 1, $pIndex + 1);

        return false;



    }
}

$so = new Solution_jz19();

$s = 'aa';
$p = 'a*';

$s = 'aab';
$p = 'c*a*b';

//$s = "aaaaaaaaaaaaab";
//$p = "a*a*a*a*a*a*a*a*a*a*c";
$res = $so->isMatch($s, $p);

var_dump($res);

// 死去吧，我不知道怎么写了   啊  啊啊 啊啊 啊 啊啊