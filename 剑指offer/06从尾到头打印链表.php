<?php 

include_once '../Common/CreateLinkList.php';

function reversePrint($head){
    if($head == NULL) return [];

    $result = [];
    while($head != NULL){
        array_unshift($result,$head->val);
        $head = $head->next;
    }
    return $result;
}

$arr = [1,3,2];
$head = CreateLinkList($arr);

$res = reversePrint($head);
print_r($res);