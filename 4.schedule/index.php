<?php

function cmp($a, $b)
{
    if ($a[0] == $b[0]) {
        return 0;
    }
    return ($a[0] < $b[0]) ? -1 : 1;
}

function createChain(&$chains, $event, $events, $n)
{
    $s = $event[0]; //время начала события
    $t = $event[1]; //время окончания события

    $i = 0;
    $events_tmp = array();

    for ($i = 1; $i <= $n; $i++)
    {
        if ($t <= $events[$i][0])
        {
            $events_tmp[$i] = $events[$i];
        }
    }

    if (!empty($events_tmp)) {
        uasort($events_tmp, "cmp");

        $firstKey = array_key_first($events_tmp);
        $chains[$firstKey] = $events_tmp[$firstKey];

        createChain($chains, $events_tmp[$firstKey], $events, $n);
    }
}

$n = 5;

$events = array(
   1 => array(6, 7),
   2 => array(1, 3),
   3 => array(1, 4),
   4 => array(4, 5),
   5 => array(5, 6)
);

$chains = array();

for ($i = 1; $i <= $n; $i++) {
    $chains[$i][$i] = $events[$i];

    createChain($chains[$i], $events[$i], $events, $n);
}

print_r($chains);

$maxSize = 0;
$k = 1;
foreach ($chains as $i => $chain)
{
    $size = sizeof($chain);

    if ($size > $maxSize) {
        $maxSize = $size;
        $k = $i;
    }
}

echo implode(" ", (array_keys($chains[$k])));