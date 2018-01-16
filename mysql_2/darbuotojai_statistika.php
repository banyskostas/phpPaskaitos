<?php
require_once('mysql.php');

$alert = null;
$arr = [];
$usersStatisticsByGender = [];


if (isset($_GET['position'])) {
    $position = (int)htmlentities($_GET['position']);

    $arr = get('SELECT education.title AS `title`, COUNT(users.id) AS `count`, AVG(users.salary) AS `salary`
FROM users, education WHERE education.id = users.education 
AND users.position = ' . $position . '
GROUP BY users.education');


    if (!is_array($arr)) {
        $alert = $arr;
    }

    $usersStatisticsByGender = get('SELECT gender, COUNT(*) AS `count` FROM users WHERE position = '.$position.' GROUP BY position ' );

    /**
     * <th>Lytis</th>
    <th>Kiekis</th>
    <th>Procentai</th>
     */

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
    <style type="text/css">
        td {
            vertical-align: middle !important;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed"
                    data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                <span class="sr-only">Toggle navigation</span> <span
                        class="icon-bar"></span> <span class="icon-bar"></span> <span
                        class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Baltic Talents</a>
        </div>

        <div class="collapse navbar-collapse"
             id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="statistika.php">Įmonės statistika</a></li>
            </ul>


        </div>
    </div>
</nav>

<div class="container" id="content" tabindex="-1">
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN ALERTS-->
            <div class="alert alert-danger <?php echo (!$alert)? 'hidden' : '' ;?>">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $alert;?>
                    </div>
                </div>
            </div>
            <!-- END ALERTS-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Įmonėje dirbančių darbuotojų statistika pagal išsilavinimą</div>


                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>Išsilavinimas</th>
                        <th>Kiekis</th>
                        <th>Vidutinis užmokestis</th>

                    </tr>
                    <?php foreach ($arr as $item) {
                        echo '
                            <tr>
                                <td>'.$item['title'].'</td>
                                <td>'.$item['count'].'</td>
                                <td>'.number_format($item['salary'], 2).' EUR</td>
						    </tr>
                            ';
                    } ?>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Darbuotojų statistika pagal lytį</div>


                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>Lytis</th>
                        <th>Kiekis</th>
                        <th>Procentai</th>

                    </tr>
                    <tr>
                        <td>Vyras</td>
                        <td>6</td>
                        <td>60 %</td>
                    </tr>
                    <tr>
                        <td>Moteris</td>
                        <td>4</td>
                        <td>40 %</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


</div>
<script
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>