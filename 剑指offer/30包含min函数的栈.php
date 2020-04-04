<?php
/**
 * Create by PhpStorm.
 * FileName: 30包含min函数的栈.php
 * User: CSF
 * Date: 2020/4/4
 * Time: 10:43
 */

class MinStack
{
    private $stack;
    private $len;
    private $min = NULL;

    /**
     * initialize your data structure here.
     */
    function __construct()
    {
        $this->stack = [];
        $this->len = 0;
        $this->min = NULL;
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->stack[] = $x;
        $this->len++;

        if ($this->min === NULL) {
            $this->min = $x;
        } else {
            $this->min = $this->min > $x ? $x : $this->min;
        }
        return NULL;
    }

    /**
     * @return NULL
     */
    function pop()
    {
        if ($this->len > 0) {
            $top = array_pop($this->stack);
            $this->len--;
            if ($top <= $this->min) {
                $this->min = $this->len > 0 ? $this->stack[0] : NULL;
                foreach ($this->stack as $value) {
                    $this->min = $this->min > $value ? $value : $this->min;
                }
            }
        }
        return NULL;
    }

    /**
     * @return Integer
     */
    function top()
    {
        if ($this->len > 0) {
            return $this->stack[$this->len - 1];
        } else {
            return NULL;
        }
    }

    /**
     * @return Integer
     */
    function min()
    {
        return $this->min;
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->min();
 */

$obj = new MinStack();

//$obj->push(-2);
//$obj->push(0);
//$obj->push(-3);

for ($i = 0; $i < 500; $i ++){
//    $obj->push($i);
}
$obj->push(0);
$obj->push(1);
echo "min = " . $obj->min() . "\n";
//$obj->pop();
//echo "top = " . $obj->top() . PHP_EOL;
//echo "min = " . $obj->min() . PHP_EOL;