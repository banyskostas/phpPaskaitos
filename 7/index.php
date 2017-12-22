<?php
$z = 0;

$h = kelimasKvadratu($z, 10, true);

function kelimasKvadratu(&$z, $x, $bool = false) {
    $z = 1000;

    $x += $x;

    if ($bool) {
        $x *= 10;
    }

    return $x;
}

var_dump($z);
var_dump($h);

function calcFactorial($x) {
    // Predefined variables
    $factorial = 0;

    // Ensure integer
    $x = intval($x);

    if ($x) {
        for ($i = $x; $i > 1; $i--) {
            if ($factorial === 0) {
                $factorial = $i;
                continue;
            }
            $factorial *= $i;
        }
    }

    return $factorial;
}

var_dump(calcFactorial(10));

/**
 * Decides is year leap or not
 *
 * @param int $x
 * @return bool
 */
function isYearLeap($x) {
    $bool = false;

    if ($x % 100 == 0) {
        //simtmetis
        if ($x % 400 == 0) {
            $bool = true;
        }
    } else if ($x % 4 == 0) {
        $bool = true;
    }
    return $bool;
}

$head = generateHead(true, $title, $cssFiles, $path);

// Predefined variable
$myYear = 17;

$html = "Tavo metai: $myYear";

if (isYearLeap($myYear)) {
    $html .= " keliamieji";
} else {
    $html .= " nekeliamieji";
}
echo  $html;