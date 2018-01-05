<?php

/**
 * @param int $a
 * @param int $b
 * @return null
 */
function dbd($a, $b) {
    $dbd = null;
    if ($a == $b) {
        $dbd = $a;
    }
    if ($a < $b) {
        $dbd = dbd($a, $b-$a);
    }
    if ($a > $b) {
        $dbd = dbd($a - $b, $b);
    }
    return $dbd;
}

echo dbd(441, 42); // 21
