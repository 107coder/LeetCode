<?php

function Find($target, $array)
{

    foreach ($array as $key => $value) {
    	$result = in_array($target, $value);
		  if($result){
        return true;
      }
    }
    return false;
}  

/*
 * ���������㷨˼��
 * �㷨˼�룺
 * �����½ǵ�Ԫ�ؿ�ʼ�Ƚϣ�
 * ���target���ڸ�Ԫ�أ������ƶ�
 * ���targetС�ڸ�Ԫ�أ������ƶ�
 */
function Find_2($target, $array)
{
  //�����ά���������������
  $len1 = count($array);
  $len2 = count($array[0]);

  $x = $len1-1;
  $y = 0;
  while($x>=0 && $y<$len2)
  {
    if($target == $array[$x][$y])
    {
      return true;
    }
    else if($target < $array[$x][$y])
    {
      $x--;
    }
    else if($target > $array[$x][$y])
    {
      $y++;
    }
  }
  return false;
}
$array = [
  			[1,2,3,4,5],
  			[6,7,8,9,10],
  			[11,12,13,14,15],
  			[16,17,18,19,20],
  			[21,22,23,24,25]
  		 ];
$target = 33;
Find($target,$array);


$r = Find_2($target,$array);
var_dump($r);