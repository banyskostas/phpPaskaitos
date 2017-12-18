<?php

$arr = [1,2,3,4,5,6,7,8,9];
$arr1 = [0 => 1, 1 => 2,3,4,5,6,7,8,9];
$arr2 = ["tekstas" => 1, "tekstas2" => 2,3,4,5,6,7,8,9];
$arr3 = [
    [1,2,3],
    [1,2,3],
    "ne array"
];

foreach ($arr3 as $item) {
    if (is_array($item)) {
        foreach ($item as $item1) {
            var_dump($item1);
        }
    } else {
        var_dump($item);
    }
}