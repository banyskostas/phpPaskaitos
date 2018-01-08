<?php
/** Constants */
const FOLDER = 1;
const FILE = 2;

/** @var array */
$ignorableFolders = ['.git', '.idea'];
$ignorableFiles = ['.gitignore'];

/** @var string $path */
$path = "..";

/**
 * @param string $path
 * @return array
 */
function readFolder($path)
{
    $files = [];
    if (is_dir($path)) {
        if (!isFileNotProcessable($path)) {
            $files[] = ['type' => FOLDER, 'path' => $path, 'name' => getPathFileName($path)];
        }
        $dir = opendir($path);
        while ($filename = readdir($dir)) {
            if (isFileNotProcessable($filename)) {
                continue;
            }

            if (is_dir($path . '/' . $filename)) {
                $files[] = readFolder($path . '/' . $filename);
            } else {
                $files[] = ['type' => FILE, 'path' => $path . '/' . $filename, 'name' => $filename];
            }
        }
        closedir($dir);
    } else {
        $files[] = ['type' => FILE, 'path' => $path, 'name' => getPathFileName($path)];
    }
    return $files;
}

/**
 * @param string $filename
 * @return bool
 */
function isFileNotProcessable($filename)
{
    return in_array($filename, ['.', '..']);
}

/**
 * @param string $path
 * @return string
 */
function getPathFileName($path)
{
    $arr = explode('/', $path);
    return count($arr) ? end($arr) : '';
}

/**
 * @param [] $files
 * @param [] $ignorableFolders
 * @param [] $ignorableFiles
 * @param bool $getOut
 * @param bool $noNewList
 * @return string
 */
function processFileTree($files, $ignorableFolders, $ignorableFiles, $getOut = false, $noNewList = false)
{
    // Predefined variables
    $html = '';

    if (!$noNewList) {
        $html .= '<ul>';
    }

    $folder = false;
    foreach ($files as $key => $filesArr) {

        if (!array_key_exists('type', $filesArr)) {
            $html .= processFileTree($filesArr, $ignorableFolders, $ignorableFiles, true, true);
            continue;
        }

        $file = $filesArr;

        $continue = true;

        switch ($file['type']) {
            case FOLDER:
                if (in_array($file['name'], $ignorableFolders)) {
                    $continue = false;
                }

                if ($continue) {
                    $html .= '<li>' . $file['name'] . '</li>';

                    if ($key === 0) {
                        $html .= '<ul>';
                        $folder = true;
                    }
                }
                break;

            case FILE:
                if (in_array($file['name'], $ignorableFiles)) {
                    $continue = false;
                }
                if ($continue) {
                    $html .= '<li>';

                    $arr = explode('.', $file['name']);

                    switch (end($arr)) {
                        case 'php':
                            $html .= generateModalHtml($file, 'php',  htmlentities(file_get_contents($file['path'])));
                            break;
                        case 'png':
                        case 'gif':
                        case 'jpg':
                            $body = '<img src="' . $file['path'] . '" class="img-resposive" style="width: 100%;">';
                            $html .= generateModalHtml($file, 'image', $body);
                            break;
                        default:
                            $html .= '<a href="' . $file['path'] . '" download>' . $file['name'] . '</a>';
                            break;
                    }
                    $html .= '</li>';

                }
                break;
        }

        if (!$continue) {

            if ($getOut) {
                return '';
            } else {
                continue;
            }
        }

    }

    if ($folder) {
        $html .= '</ul>';
//        $folder = false;
    }

    if (!$noNewList) {
        $html .= '</ul>';
    }
    return $html;
}

/**
 * @param [] $file
 * @param string $type
 * @param string $body
 * @return string
 */
function generateModalHtml($file, $type, $body)
{
    // Predefined variables
    $html = '';

    $random = rand(1, 9999);
    $html .= '<a href="#" data-toggle="modal" data-target="#myModal_' . $random . '">' . $file['name'] . ' ('.$type.')</a>';

    $html .= '
        <!-- Modal -->
        <div class="modal fade" id="myModal_' . $random . '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">' . $file['name'] . '</h4>
              </div>
              <div class="modal-body">
                '.$body.'
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    ';
    return $html;
}

//echo json_encode($files);

$files = readFolder($path);

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

<div class="container" id="content" tabindex="-1">
    <div class="row">
        <div class="col-md-12">
            <?php echo processFileTree($files, $ignorableFolders, $ignorableFiles); ?>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>