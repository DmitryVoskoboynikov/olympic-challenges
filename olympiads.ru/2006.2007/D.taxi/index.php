<?php

// Проходит все тесты до 10.


// Количество сотрудников
//$n = 10;
$n = 6;

// Расстояние до дома для каждого сотрудника
//$distances = array('1' => 1, '2' => 2, '3' => 2, '4' => 1, '5' => 2, '6' => 1,
//    '7' => 1, '8' => 1, '9' => 1, '10' => 2);
$distances = array('1' => 999, '2' => 1000, '3' => 999, '4' => 999, '5' => 999, '6' => 999);

// Цена за один киллометр для каждого такси 1, 2, 3 и.т.д
//$prices = array('1' => 2, '2' => 2, '3' => 1, '4' => 1, '5' => 2, '6' => 1,
//    '7' => 1, '8' => 2, '9' => 1, '10' => 2);
$prices = array('1' => 10000, '2' => 10000, '3' => 10000, '4' => 9999, '5' => 10000, '6' => 10000);

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
//echo PHP_EOL;

// Решение из ответов
arsort($distances);
echo 'Дистанции в порядки убывания'.PHP_EOL;
print_r($distances); // 30 20 10

asort($prices);
echo 'Цены в порядке возростания'.PHP_EOL;
print_r($prices); // 20 30 50

foreach ($distances as $n => $distance) {
    $key = array_key_first($prices);
    unset($prices[$key]);
    //array_shift($prices);
    $output[] = $key;
}

$reversed = array_reverse($output);
foreach ($reversed as $k => $v) {
    echo $v. ' ';
}

// Конец решения из ответов
/**
function sum($mix, &$output) {

    foreach ($mix as $m => $values) {

        foreach ($values as $k => $sum) {
            if ($m == 1) {
                $output[$k] = $sum;
            } else {
                foreach ($output as $key => $summa) {
                    $keys = explode(" ", $key);
                    if (!in_array($k, $keys)) {
                        $output[$key . ' ' . $k] = $summa + $sum;
                    }
                }

            }

        }

        // Unset here
        foreach ($output as $key => $val)
        {
            $keys = explode(" ", $key);
            if (sizeof($keys) < $m) {
                unset($output[$key]);
            }
        }

    }

}

$output = [];
$out = [];
sum($mix, $output);

print_r($output);

asort($output);

$sum = $output[array_key_first($output)];
//echo array_key_first($out);

foreach ($output as $k => $s) {
    if ($s == $sum)
        echo $k.':'.$s.PHP_EOL;
}
**/

/**
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

        //foreach ($out as $o) {
        //    if ($sum > $o) {
        //        $sum -= $prices[$i];
        //        continue 2;
        //    }
        //}
        //if (in_array($sum, $out)) {
        //    $sum -= $prices[$i];
        //    continue;
        //}

        $output[$level] = $i;

        if ($level == $n) {
            //if (all_el_in_arr_are_diff($output)) {
                $out[implode(" ", $output)] = $sum;
                //echo implode(",", $output)." ";
                //echo $sum.PHP_EOL;
            //}
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
//echo array_key_first($out);

foreach ($out as $k => $s) {
    if ($s == $sum && $k == '2 7 4 10 6 8 5 9 1 3')
        echo $k.':'.$s.PHP_EOL;
}
 */