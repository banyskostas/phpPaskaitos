<?php
include_once('data/maistas.php');

if (isset($_GET['receptai'])) {
    // Predefined variables

    /** @var string */
    $table1 = $table2 = $table3 = '';

    /** @var array */
    $nutrition = [
        'proteins' => 0,
        'carbs' => 0,
        'fat' => 0,
    ];

    $ingridients = [];

    foreach ($_GET['receptai'] as $id) {
        $receptas = (isset($receptai[$id])) ? $receptai[$id] : null;

        if (!$receptas) {
            continue;
        }

        // Table 1
        $table1 .= '<tr>
                <td>' . $receptas["name"] . '</td>
                <td>' . $receptas["description"] . '</td>
                <td>' . $receptas["time"] . ' min</td>
                <td>' . $receptas["proteins"] . '</td>
                <td>' . $receptas["carbs"] . '</td>
                <td>' . $receptas["fat"] . '</td>
            </tr>';

        // Table 2

        // Calculate ingridient amounts
        if (isset($receptas['ingridients'])) {

            foreach ($receptas['ingridients'] as $itemId => $item) {
                if (!isset($ingridients[$itemId])) {
                    $ingridients[$itemId] = $item;
                } else {
                    $ingridients[$itemId]['amount'] += $item['amount'];
                }
            }
        }

        // Calculate total nutrition
        $nutrition['proteins'] += $receptas['proteins'];
        $nutrition['carbs'] += $receptas['carbs'];
        $nutrition['fat'] += $receptas['fat'];
    }

    // Table 2
    foreach ($ingridients as $item) {
        $table2 .= '<tr><td>' . $item["name"] . '</td><td>' . $item["amount"] . '</td><td>' . $item["units"] . '</td></tr>';
    }

    // Table 3
    $table3 .= '<tr><td>' . $nutrition['proteins'] . '</td><td>' . $nutrition['carbs'] . '</td><td>' . $nutrition['fat'] . '</td></tr>';

    ?>
    <html>
    <head>
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Baltic Talents</title>

        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

    <table class="table table-bordered table-condensed ">
        <thead>
        <tr>
            <th>Patiekalas</th>
            <th>Receptas</th>
            <th>Trukme</th>
            <th>Baltymai</th>
            <th>Angliavandeniai</th>
            <th>Riebalai</th>
        </tr>
        </thead>
        <tbody>
        <?php echo $table1; ?>
        </tbody>
    </table>

    <table class="table table-bordered table-condensed ">
        <thead>
        <tr>
            <th>Ingridientas</th>
            <th>Kiekis</th>
            <th>Mat. vnt.</th>
        </tr>
        </thead>
        <tbody>
        <?php echo $table2; ?>
        </tbody>
    </table>

    <h2>Energetine verte</h2>
    <table class="table table-bordered table-condensed ">
        <thead>
        <tr>
            <th>Baltymai</th>
            <th>Angliavandeniai</th>
            <th>Riebalai</th>
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

    <?php
} else {
    ?>
    <div class="alert">Pasirinkite patiekala/us</div>
    <?php
}
?>
