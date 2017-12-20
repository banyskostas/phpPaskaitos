<?php
include_once('data/maistas.php');

// Predefined variables
$table1 = '';
$table2 = '';
$table3 = '';

$proteins = 0;
$carbs = 0;
$fat = 0;

$uniqueIngridients = [];

foreach ($receptai as $receptasId => $receptas) {

// Table 1
    $ingridients = '';

    if (isset($receptas["ingridients"])) {
        $i = 1;
        foreach ($receptas["ingridients"] as $id => $item) {
            $ingridients .= $item['name'] . ' (' . $item['amount'] . $item['units'] . ')';

            if ($i < count($receptas["ingridients"])) {
                $ingridients .= '<br>';
            }

            if (!isset($uniqueIngridients[$id])) {
                $uniqueIngridients[$id] = $item;
            }
            $i++;
        }
    }

    $table1 .= '<tr>
                <td><input type="checkbox" name="receptai[]" value="' . $receptasId . '"></td>
                <td>' . $receptas["name"] . '</td>
                <td>' . $receptas["description"] . '</td>
                <td>' . $receptas["time"] . ' min.</td>
                <td>' . $receptas["proteins"] . '</td>
                <td>' . $receptas["carbs"] . '</td>
                <td>' . $receptas["fat"] . '</td>
                <td>' . $receptas["calories"] . '</td>
                <td>' . $ingridients . '</td>
            </tr>';

    // Table 2
    $proteins += $receptas['proteins'];
    $carbs += $receptas['carbs'];
    $fat += $receptas['fat'];

}

$table2 .= '<tr><td>' . $fat . '</td><td>' . $carbs . '</td><td>' . $proteins . '</td></tr>';

foreach ($uniqueIngridients as $item) {
    $table3 .= '<tr><td>' . $item['name'] . '</td></tr>';
}

?>
<html>
<head>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Baltic Talents</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<h2> Receptai</h2>

<form action="maistasIsvedimasPrint.php" method="get">
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th> Pavadinimas</th>
            <th> Aprasymas</th>
            <th> Laikas</th>
            <th> Baltymai</th>
            <th> Angliavandeniai</th>
            <th> Riebalai</th>
            <th> Kalorijos</th>
            <th> Ingridientai</th>
        </tr>
        </thead>
        <tbody>
        <?php echo $table1; ?>
        </tbody>
    </table>

    <button class="btn" type="submit">Submit</button>
</form>
<h2>Viso</h2>

<table class="table">
    <thead>
    <tr>
        <th>Riebalai</th>
        <th>Angliavandeniai</th>
        <th>Baltymai</th>
    </tr>
    </thead>
    <tbody>
    <?php echo $table2; ?>
    </tbody>
</table>

<h2>Reikalingi ingridientai</h2>

<table class="table">
    <thead>
    <tr>
        <th>Ingridientas</th>
    </tr>
    </thead>
    <tbody>
    <?php echo $table3; ?>
    </tbody>
</table>
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>