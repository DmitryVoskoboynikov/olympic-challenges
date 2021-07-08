<?php

require_once("autoloader.php");


$input = array(2, 2, 3, 3, 3);
$res = array();

foreach ($input as $value)
{
    $res[$value] = $res[$value] + 1;
}

print_r($res);

// all numbers is different, then size of $res == 5
if (sizeof($res) == 5)
{
    echo "all different";
    return;
}

// size of $res is 4, one pair
if (sizeof($res) == 4)
{
    echo "one pair";
    return;
}

if (sizeof($res) == 3)
{
    foreach ($res as $key => $value)
    {
        if ($value == 3) {
            echo "three of kind";
            return;
        }
    }

    echo "two pair";
    return;
}

if (sizeof($res) == 2)
{
    foreach ($res as $key => $value)
    {
        if ($value == 4) {
            echo "four of kind";
            return;
        }
    }

    echo "full house";
    return;
}

if (sizeof($res) == 1)
{
    echo "poker";
    return;
}
