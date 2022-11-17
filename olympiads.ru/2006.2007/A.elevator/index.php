<?php

require_once("functions.php");

// количество этаже в доме
$m = 20;
// требуемый этаж
$n = 7;
//
$k = 4;

// стоимость спуска и поднятия на лифте за один этаж
$up = 200;
$down = 100;

$floors = floors($k, $m);
print_r($floors);

$floor_down = nearest_floor_down($n, $floors);
print_r($floor_down.PHP_EOL);

$floor_up = nearest_floor_up($n, $floors);
print_r($floor_up.PHP_EOL);

$price_from_down = ($n - $floor_down) * $up;
$price_from_up = ($floor_up - $n) * $down;

if ($price_from_down <= $price_from_up) {
    echo $price_from_down;
} else {
    echo $price_from_up;
}
