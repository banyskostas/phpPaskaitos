<?php

function laipsniu($x, $n)
{
    var_dump('$x' . $x . '<br>');
    var_dump('$n' . $n . '<br>');

    $z = null;
    if ($n >= 1) {
        $z = $x * laipsniu($x, $n - 1) * $x;
    } else {
        $z = 1;
    }

    var_dump('$z' . $z . '<br><br>');
    return $z;
}

var_dump(laipsniu(2, 2));

$data = [
    0 => 'batai',
    1 => [
        0 => 'kelnes',
        1 => [1,2,3]
    ],
    2 => 'kepure',
    3 => [
        0 => [4,5,6],
        1 => 'striuke'
    ]
];

function getData($data) {
    $str = '';

    foreach ($data as $item) {
        if (!is_array($item)) {
            $str .= $item;
        } else {
            $str .= getData($item);
        }
    }

    return $str;
}

var_dump(getData($data));