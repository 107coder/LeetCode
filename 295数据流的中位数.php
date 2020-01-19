<?php

class MedianFinder {
    /**
     * initialize your data structure here.
     */
    private $stream_max;
    private $stream_min;
    private $midArr;
    function __construct() {
        $this->stream_max = [];
        $this->stream_min =[];
        $this->midArr = [];
    }
  
    /**
     * @param Integer $num
     * @return NULL
     */
    function addNum($num) {
        if((count($this->stream_max)+count($this->stream_min))%2==0){
			array_push($this->stream_min, $num);
			$this->bulidMinHeap($this->stream_min);
			array_push($this->stream_max, array_shift($this->stream_min));
			$this->bulidMaxHeap($this->stream_max);
		}else{
			array_push($this->stream_max, $num);
			$this->bulidMaxHeap($this->stream_max);
			array_push($this->stream_min, array_shift($this->stream_max));
			$this->bulidMinHeap($this->stream_min);
		}
    }
  
    /**
     * @return Float
     */
    function findMedian() {
        if((count($this->stream_max)+count($this->stream_min))%2==0){
			$mid = ($this->stream_max[0]+$this->stream_min[0])/2;
		}else{
			$mid = $this->stream_max[0];
		}
		$mid = number_format($mid,1);
    	 return $mid;
    }


	 public function bulidMaxHeap(&$arr){  // 建立大顶堆
		
		$len = count($arr);
		for ($i=intval($len/2); $i>=0; $i--) { 
			$this->heapify($arr,$i,$len);
		}
	}
	 private function bulidMinHeap(&$arr){  // 建立大顶堆
		
		$len = count($arr);
		for ($i=intval($len/2); $i>=0; $i--) { 
			$this->heapify($arr,$i,$len,'small');
		}
	}
	private function heapify(&$arr,$i,$len,$type='big'){ // 堆调整
		$left = 2*$i + 1;
		$right = 2*$i + 2;
		$largest = $i;

		if($type == 'big'){
			if($left<$len && $arr[$left]>$arr[$largest]){
				$largest = $left;
			}

			if($right<$len && $arr[$right]>$arr[$largest]){
				$largest = $right;
			}
		}else{
			if($left<$len && $arr[$left]<$arr[$largest]){
				$largest = $left;
			}

			if($right<$len && $arr[$right]<$arr[$largest]){
				$largest = $right;
			}
		}
		

		if($largest != $i){
			$this->swap($arr,$i,$largest);
			$this->heapify($arr,$largest,$len);
		}
	}

	private function swap(&$arr,$i,$j){
		$temp = $arr[$i];
		$arr[$i] = $arr[$j];
		$arr[$j] = $temp;
	}
}

$s = new MedianFinder();
$s->addNum(2);
$s->addNum(5);
$s->addNum(4);
$s->addNum(3);
$s->addNum(6);

$res = $s->findMedian();

print_r($res);