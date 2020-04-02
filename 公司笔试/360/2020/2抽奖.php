<?php
/**
 * Create by PhpStorm.
 * FileName: 2抽奖.php
 * User: CSF
 * Date: 2020/3/24
 * Time: 20:44
 */

function str2arr($s)
{
    if ($s == '') return [];
    return explode(' ', $s);
}


$handle = fopen("php://stdin", "r");

$tmp = rtrim(fgets($handle));
$data = str2arr($tmp);

fclose($handle);

print_r($data);

$n = $data[0];
$m = $data[1];

function myFun($n, $m)
{
    $aWin = $n / ($n + $m);

    while ($n > 0 && $m > 0) {
        if ($n == 1) {
            $aWin += ($m - 1) / ($n + $m - 1) * ($m - 2) / ($n + $m - 2) * $n / ($n + $m - 3);
            $m -= 2;
        } else {
            $aWin += $m / ($n + $m) * $m - 1 / ($n + $m - 1) * $n / ($n + $m - 2);
            $aWin += $m / ($n + $m) * $n / ($n + $m - 1) * $n - 1 / ($n + $m - 2);
        }
    }
    var_dump($aWin);
    // 假设B两次都没有抽到的情况// B第二次抽到给扔了的情况
    //
//    $aWin += action($n, $m - 2, $aWin) + action($n - 1, $m - 1, $aWin);
//    var_dump($aWin);
}

function action($n, $m, &$aWin)
{
    if ($n <= 0) return 0;
    // 分成两种情况
    // a 抽到奖券，
    if ($n == 1) {
        $aWin += $m / ($n + $m) * $m - 1 / ($n + $m - 1) * $n / ($n + $m - 2);
        $m -= 2;
    } else {
        $aWin += $m / ($n + $m) * $m - 1 / ($n + $m - 1) * $n / ($n + $m - 2);
        $aWin += $m / ($n + $m) * $n / ($n + $m - 1) * $n - 1 / ($n + $m - 2);
    }
}

myFun($n, $m);
function myFun2($n, $m)
{
    $dp = [];
    for ($i = 1; $i < $n; $i++) {
        $nf = $i;
        $dp[$i][0] = 1.0;
        $dp[$i][1] = $nf / ($nf + 1.0);
        $dp[$i][2] = $nf / ($nf + 2.0) + 2.0 / (2.0 + $nf) * (2.0 - 1.0) / $nf * $dp[$i - 1][0];
    }
    for ($i = 1; $i <= $n; $i++) {
        for ($j = 3; $j <= $m; ++$j) {
            $nf = $i;
            $mf = $j;
            $dp[$i][$j] = $nf / ($nf + $mf) + $mf / ($nf + $mf) * ($mf - 1.0) / ($nf + $mf - 1.0) * ($mf - 2.0) / ($nf + $mf - 2.0) * $dp[$i][$j - 3] + $mf / ($nf + $mf) * ($mf - 1.0) * $nf / ($mf + $nf - 2.0) * $dp[$i - 1][$j - 2];
        }
    }
    echo $dp[$n][$m] . PHP_EOL;
    return 0;
}

myFun2($n, $m);
/**
 * #include<bits/stdc++.h>
 * using namespace std;
 *
 * int main() {
 *      int n = 0, m = 0;
 *      cin >> n >> m;
 *      vector<vector<double>> dp(n+1,vector<double>(m+1, 0.0));
 *      for(int i = 1; i <= n; ++i) {
 *          double nf = i;
 *          dp[i][0] = 1.0;
 *          dp[i][1] = nf/(nf+1.0);
 *          dp[i][2] = nf/(2.0+nf) + 2.0/(2.0+nf)*(2.0-1.0)/nf*dp[i-1][0];
 *      }
 *      for(int i = 1; i <= n; ++i)
 *          for(int j = 3; j <= m; ++j) {
 *              double nf = i, mf = j;
 *              dp[i][j] = nf/(nf+mf) + mf/(nf+mf)*(mf-1.0)/(nf+mf-1.0)*(mf-2.0)/(mf+nf-2.0)*dp[i][j-3]
 *          +mf/(nf+mf)*(mf-1.0)/(nf+mf-1.0)*nf/(mf+nf-2.0)*dp[i-1][j-2];
 *              }
 *      cout << setprecision(4) << dp[n][m] << endl;
 *      return 0;
 * }
 */
/**
 * 1 3
 *
 * 第一次，1/4
 * 第二次 3/4 * 2/3 * 1/2  = 1/4
 * 总共是 1/2
 *
 * 2 3
 * 第一次： 2/5
 * 第二次：2/4 * 1/3 * 2/2 + 2/4 * 2/3 * 1/2  = 1/6 + 1/6
 * 第三次：1/3 * 1 * 1
 */