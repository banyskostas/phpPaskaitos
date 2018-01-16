<?php
require_once('mysql.php');
require_once('positions.php');
require_once('businessStatistics.php');

$alert = null;
$users = get('SELECT * FROM users');

if (!is_array($users)) {
    $alert = $users;
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
            <div>

            </div>
            <!-- BEGIN ALERTS-->
            <div class="alert alert-danger <?php echo (!$alert)? 'hidden' : '' ;?>">
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $alert;?>
                    </div>
                </div>
            </div>
            <!-- END ALERTS-->
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Visi įmonės darbuotojai</div>


                <!-- Table -->
                <table class="table">
                    <tr>
                        <th></th>
                        <th>Vardas</th>
                        <th>Pavardė</th>
                        <th>Tel. nr.</th>
                        <th>Išsilavinimas</th>
                        <th>Alga</th>
                        <th></th>
                    </tr>

                    <?php
                    $count = 1;
                    foreach ($users as $user) {
                        // Education
                        $education = '-';
                        $educationQueryResult = getEducationById($user['education']);

                        if (is_array($educationQueryResult)) {
                            $education = (isset($educationQueryResult[0])) ? $educationQueryResult[0]['title'] : '-';
                        }

                        echo '
                            <tr>
                                <td><strong>'.$count.'.</strong></td>
                                <td>'.$user['name'].'</td>
                                <td>'.$user['surname'].'</td>
                                <td>'.$user['mobile_nr'].'</td>
                                <td>'.$education.'</td>
                                <td>'.$user['salary'].'</td>
                                <td><a href="darbuotojas.php?user='.$user['id'].'" class="btn btn-primary">Plačiau</a></td>
                            </tr>
                        ';
                        $count++;
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Baziniai darbo užmokesčiai:</div>

                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>Pareigos</th>
                        <th>Bazinis darbo užmokesti</th>
                        <th>Darbuotoju skaicius</th>
                        <th></th>
                    </tr>

                    <tr>
                        <td>Direktorius</td>
                        <td><?php echo getPositionMinSalary(POSITION_DIRECTOR, $positions);?> EUR</td>
                        <td><?php echo getPositionUsersCount(POSITION_DIRECTOR, $positions); ?></td>
                        <td><a href="darbuotojai_statistika.php?position=<?php echo POSITION_DIRECTOR;?>" class="btn btn-primary">Rodyti darbuotojus</a></td>
                    </tr>
                    <tr>
                        <td>Programotojas</td>
                        <td><?php echo getPositionMinSalary(POSITION_PROGRAMMER, $positions);?> EUR</td>
                        <td><?php echo getPositionUsersCount(POSITION_PROGRAMMER, $positions); ?></td>
                        <td><a href="darbuotojai_statistika.php?position=<?php echo POSITION_PROGRAMMER;?>" class="btn btn-primary">Rodyti darbuotojus</a></td>
                    </tr>
                    <tr>
                        <td>Valytojas</td>
                        <td><?php echo getPositionMinSalary(POSITION_CLEANER, $positions);?> EUR</td>
                        <td><?php echo getPositionUsersCount(POSITION_CLEANER, $positions); ?></td>
                        <td><a href="darbuotojai_statistika.php?position=<?php echo POSITION_CLEANER;?>" class="btn btn-primary">Rodyti darbuotojus</a></td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-6 col-xs-12 col-sm-12">
            <div class="panel panel-primary">
                <!-- Default panel contents -->
                <div class="panel-heading">Įmonės statistika:</div>

                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>Įmonėje dirbančių žmonių skaičius</th>
                        <td><?php echo getCompanyWorkersCount(); ?></td>
                    </tr>

                    <tr>
                        <th>Vidutinis darbo užmokestis</th>
                        <td><?php echo getAvgSalary(); ?> EUR</td>
                    </tr>
                    <tr>
                        <th>Minimalus darbo užmokestis</th>
                        <td><?php echo getMinSalary(); ?> EUR</td>
                    </tr>
                    <tr>
                        <th>Maksimalus darbo užmokestis</th>
                        <td><?php echo getMaxSalary(); ?> EUR</td>
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