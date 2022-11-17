<?php

// функция определяющая этажи на которые ездит лифт
function floors($k, $m, $floors = array())
{
    $n = 0;
    $floor = 1;

    while ($floor <= $m) {
        $floors[] = $floor = $n * $k + 1;
        $n++;

        if (($n * $k + 1) > $m) break;
    }

    return $floors;
}

// функция определяет ближайший этаж с низу от требуемоего
function nearest_floor_down($n, $floors)
{
    $res = 1;

    foreach ($floors as $floor) {
        if ($floor <= $n) $res = $floor;
    }

    return $res;
}

// функция определяющая ближайший этаж с верху от требуемого
function nearest_floor_up($n, $floors)
{
    $res = 1;

    foreach ($floors as $floor) {
        if ($floor >= $n) {
            $res = $floor;
            break;
        }
    }

    return $res;
}
