<?php
$a = 1000;
$b = 10;
$c = 15000;
$z = $a;

$d = $a * ($b / 100);
$k = $c - $a;
$r = $k / $d;


$arr = [];
do {
    $z += ($z * ($b / 100));
    $arr[] = $z;
} while ($z < $c);

?>

<table>
    <thead>
    <tr>
        <th>Menuo</th>
        <th>Atlyginimas</th>
    </tr>
    <tbody>
        <?php
        $i = 1;
        foreach ($arr as $item) {
            echo '<tr><td>'.$i.'</td><td>'.round($item, 2).' cnt</td></tr>';
            $i++;
        }
        ?>
    </tbody>
    </thead>
</table>
