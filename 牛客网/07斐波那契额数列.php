<?php

function Fibonacci($n)
{
	if($n == 0)
		return 0;
    else if($n == 1)
    	return 1;
    else 
    	return Fibonacci($n-1) + Fibonacci($n-2);
}


function Fibonacci_2($n)
{

	if($n == 0)
		return 0;
    else if($n == 1)
    	return 1;
    else 
    {
    	$a=0;
    	$b=1;
    	for($i=1; $i<$n;$i++)
    	{
    		$result = $a+$b;
    		$a = $b;
    		$b = $result;
    	}
    	return $result;
    }
}
for($i = 0; $i<10; $i++)
echo Fibonacci_2($i).PHP_EOL;

