<?php
require_once('data/data.php');

$html = '';

if (isset($navigacija)) {
    $html = getMenuItems($navigacija);
}

/**
 * @param [] $data
 * @return string
 */
function getMenuItems($data)
{
    $html = '';

    foreach ($data as $menuItem) {
        $withSubMenu = false;
        foreach ($menuItem as $menuItemVal) {
            if (is_array($menuItemVal)) {
                $html .= generateMenuItem($menuItem['id'], $menuItem['caption'], true);
                $html .= '<ul class="dropdown-menu">';
                $html .= getMenuItems($menuItemVal);
                $html .= '</ul ></li>';

                $withSubMenu = true;
            }
        }

        if (!$withSubMenu) {
            $html .= generateMenuItem($menuItem['id'], $menuItem['caption'], false);
        }
    }

    return $html;
}

/**
 * @param int $id
 * @param string $caption
 * @param bool $dropdown
 * @return string
 */
function generateMenuItem($id, $caption, $dropdown = false)
{
    $html = '';
    if ($dropdown) {
        $html = '<li class="dropdown">';
        $html .= '<a href="/' . $id . '" >' . $caption . '<span class="caret"></span></a>';
    } else {
        $html .= '<li><a href="' . $id . '">' . $caption . '</a></li>';
    }

    return $html;
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
                <?php echo $html; ?>
            </ul>


        </div>
    </div>
</nav>

<div class="container" id="content" tabindex="-1">
    <div class="row">
        <div class="col-md-12">

        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>



