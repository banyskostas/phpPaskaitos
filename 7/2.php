<?php
require_once('data/data.php');

$myData = $data;

$possibleIndexes = [
    'name' => [
        'sort' => 0
    ],
    'date' => [
        'sort' => 0
    ],
    'price' => [
        'sort' => 0
    ],
    'make' => [
        'sort' => 0
    ],
];
if (isset($_GET)) {
    // Calculate time elapsed start
    $start = microtime(true);
    foreach ($possibleIndexes as $index => $indexData) {
        if (array_key_exists($index, $_GET)) {
            $sort = $_GET[$index];

            $arr = [];
            foreach ($data as $item) {
                $arr[$item['id']] = $item[$index];
            }

            // Sort data by name
            if (!$sort) {
                uasort($arr, 'cmp');
            } else {
                uasort($arr, 'cmpReverse');
            }

//                    $data = [0 => ['id' => 'a123'], 1 => ['id' => 'b123'], 2 => ['id' => 'c123']];

//                    $arr = ['c123' => 'batai','b123' => 'striuke','a123' => 'kede'];

            $myData = [];
            foreach ($arr as $id => $name) {
                foreach ($data as $item) {
                    if ($item['id'] == $id) {
                        $myData[] = $item;
                        break;
                    }
                }
            }
            $possibleIndexes[$index]['sort'] = !$sort;

            // Explanation of !$sort
//            if ($sort === true) {
//                $sort = false;
//            } else {
//                $sort = true;
//            }
        }
    }

    // Calculate time elapsed end
    $time_elapsed_secs = microtime(true) - $start;

    var_dump($time_elapsed_secs .' sec');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Baltic Talents</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Baltic Talents</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Nuoroada 1</a></li>
                <li><a href="#">Nuoroada 2</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Sub nuoroda <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Sum meniu 1</a></li>
                        <li><a href="#">Sum meniu 2</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container container-fluid">
    <table class="table table-condensed">
        <thead>
        <tr>
            <th><a href="2.php?name=<?php echo strval($possibleIndexes['name']['sort']); ?>">Pavadinimas</a></th>
            <th><a href="2.php?date=<?php echo strval($possibleIndexes['date']['sort']); ?>">Data</a></th>
            <th><a href="2.php?price=<?php echo strval($possibleIndexes['price']['sort']); ?>">Kaina</a></th>
            <th><a href="2.php?make=<?php echo strval($possibleIndexes['make']['sort']); ?>">Pagaminta</a></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($myData as $item) {
            echo ' <tr>
                <td>' . $item['name'] . '</td>
                <td>' . $item['date'] . '</td>
                <td>' . $item['price'] . '</td>
                <td>' . $item['make'] . '</td>
            </tr>';
        }
        ?>
        </tbody>
    </table>
</div>


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>

<?php
function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

function cmpReverse($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? 1 : -1;
}
?>