<?php 

$arr = array(1,1,2,3,3,3,1,1,1,1,1,4,5);

function zongshu($array)
{
	$zarr = [];

	foreach ($array as $key => $value) {
		if(array_key_exists($value, $zarr))
		{
			$zarr[$value]++;
		}
		else
		{
			$zarr[$value] = 1;
		}
	}

	print_r(array_search(max($zarr), $zarr));
	echo PHP_EOL;
	print_r(max($zarr));
}

zongshu($arr);
