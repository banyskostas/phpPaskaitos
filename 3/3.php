<?php
$spalvos = array('BlanchedAlmond', 'CadetBlue', 'BurlyWood',
    'DarkOliveGreen', 'HotPink', 'PapayaWhip');

?>

<table style="border: 1px solid black;">
    <tbody>
    <?php
    foreach ($spalvos as $raktas => $value) {
        echo '' . $value . '';
        echo '<tr><td style="background-color: ' . $value . ';">' . $value . '</td></tr>';
        echo "<tr><td style=\"background-color: $value;\">$value</td></tr>";
    }
    ?>
    </tbody>
</table>





