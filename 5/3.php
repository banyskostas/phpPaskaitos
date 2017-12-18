<?php

const GOOD_TEMP_FROM = 36.40;
const GOOD_TEMP_TILL = 37;

// Predefined variables
$hours = [];
$temps = [];
$closestTemps = [];
$normalTemps = [];
$notEmptyInput = false;
$notEmptyInput2 = false;
$highest = [
    'key' => null,
    'val' => null,
];

if (isset($_GET["hours"]) && isset($_GET["temps"])) {
    $hours = explode(',', $_GET["hours"]);
    $temps = explode(',', $_GET["temps"]);

    $notEmptyInput = (bool)count($hours);
    $notEmptyInput2 = (bool)count($temps);

    if ($notEmptyInput && $notEmptyInput2) {

        for ($i = 0; $i < count($temps); $i++) {
            if (is_null($highest['val']) || $highest['val'] < $temps[$i]) {
                $highest['val'] = $temps[$i];
                $highest['key'] = $i;
            }
        }

        $closestTemps = [];
        for ($i = 0; $i < count($temps); $i++) {
            $val = (float)$temps[$i];
            if ($val == $highest['val']) {
                continue;
            }

            if ((float)$highest['val'] - 0.5 <= $val) {
                $closestTemps[] = ['key' => $i, 'val' => $val];
            }
        }

        $normalTemps = [];
        for ($i = 0; $i < count($temps); $i++) {
            $val = $temps[$i];
            if ($val == $highest['val']) {
                continue;
            }
            if (GOOD_TEMP_FROM <= $val && $val <= GOOD_TEMP_TILL) {
                $normalTemps[] = ['key' => $i, 'val' => $val];
            }
        }
    }
}


?>

<form action="3.php" method="get">
    <input type="text" name="hours">
    <input type="text" name="temps">
    <button type="submit">Submit</button>
</form>

<?php
if ($notEmptyInput && $notEmptyInput2) {
    ?>
    <h2>Auksciausia temperatura</h2>
    <table>
        <thead>
        <tr>
            <th>Valanda</th>
            <th>Temperatura</th>
        </tr>
        </thead>
        <tbody>
        <?php

        echo "<tr>";
        if (!is_null($highest['key']) && isset($hours[$highest['key']])) {
            echo "<td>" . $hours[$highest['key']] . "</td>";
        } else {
            echo "<td>-</td>";
        }
        if (!is_null($highest['val'])) {
            echo "<td>" . $highest['val'] . "</td>";
        } else {
            echo "<td>-</td>";
        }
        echo "</tr>";

        ?>
        </tbody>
    </table>
    <br><br>

    <h2>Artimiausios valandos</h2>
    <table>
        <thead>
        <tr>
            <th>Valanda</th>
            <th>Temperatura</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($closestTemps as $temp) {
            echo "<tr>";
            if (isset($hours[$temp['key']])) {
                echo "<td>" . $hours[$temp['key']] . "</td>";
            } else {
                echo "<td>-</td>";
            }
            if (!is_null($temp['val'])) {
                echo "<td>" . $temp['val'] . "</td>";
            } else {
                echo "<td>-</td>";
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <h2>Gera temperatura</h2>
    <table>
        <thead>
        <tr>
            <th>Valanda</th>
            <th>Temperatura</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($normalTemps as $temp) {
            echo "<tr>";
            if (isset($hours[$temp['key']])) {
                echo "<td>" . $hours[$temp['key']] . "</td>";
            } else {
                echo "<td>-</td>";
            }
            if (!is_null($temp['val'])) {
                echo "<td>" . $temp['val'] . "</td>";
            } else {
                echo "<td>-</td>";
            }
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
<?php
}
?>
