<?php


  // Definition for a singly-linked list.
  class ListNode {
      public $val = 0;
      public $next = null;
      function __construct($val) { $this->val = $val; }
 }
 
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers1($l1, $l2) {
        $num1 = '';
        $num2 = '';

        //将所第一个数转成取出
        while($l1->next != null){
        	$num1 .= $l1->val;
        	$l1 = $l1->next;
        }

        $num1 .= $l1->val;
        $num1 = strrev($num1);
	
        //num2
        while($l2->next != null){
        	$num2 .= $l2->val;
        	$l2 = $l2->next;
        }
        $num2 .= $l2->val;
        $num2 = strrev($num2);
        $sum = $num1+$num2;
        $sum = number_format($sum,0,'','');


        $l3 = new ListNode(0);
        $l = $l3;
        $length = strlen($sum);
        $i=1;
        while($i<=$length){
      		$temp = new ListNode(substr($sum,$length-$i,1));
      		$i++;
      		$l->next = $temp;
      		$l = $l->next;
        }
/*        if($sum == 0){
        	return $l3;
        }else{
  	    	while($sum != 0){
  	    		$temp = new ListNode($sum%10);
  	    		$l->next = $temp;
  	    		$l = $l->next;
  	    		$sum = intval($sum / 10);
  	    	} 
        }
*/

    	return $l3->next;
    }

    /**
     * 这种方法总是会出现溢出的现象
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers2($l1, $l2) {
        $num1 = '';
        $num2 = '';

        //将所第一个数转成取出
        while($l1->next != null){
          $num1 .= $l1->val;
          $l1 = $l1->next;
        }

        $num1 .= $l1->val;
        $num1 = strrev($num1);
  
        //num2
        while($l2->next != null){
          $num2 .= $l2->val;
          $l2 = $l2->next;
        }
        $num2 .= $l2->val;
        $num2 = strrev($num2);
        $sum = $num1+$num2;
        $sum = number_format($sum,0,'','');


        $l3 = new ListNode(0);
        $l = $l3;
        $length = strlen($sum);
        $i=1;
        while($i<=$length){
          $temp = new ListNode(substr($sum,$length-$i,1));
          $i++;
          $l->next = $temp;
          $l = $l->next;
        }
/*        if($sum == 0){
          return $l3;
        }else{
          while($sum != 0){
            $temp = new ListNode($sum%10);
            $l->next = $temp;
            $l = $l->next;
            $sum = intval($sum / 10);
          } 
        }
*/

      return $l3->next;
    }

    public function addTwoNumbers($l1,$l2){
        $temp = 0;
        $l3 = new ListNode(0);
        $l = $l3;

        $flag = 0;
        while($flag == 0)
        { 
          //分被取出第一个数
          $num1 = $l1->val;
          $num2 = $l2->val;
          if($l1->next == null && $l2->next == null)
          {
            $flag = 1;
          }
          //分别将指针向后移动一位
          if($flag == 0)
          {
            $l1 = $l1->next;
            $l2 = $l2->next;
          } 

          //计算出来两位的和，并且计算进位
          $num3 = $num1 + $num2 + $temp;
          $temp = intval($num3 / 10);
          $tempNode = new ListNode($num3 % 10);
          $l->next = $tempNode;
          $l = $l->next;
        }

        if($temp != 0)
        {
          $tempNode = new ListNode($temp % 10);
          $l->next = $tempNode;
          $l = $l->next;
        }

        if($l1->next == null)
        {
          $l = $l2->next;
        }
        else if($l2->next == null)
        {
          $l = $l1->next;
        }

        return $l3->next;


    }

}

/**
 *思路：
 *每次从两个链表中分别取出一个数，然后将二个数相加，然后将和整除10 ，将其对10 取模的结果当做下一个参数传入存入链表
 * 
 */

$l1 = new ListNode(2);
$l1->next = new ListNode(4);
$l1->next->next = new ListNode(3);


$l2 = new ListNode(5);
$l2->next = new ListNode(6);
$l2->next->next = new ListNode(4);

$solution = new Solution;
$result = $solution ->addTwoNumbers($l1,$l2); 


echo "<pre>";
print_r($result);
echo "</pre>";

/*

2->4->3    5->6->4     7->0->8


342 + 465 =  807      7->0->8
*/