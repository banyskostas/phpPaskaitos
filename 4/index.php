<?php
$arr = [1,1,1,1,1,1,2,1,1,1,1,1,"a" => 1,1,1,1,1,1];
$x = 0;
foreach ($arr as $item) {
    var_dump($item);

    if ($item == 2) {
        var_dump('Radom');
        break;
    }
    $x++;
}

for ($x = 0; $x <= 20; $x++) {
    if (isset($arr[$x])) {
        if ($arr[$x] == 2) {
            var_dump('Radom');
        }
    }
}








