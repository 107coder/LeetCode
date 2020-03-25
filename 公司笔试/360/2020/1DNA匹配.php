<?php
/**
 * Create by PhpStorm.
 * FileName: 1DNA匹配.php
 * User: CSF
 * Date: 2020/3/24
 * Time: 20:33
 */

/*
 * ATTTAA
 * TTAATT
 * 3
*/

$handle = fopen("php://stdin", "r");

$dna1 = rtrim(fgets($handle));
$dna2 = rtrim(fgets($handle));

fclose($handle);

function fixDNA($dna1,$dna2){
    $A = 0;
    $T = 0;
    for($i = 0; $i < strlen($dna1); $i++){
        if($dna1[$i] != $dna2[$i]){
            if($dna1[$i] == 'A') $A++;
            else $T++;
        }
    }
    echo max($A,$T);
}

fixDNA($dna1,$dna2);