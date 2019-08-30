<?php
$t1 = microtime(true);
// ... 执行代码 ...
sleep(2);
$t2 = microtime(true);
echo '耗时'.round($t2-$t1,3).'秒<br>';
echo 'Now memory_get_usage: ' . memory_get_usage() . '<br />';