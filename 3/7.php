<?php
$tekstas = '1,2,57,9, 12';
$masyvas = explode(',', $tekstas);

$rezultatas = 0;
foreach ($masyvas as $raktas => $value) {
    $rezultatas += $value;
}

var_dump($rezultatas / count($masyvas));

$masyvas = [1,2,3,4,5,6,7,8,9];
$tekstas = implode('<br>', $masyvas);

var_dump($tekstas);