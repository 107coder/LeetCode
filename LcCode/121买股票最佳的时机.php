<?php
// 给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。

// 如果你最多只允许完成一笔交易（即买入和卖出一支股票），设计一个算法来计算你所能获取的最大利润。

// 注意你不能在买入股票前卖出股票。

class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        if(count($prices) < 2) return 0;
        $min = $prices[0];
        $max = 0;
        $maxVal = 0;
        foreach ($prices as $key => $value) {
            if($value < $min){
                $min = $value;
            }else{
                $maxVal = max($maxVal,$value - $min);
            }
        }
        return $maxVal;
    }
}

$prices = [7,1,5,3,6,4];
$prices = [2,4,1];
$obj = new Solution;
$res = $obj->maxProfit($prices);
print_r($res);