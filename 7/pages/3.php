<?php
require_once('../data/menu.php');
require_once('../data/content.php');

/** Constants */
const PAGE_ID = 3;

// Predefined variables
$infoHtml = '';
$galleryHtml = '';
$bubblesCount = 0;

function generateInfo($data, $imageIndex = 'img', $textIndex = 'txt') {
    $html = '';

    if (isset($data[$imageIndex]) && isset($data[$textIndex])) {
        $html .= '
                 <div class="row">
                    <div class="col-md-4"><img src="' . $data[$imageIndex] . '" class="img-responsive"/></div>
                    <div class="col-md-8">
                        <p>' . $data[$textIndex] . '</p>
                    </div>
                </div>';
    }

    return $html;
}

function generateGallery($data) {
    $html = '';
    $active = false;

    foreach ($data['gallery'] as $url) {
        $activeClass = '';

        if (!$active) {
            $activeClass = 'active';
            $active = true;
        }

        $html .= '
                        <div class="item ' . $activeClass . '">
                          <img src="' . $url . '" alt="Los Angeles">
                        </div>';
    }
    return $html;

}

if (!isset($turinys[PAGE_ID])) {
    $infoHtml .= 'Informacija ruosiama.';
} else {
    $data = $turinys[PAGE_ID];

    // Main info
    $infoHtml = generateInfo($data, 'image', 'text');

    // Gallery
    $galleryHtml = generateGallery($data);

    // Count bubbles
    $bubblesCount = count($data['gallery']);
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
            <?php echo $infoHtml; ?>
            <?php

            if (strlen($galleryHtml)) { ?>
                <br><br>
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php
                        for ($i = 0; $i < $bubblesCount; $i++) {
                            $active = '';

                            if ($i === 0) {
                                $active = 'active';
                            }
                            echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="'.$active.'"></li>';
                        }
                        ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php echo $galleryHtml; ?>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>



