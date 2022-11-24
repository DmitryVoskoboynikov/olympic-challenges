<?php
// Количество сотрудников
$n = 7;

// Расстояние до дома для каждого сотрудника
$distances = array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6, '7' => 7);

// Цена за один киллометр для каждого такси 1, 2, 3 и.т.д
$prices = array('1' => 8, '2' => 5,  '3' => 6, '4' => 4, '5' => 8, '6' => 3, '7' => 7);

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