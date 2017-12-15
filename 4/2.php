<?php
$metai1 = 1900;
$metai2 = 2000;

if (2000 % 400 == 0) {
    echo 'Keliamieji';
} else {
    echo 'Nekeliamieji';
}

$keliamujuMetuKiekis = 0;
for ($i = $metai1; $i <= $metai2; $i++) {
    if ($i % 100 == 0) {
        //simtmetis
        if ($i % 400 == 0) {
            $keliamujuMetuKiekis++;
        }

    } else if ($i % 4 == 0) {
        $keliamujuMetuKiekis++;
    }
}

echo $keliamujuMetuKiekis;

$x = 1;

do {
    echo "The number is: $x <br>";
    $x++;
} while ($x <= 5);

