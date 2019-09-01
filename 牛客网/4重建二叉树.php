<?php

class TreeNode{
    var $val;
    var $left = NULL;
    var $right = NULL;
    function __construct($val){
        $this->val = $val;
    }
}

function reConstructBinaryTree($pre, $vin)
{
    // write code here
}

$pre = [1,2,4,7,3,5,6,8];
$vin = [4,7,2,1,5,3,8,6];

$result = reConstructBinaryTree($pre,$vin);

print_r($result);