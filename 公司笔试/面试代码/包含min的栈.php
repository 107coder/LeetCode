<?php
/**
 * Create by PhpStorm.
 * FileName: 包含min的栈.php
 * User: CSF
 * Date: 2020/4/24
 * Time: 20:30
 */

/**
 * 字节跳动一面：第一道笔试题
 */
class StackMin
{
    private $stack = [];
    private $min = null;
    private $minStack = [];

    public function push($x)
    {
        if (empty($this->stack)) {
            $this->min = $x;
            $this->stack[] = $x;
            $this->minStack[] = $x;
        } else {
            $this->min = $this->min > $x ? $x : $this->min;
            $this->minStack[] = $this->min;
        }

    }

    public function pop()
    {
        if (empty($this->stack)) {
            return null;
        } else {
            array_pop($this->minStack);
            return array_pop($this->stack);
        }
    }

    public function getMin()
    {
        $len = count($this->minStack);
        if ($len > 0) {
            return $this->minStack[$len - 1];
        } else {
            return null;
        }
    }
}

$obj = new StackMin;

$obj->push(4);
$obj->push(3);
$obj->push(2);
$obj->push(1);

$obj->pop();
$res = $obj->getMin();

print_r($res);