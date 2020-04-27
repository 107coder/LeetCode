<?php
/**
 * Create by PhpStorm.
 * FileName: 1队列操作.php
 * User: CSF
 * Date: 2020/4/26
 * Time: 20:02
 */

function str2arr($str)
{
    if ($str == '') return [];
    return explode(' ', $str);
}

$handle = fopen("php://stdin", "r");

$n = (int)rtrim(fgets($handle));

while ($n != 0){
    $n--;
    $k = (int)rtrim(fgets($handle));
    $queue = new myQueue();
    while ($k != 0){
        $k--;
        $action = rtrim(fgets($handle));
        $action = str2arr($action);
        switch ($action[0]) {
            case 'PUSH':
                $x = $action[1];
                $queue->push($x);
                break;
            case 'TOP':
                echo $queue->top() . PHP_EOL;
                break;
            case 'POP':
                $res = $queue->pop();
                if ($res == -1) {
                    echo $res . PHP_EOL;
                }
                break;
            case 'SIZE':
                echo $queue->size() . PHP_EOL;
                break;
            case 'CLEAR':
                $queue->clear();
                break;
            default:
                break;
        }
    }
    unset($queue);
}

fclose($handle);

class myQueue{
    public $queue = [];

    public function push($x){
        $this->queue[] = $x;
    }

    public function pop(){
        if($this->queue){
            array_shift($this->queue);
        }else{
            return -1;
        }
    }

    public function top(){
        if($this->queue){
            return $this->queue[0];
        }else{
            return -1;
        }
    }

    public function size(){
        return count($this->queue);
    }

    public function clear(){
        $this->queue = [];
    }
}