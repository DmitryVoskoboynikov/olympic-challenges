<?php
//staff
/**
function addEvent($chain, $schedule)
{
    $t = $chain
}
*/

function createChain(&$chains, $event, $events)
{
    $s = $event[0]; //время начала события
    $t = $event[1]; //время окончания события

    $i = 0;
    foreach ($events as $event_from_events)
    {
        $i= $i + 1;
        if ($t <= $event_from_events[0])
        {
            $chains[$i] = $event_from_events;
            createChain($chains, $event_from_events, $events);
            break;
        }
    }

}

$n = 5;

$events = array(
   1 => array(2, 6),
   2 => array(1, 3),
   3 => array(1, 4),
   4 => array(4, 5),
   5 => array(5, 6)
);

$chains = array();

for ($i = 1; $i <= $n; $i++) {
    $chains[$i][$i] = $events[$i];

    createChain($chains[$i], $events[$i], $events);
}

print_r($chains);
