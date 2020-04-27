<?php
/**
 * Create by PhpStorm.
 * FileName: 4两个栈实现队列.php
 * User: CSF
 * Date: 2020/4/26
 * Time: 21:22
 */


function str2arr($str)
{
    if ($str == '') return [];
    return explode(' ', $str);
}

$handle = fopen("php://stdin", "r");

$k = (int)rtrim(fgets($handle));
$queue = new myQueue();
while ($k != 0) {
    $k--;
    $action = rtrim(fgets($handle));
    $action = str2arr($action);
    switch ($action[0]) {
        case 'add':
            $x = $action[1];
            $queue->push($x);
            break;
        case 'peek':
            echo $queue->top() . PHP_EOL;
            break;
        case 'poll':
            $queue->pop();
            break;
        default:
            break;
    }
}
unset($queue);


fclose($handle);

class myQueue
{
    public $stack1 = [];
    public $stack2 = [];

    public function push($x)
    {
        $this->stack1[] = $x;
    }

    public function pop()
    {
        if (!$this->stack2) {
           while ($this->stack1){
               $this->stack2[] = array_pop($this->stack1);
           }
        }
        array_pop($this->stack2);
    }

    public function top()
    {
        if (!$this->stack2) {
            while ($this->stack1){
                $this->stack2[] = array_pop($this->stack1);
            }
        }
        $res = array_pop($this->stack2);

        $this->stack2[] = $res;
        return $res;
    }

}


/**
 * Create by PhpStorm.
 * FileName: 4两个栈实现队列.php
 * User: CSF
 * Date: 2020/4/26
 * Time: 21:22
 */

//
//function str2arr($str)
//{
//    if ($str == '') return [];
//    return explode(' ', $str);
//}
//
//$handle = fopen("php://stdin", "r");
//
//$k = (int)rtrim(fgets($handle));
//$queue = new myQueue();
//while ($k != 0) {
//    $k--;
//    $action = rtrim(fgets($handle));
//    $action = str2arr($action);
//    switch ($action[0]) {
//        case 'add':
//            $x = $action[1];
//            $queue->push($x);
//            break;
//        case 'peek':
//            echo $queue->top() . PHP_EOL;
//            break;
//        case 'poll':
//            $res = $queue->pop();
//            if ($res == -1) {
//                echo $res . PHP_EOL;
//            }
//            break;
//        default:
//            break;
//    }
//}
//unset($queue);
//
//
//fclose($handle);
//
//class myQueue
//{
//    public $queue = [];
//
//    public function push($x)
//    {
//        $this->queue[] = $x;
//    }
//
//    public function pop()
//    {
//        if ($this->queue) {
//            array_shift($this->queue);
//        } else {
//            return -1;
//        }
//    }
//
//    public function top()
//    {
//        if ($this->queue) {
//            return $this->queue[0];
//        } else {
//            return -1;
//        }
//    }
//
//    public function size()
//    {
//        return count($this->queue);
//    }
//
//    public function clear()
//    {
//        $this->queue = [];
//    }
//}