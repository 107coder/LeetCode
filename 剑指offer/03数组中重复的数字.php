<?php 

// 方法一，使用了一个hash表
function find($nums){
    if(!$nums){
        return NULL;
    }
    $tempArr = [];
    foreach ($nums as $key => $value) {
        if(in_array($value,$tempArr)){
            return $value;
        }else{
            array_push($tempArr,$value);
        }
    }
    return NULL;
}

/**
 * Undocumented function
 * 方法二：遍历数组，遍历到第i个元素的时候，看他的值m与i是否相等，如果相等直接下一个
 * 如果不相等，比较和下标为m的数比较是否相等，如果相等，返回这个数，
 * 如果不相等，交换两个数
 * 继续下一轮的比较交换
 *
 * @param [type] $nums
 * @return array
 */
function fun2($nums){
    if(!$nums) return NULL;
    for($i=0; $i<count($nums); $i++){

        while($i != $nums[$i]){
            echo "i = $i".PHP_EOL; 
            if($nums[$i] == $nums[$nums[$i]]){
                return $nums[$i];
            }
            $temp = $nums[$i];
            $nums[$i] = $nums[$temp];
            $nums[$temp] = $temp;
        }
    }
    return $nums;
   
}

/**
 * 方法三：不能修改输入数组的情况下。
 * 类似于二分法的方法。
 * 将n 个数字分为两半；1~m  和  m+1~n
 * 分别统计 每个区间内数字的个数，如果和这个区间的个数（end - start + 1）不同,那就表示这部分有重复的数字，在对这部分数字
 * 重复使用上面的方法进行查找即可
 */
function fun3(){

}
$nums = [2, 3, 1, 0, 2, 5, 3];

$res = fun2($nums);

print_r($res);