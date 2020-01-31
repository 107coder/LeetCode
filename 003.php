<?php 
/**
 * 3. 无重复字符的最长子串
 */
 
 class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $maxlen = 0;


        $length = strlen($s);
        for($i=0; $i < $length; $i++){
        	for($j=1; $j <= $length-$i; $j++)
        	{

		        $str = substr($s, $i, $j);
		        // $str = $s;
		        echo $str."<br/>";
		        $len = strlen($str);
		        $strEnd = substr($str, $len-1,1);
		        $str = substr($str, 0, $len-1);
		        $ok = strpos($str,$strEnd);

		        var_dump($ok);
		        echo '<br/>';

		        if($ok)
		        {
		        	echo 'herh';
		        	$maxlen = $len-1;
		        	break;
		        }
		        else
		        {
		        	$maxlen = $len;
		        }
        	}
		}


        $result = $maxlen;
        return $result;
    }
}


// $s = 'abcabcbb';
$s = 'abc';

$solution = new Solution;
$result = $solution ->lengthOfLongestSubstring($s); 

echo $result;

/**
 * 1295138451
 *
 *wq15515095381
 * 
 */


/**
 * a b c d e 
 *
 * $length = 5
 * $i = 0 1 2 3 4
 *
 * $j = 5 4 3 2 1 
 */
