<?php
// Predefined variables
$head = '';
$title = 'Testas';
$path = 'css/custom/';

/** @var [] $cssFiles */
$cssFiles = [
    'main.css',
    'aboutUs.css',
    'contactUs.css',
    'services.css',
];

/**
 * @param string $title
 * @param array $files
 * @param string $path
 * @return string
 */
function generateHead($includeJs, $title, $files, $path) {
    // Predefined variables
    $html = '';

    // Handle title
    $html .= "<title>$title</title>";

    // Handle css files
    foreach ($files as $file) {
        $html .= '<link rel="stylesheet" type="text/css" href='.$path.$file.'">';
    }
    return $html;
}

$head = generateHead(true, $title, $cssFiles, $path);

?>
<html>
<head>
    <?php echo $head; ?>
</head>
<body>

</body>
</html>