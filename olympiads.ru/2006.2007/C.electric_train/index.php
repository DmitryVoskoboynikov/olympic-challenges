<?php

$start_time = '17:26';
$num_of_station = 50;
$between_array = array(
    471,
    77,
    371,
    173,
    99,
    122,
    460,
    194,
    292,
    179,
    405,
    208,
    334,
    314,
    141,
    342,
    453,
    65,
    201,
    309,
    339,
    357,
    478,
    321,
    158,
    437,
    148,
    291,
    45,
    157,
    272,
    451,
    136,
    11,
    232,
    113,
    378,
    6,
    271,
    463,
    433,
    17,
    33,
    353,
    139,
    467,
    126,
    236,
    125
);

$time = explode(":", $start_time);

$time[0] = (int)$time[0];
$time[1] = (int)$time[1];
//print_r($time);

//приведем время отпраление поезда из часов и минут в минуты
$start_time_in_minutes = $time[0] * 60 + $time[1];
//echo $start_time_in_minutes.PHP_EOL;

echo $start_time.PHP_EOL;

for ($n = 0; $n < $num_of_station - 1; $n++) {
    $add_in_minutes = $between_array[$n];
    $start_time_in_minutes = $start_time_in_minutes + $add_in_minutes;

    while (intdiv($start_time_in_minutes, 60) > 23) {
        $start_time_in_minutes -= 24 * 60;
    }

    echo str_pad(intdiv($start_time_in_minutes, 60), 2, '0', STR_PAD_LEFT) .
        ':' .
        str_pad($start_time_in_minutes % 60, 2, '0', STR_PAD_LEFT) . PHP_EOL;
}
