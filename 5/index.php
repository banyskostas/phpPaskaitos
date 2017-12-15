<?php
$arr = []; // type array
$arr["a"] = 1;
$arr[] = "b";
// Dump: ["a" => 1, 0 => "b"]


$a = '1,2,3,4,5'; // string
$b = 1.2; // float
$c = '3'; // string
$d = 3; // int (integer)

$a = 0;
$b = '0';

$a = $b = $c = [];
// Dump: $a = []; $b = []; $c = [];

// var_dump(); continues to process
// die(); stops processing
// exit; stops processing


if ($a > $b) {
    echo 'Lygus';
} else {
    echo 'Nelygus';
}

$condition1 = 1;
$condition2 = '3';

if (($condition1 && $condition2 == 3) || ($condition2 == 2 && !$condition1)) {
    //...
}
if (((bool)$condition1 == true && $condition2 == 3) || ($condition2 == 2 && (bool)$condition1 == false)) {
    //...
}
// $condition1 AND $condition2 == 3 OR
$a = 1;
$b = 1;
$c = "tekstas";
$d = "tekstas2";

$z = ($a > $b) ? $c : $d;

// Just like
if ($a > $b) {
    $z = $c;
} else {
    $z = $d;
}










