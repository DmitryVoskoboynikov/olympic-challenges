<?php

require_once("functions.php");

// количество этаже в доме
$m = 20;
if ($m < 2 or $m > 100) die("Параметр М не подходит условиям".PHP_EOL);
// требуемый этаж
$n = 7;
if ($n < 2 or $n > $m) die("Параметр N не подходит условиям".PHP_EOL);
//
$k = 4;
if (($k > $m - 1) or ($k < 2)) die("Параметр К не подходит условиям".PHP_EOL);

// стоимость спуска и поднятия на лифте за один этаж
$up = 200;
$down = 100;

// первым делом определяем этажи на которые ездит лифт
$floors = floors($k, $m);
print_r($floors);

// затем определяем ближайший этаж снизу на который приезжает лифт
$floor_down = nearest_floor_down($n, $floors);
print_r($floor_down.PHP_EOL);

// затем определяем ближайший этаж сверху на который приезжает лифт
$floor_up = nearest_floor_up($n, $floors);
print_r($floor_up.PHP_EOL);

$price_from_down = ($n - $floor_down) * $up;
$price_from_up = ($floor_up - $n) * $down;

if ($price_from_down <= $price_from_up) {
    echo $price_from_down;
} else {
    echo $price_from_up;
}
