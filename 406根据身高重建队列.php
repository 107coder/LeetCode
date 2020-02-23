<?php
/*
假设有打乱顺序的一群人站成一个队列。 每个人由一个整数对(h, k)表示，其中h是这个人的身高，k是排在这个人前面且身高大于或等于h的人数。 编写一个算法来重建这个队列。

注意：
总人数少于1100人。
*/
class Solution {

    /**
     * @param Integer[][] $people
     * @return Integer[][]
     */
    function reconstructQueue($people) {
        // 按照 0 降序，按照 1 升序 排序
        array_multisort(array_column($people,0),SORT_DESC,array_column($people,1),SORT_ASC,$people);
        
        $res = [];
        foreach($people as $key => $val){
            $this->addOne($res,$val);
        }
        return $res;
    }

    function addOne(&$data,$val){
        $index = $val[1];
        for($i=count($data);$i>$index;$i--){
            $data[$i] = $data[$i-1];
        }
        $data[$index] = $val;
    }
}

$people = [[7,0], [4,4], [7,1], [5,0], [6,1], [5,2]];
$obj = new Solution;
$res = $obj->reconstructQueue($people);
print_r($res);