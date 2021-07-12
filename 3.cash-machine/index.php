<?php

$nominals = array(1, 3, 7, 12, 32);
$s = 40;
$output = "";

$nominals = array_reverse($nominals);
foreach ($nominals as $banknote)
{
    $a = floor($s/$banknote);

    if ($a > 0)
    {
        $output .= strval($a) . "x" . strval($banknote) . " ";

        $s = $s - ($banknote * $a);
    }

    if ($s == 0)
    {
        echo $output;
        exit;
    }
}

echo "impossible";
