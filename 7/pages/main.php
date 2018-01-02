<?php
require_once('../data/menu.php');
require_once('../data/content.php');
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
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../pages/main.php">Baltic Talents</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php
                $html = '';
                foreach ($navigacija as $item) {
                    if (isset($item['subMenu'])) {
                        $html .= '<li class="dropdown">
                            <a href="../pages/'.$item['id'].'.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$item['caption'].'<span class="caret"></span></a>
                            <ul class="dropdown-menu">';

                        foreach ($item['subMenu'] as $subMenuItems) {
                            $html .= ' <li><a href="../pages/'.$subMenuItems['id'].'.php">'.$subMenuItems['caption'].'</a></li>';
                        }
                        $html .='</ul></li>';
                    } else {
                        $html .= ' <li class="active"><a href="../pages/'.$item['id'].'.php">'.$item['caption'].'</a></li>';
                    }

                }
                echo $html;
                ?>
            </ul>


        </div>
    </div>
</nav>

<div class="container" id="content" tabindex="-1">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Pavadinimas</th>
                    <th>Trumpa informacija</th>
                    <th>Pilna informacija</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $html = '';
                foreach ($news as $data => $item) {
                    $html .= '<tr><td>'.$data.'</td><td>'.$item['name'].'</td><td>'.$item['text'].'</td><td>'.$item['description'].'</td></tr>';
                }
                echo $html;
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>



