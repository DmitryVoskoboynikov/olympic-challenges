<?php

$taxis = array(1, 10, 19);
//print_r($taxis);

$min = 0;
$max = 0;
$mid = 0;

sort($taxis);
//print_r($taxis);
$min = $taxis[0];
$max = $taxis[count($taxis) - 1];
$mid = $taxis[1];

//echo $min.PHP_EOL;
//echo $mid.PHP_EOL;
//echo $max.PHP_EOL;

//Вычисляем на сколько max больше mid
$diff = $max - $mid;

if (($min + $diff == $mid) && ($mid == $max - $diff)) {
    echo $diff.PHP_EOL;
} else {
    echo 'IMPOSSIBLE'.PHP_EOL;
}