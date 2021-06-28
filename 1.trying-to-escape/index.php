<?php

require_once("autoloader.php");

//входная карта комнат
$map = array();
$map[] = array(1, 1, 1, 0, 1);
$map[] = array(1, 0, 1, 0, 1);
$map[] = array(1, 0, 1, 1, 1);

//first room
$startRoom = new \Machine\Room(2, 0);

$processor = new \Machine\Processor($map);
$processor->step($startRoom);

echo "Количество маршрутов: " . \Machine\Registry::getNumberOfWays() . PHP_EOL;
