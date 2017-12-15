<?php
$x = 5;
$y = 6;
$kartotiniai1 = [];
$kartotiniai2 = [];

function onceAgain($x, $y, $start, &$kartotiniai1, &$kartotiniai2) {
    $z = null;

    for ($i = $start; $i < ($start + 5); $i++) {
        $kartotiniai1[] = $x * $i;
    }


    for ($i = $start; $i < ($start + 5); $i++) {
        $kartotiniai2[] = $y * $i;
    }

    for ($i = 0; $i < count($kartotiniai1); $i++) {
        $a = $kartotiniai1[$i];

        for ($k = 0; $k < count($kartotiniai2); $k++) {
            $b = $kartotiniai2[$k];
            if ($a == $b) {
                $z = $a;
                break;
            }
        }
    }

    if ($start > 1000) {
        return 'Too much for me to handle...';
    }

    return $z ? $z : onceAgain($x, $y, $start + 5, $kartotiniai1, $kartotiniai2);
}
$ats = onceAgain($x, $y, 1, $kartotiniai1, $kartotiniai2);
if ($ats) {
    echo $ats;
} else {
    echo 'Nop';
}

