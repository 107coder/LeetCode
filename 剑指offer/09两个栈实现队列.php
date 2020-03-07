<?php
class CQueue {
    private $stackIn;
    private $stackOut;
    /**
     */
    function __construct() {
        $this->stackIn = [];
        $this->stackOut = [];
    }

    /**
     * @param Integer $value
     * @return NULL
     */
    function appendTail($value) {
        array_push($this->stackIn,$value);
        return NULL;
    }

    /**
     * @return Integer
     */
    function deleteHead() {
        if(!$this->stackOut){
            while($this->stackIn){
                array_push($this->stackOut,array_shift($this->stackIn));
            }
        }

        if($this->stackOut){
            return array_shift($this->stackOut);
        }else{
            return -1;
        }
    }
}

/**
 * Your CQueue object will be instantiated and called as such:
 * $obj = CQueue();
 * $obj->appendTail($value);
 * $ret_2 = $obj->deleteHead();
 */