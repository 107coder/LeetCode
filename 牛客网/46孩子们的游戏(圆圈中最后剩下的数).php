<?php
/*
题目描述
每年六一儿童节,牛客都会准备一些小礼物去看望孤儿院的小朋友,今年亦是如此。HF作为牛客的资深元老,自然也准备了一些小游戏。其中,有个游戏是这样的:首先,让小朋友们围成一个大圈。然后,他随机指定一个数m,让编号为0的小朋友开始报数。每次喊到m-1的那个小朋友要出列唱首歌,然后可以在礼品箱中任意的挑选礼物,并且不再回到圈中,从他的下一个小朋友开始,继续0...m-1报数....这样下去....直到剩下最后一个小朋友,可以不用表演,并且拿到牛客名贵的“名侦探柯南”典藏版(名额有限哦!!^_^)。请你试着想下,哪个小朋友会得到这份礼品呢？(注：小朋友的编号是从0到n-1)

如果没有小朋友，请返回-1
这个就是猴子选大王的问题吧
*/
function LastRemaining_Solution($n, $m)
{
    // write code here
    if($n < 1 || $m>$n){
    	return -1;
    }
    $children = range(0, $n-1);
    $c = 0;
    $i = 0;
    while (count($children) > 1) {

    	if($i == $m-1){
    		unset($children[$c]);
    	}
    	$i = ($i+1)%$m;
    	$c = ($c+1)%$n;
    	while(!isset($children[$c])){
    		$c = ($c+1)%$n;
    	}

    }

    return array_pop($children);
}

$n = 100;
$m = 5;

$result = LastRemaining_Solution($n,$m);

print_r($result);