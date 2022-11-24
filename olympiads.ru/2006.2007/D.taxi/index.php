<?php

// Проходит все тесты до 9.


// Количество сотрудников
$n = 10;

// Расстояние до дома для каждого сотрудника
$distances = array('1' => 425, '2' => 974, '3' => 236, '4' => 777, '5' => 622, '6' => 257,
    '7' => 655, '8' => 565, '9' => 651, '10' => 348);

// Цена за один киллометр для каждого такси 1, 2, 3 и.т.д
$prices = array('1' => 642, '2' => 4478, '3' => 8517, '4' => 8429, '5' => 6188, '6' => 3285,
    '7' => 4205, '8' => 3984, '9' => 6083, '10' => 9156);

// Для начала попробуем перебрать все варианты и вывести самый дешевый
function prices($distances, $prices, $output = []) {
    foreach ($distances as $i => $dist) {
        foreach ($prices as $y => $price) {
            $output[$i][$y] = $dist * $price;
        }
    }

    return $output;
}

$mix = prices($distances, $prices);
//print_r($mix);
//die();
//echo PHP_EOL;

function all_el_in_arr_are_diff($array) {
    $in = array();

    foreach ($array as $ar) {
        if (in_array($ar, $in)) {
            return false;
        } else {
            $in[] = $ar;
        }
    }

    return true;
}

function sum($prices, $n, $level = 1, $mix, $sum, $output, &$out) {
    for ($i = 1; $i <= $n; $i++) {
        if (in_array($i, $output)) {
            continue;
        }

        $sum += $prices[$i];

        $output[$level] = $i;

        if ($level == $n) {
            if (all_el_in_arr_are_diff($output)) {
                $out[implode(" ", $output)] = $sum;
                //echo implode(",", $output)." ";
                //echo $sum.PHP_EOL;
            }
        } else {
            sum($mix[$level+1], $n, $level + 1, $mix, $sum, $output, $out);
        }

        $sum -= $prices[$i];
    }
}

$out = array();
sum($mix[1], $n, 1, $mix, 0, [], $out);

//print_r($out);

asort($out);
//print_r($out);

$sum = $out[array_key_first($out)];

foreach ($out as $k => $s) {
    if ($s == $sum)
        echo $k.':'.$s.PHP_EOL;
}