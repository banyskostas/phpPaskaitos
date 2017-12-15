<?php
$colis = 2.54;
$cmInCol = 0.39;
?>

<table>
    <thead>
    <tr>
        <th>Col.</th>
        <th>Cm.</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $x = 0;
        for ($i = 1; $i <= 10; $i++) {
            $x += $colis;
            echo "<tr><td>$i</td><td>$x</td></tr>";
        }
    ?>
    </tbody>
</table>

<table>
    <thead>
    <tr>
        <th>Col.</th>
        <th>Cm.</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $x = 0;
    for ($i = 1; $i <= 10; $i++) {
        $x += $cmInCol;
        echo "<tr><td>$i</td><td>$x</td></tr>";
    }
    ?>
    </tbody>
</table>








